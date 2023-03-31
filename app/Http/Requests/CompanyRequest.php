<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::check('admin');
    }

    public function rules(): array
    {
        return [
            'name_of_company' => ['required'],
            'tag'             => ['required'],
            'phone_number'    => ['required', 'min:11'],
        ];
    }

    public function messages(): array
    {
        return [
            'name_of_company.required' => 'Pole nazwa firmy jest wymagane',
            'tag.required'             => 'Pole tag jest wymagane',
            'phone_number.required'    => 'Pole numer telefonu jest wymagane',
            'phone_number.min'         => 'numer telefonu powinien składać się z 9 cyfr oddzielanych znakiem "-" lub spacją',
        ];
    }

    public function formatPhoneNumber(): int
    {
        return preg_replace('/[^0-9]/', '', $this->input('phone_number'));
    }

    public function toData(): array
    {
        return [
            'name_of_company' => $this->input('name_of_company'),
            'tag'             => $this->input('tag'),
            'phone_number'    => $this->formatPhoneNumber(),
        ];
    }
}
