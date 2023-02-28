<?php
namespace App\Http\Requests;

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
            'price'      => ['required', 'numeric', 'min:0.01'],
            'quantity'   => ['required'],
            'deadline'   => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'price.min'     => 'wartość tylko dodatnia',
            'price.numeric' => 'podaj numer',
        ];
    }
    public function priceToCents(): int
    {
        return floor(100 * $this->input('price', 0));
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
            'quantity'   => $this->input('quantity'),
            'order_type' => $this->input('order_type'),
            'deadline'   => $this->deadlineCarbon(),
        ];
    }
}
