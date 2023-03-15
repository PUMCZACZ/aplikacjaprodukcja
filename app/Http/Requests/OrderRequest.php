<?php
namespace App\Http\Requests;

use App\Money;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'  => ['required', 'numeric'],
            'order_type' => ['required'],
            'quantity'   => ['required', 'numeric', 'min:1'],
            'deadline'   => ['required'],
            'price'      => ['min:0.01', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'price.min'           => 'Wartość minimalna to 0,01 zł',
            'price.numeric'       => 'Wartość nie jest numerem',
            'order_type.required' => 'To pole jest wymagane',
            'quantity.required'   => 'To pole jest wymagane',
            'quantity.numeric'    => 'Wartość nie jest numerem',
            'quantity.min'        => 'Minimalna ilość to jedna sztuka',
        ];
    }

    public function priceToCents(): int
    {
        return Money::priceToCents($this->input('price', 0));
    }

    public function deadlineCarbon(): Carbon
    {
        return Carbon::parse($this->input('deadline'));
    }

    public function toData(): array
    {
        return [
            'client_id'  => $this->input('client_id'),
            'price'      => $this->priceToCents(),
            'weight'     => $this->input('weight'),
            'quantity'   => $this->input('quantity'),
            'order_type' => $this->input('order_type'),
            'deadline'   => $this->deadlineCarbon(),
        ];
    }
}
