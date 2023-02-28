<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'netto_price' => ['min:0.01'],
            'brutto_price' => [],
            'bag_price' => [],
            'bigbag_price' => [],
            'loose_price' => [],
            'bag_packing_cost_price' => ['min:0.01'],
            'bigbag_packing_cost_price' => ['min:0.01'],
            'loose_packing_cost_price' => ['min:0.01'],
        ];
    }

    public function messages():array
    {
        return [
            'netto_price.min' => 'cena minimalna powinna wynosić 1 grosz',
            'bag_packing_cost_price.min' => 'cena minimalna powinna wynosić 1 grosz',
            'bigbag_packing_cost_price.min.min' => 'cena minimalna powinna wynosić 1 grosz',
            'loose_packing_cost_price.min' => 'cena minimalna powinna wynosić 1 grosz',
        ];
    }
    public function toData(): array
    {
        return [
            'netto_price' => $this->input('netto_price'),
            'bag_packing_cost_price' => $this->input('bag_packing_cost_price'),
            'bigbag_packing_cost_price' => $this->input('bigbag_packing_cost_price'),
            'loose_packing_cost_price' => $this->input('loose_packing_cost_price'),
        ];
    }
}
