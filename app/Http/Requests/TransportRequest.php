<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class TransportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::check('admin');
    }

    public function rules(): array
    {
        return [
            'name_of_company' => ['min:3', 'max:255'],
            'type_of_product' => ['min:3', 'max:255'],
            'product_amount'  => ['numeric', 'min:1'],
            'product_price'   => ['numeric', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name_of_company.min'     => 'Nazwa firmy powinna się składać minimum z 3 znaków',
            'name_of_company.max'     => 'Nazwa firmy powinna się składać maksymalnie z 255 znaków',
            'type_of_product.min'     => 'Minimalna ilość musi wynosić 1 sztukę',
            'type_of_product.numeric' => 'Wartosć nie jest cyfrą',
            'product_price.min'       => 'Minimalna cena musi wynosić 1 grosz',
            'product_price.numeric'   => 'Wartosć nie jest cyfrą',
        ];
    }

    public function toData(): array
    {
        return [
            'name_of_company' => $this->input('name_of_company'),
            'type_of_product' => $this->input('type_of_product'),
            'product_amount'  => $this->input('product_amount'),
            'product_price'   => $this->input('product_price'),
            'delivered_at'    => $this->input('delivered_at'),
        ];
    }
}
