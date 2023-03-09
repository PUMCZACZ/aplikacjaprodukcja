<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['min:3'],
            'lastname'     => ['min:3'],
            'city'         => ['required'],
            'status'       => ['min:1'],
            'phone_number' => ['min:11']
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'Imię powinno się składać minimum z 3 znaków',
            'lastname.min' => 'Nazwisko powinno się składać minimum z 3 znaków',
            'city.requried' => 'To pole jest wymagane',
            'phone_number.min' => 'numer telefonu powinien składać się z 9 cyfr oddzielanych znakiem "-" lub spacją',
        ];
    }

    public function formatPhoneNumber(): int
    {
        return preg_replace('/[^0-9]/', '', $this->input('phone_number'));
    }

    public function toData(): array
    {
        return [
            'name'         => $this->input('name'),
            'lastname'     => $this->input('lastname'),
            'city'         => $this->input('city'),
            'status'       => $this->input('status'),
            'phone_number' => $this->formatPhoneNumber(),
        ];
    }
}
