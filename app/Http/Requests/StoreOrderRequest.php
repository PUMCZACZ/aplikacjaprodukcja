<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'price.min'     => 'wartość tylko dodatnia',
            'price.numeric' => 'podaj numer pało',
        ];
    }

    public function priceToCents(): int
    {
        return floor(100 * $this->input('price', 0));
    }

    public function toData(): array
    {
        return [
            'client_id'  => $this->input('client_id'),
            'price'      => $this->priceToCents(),
            'quantity'   => $this->input('quantity'),
            'order_type' => $this->input('order_type'),
        ];
    }
}
