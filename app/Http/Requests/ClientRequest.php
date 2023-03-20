<?php
namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var Client $client */
        $client = $this->route('client');

        return Auth::user()->can('update', $client);
    }

    public function rules(): array
    {
        return [
            'name'           => ['min:3', 'max:60'],
            'lastname'       => ['min:3', 'max:60'],
            'city'           => ['required', 'min:2'],
            'status'         => ['min:1'],
            'phone_number'   => ['min:11'],
            'type_of_client' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.min'         => 'Imię powinno się składać minimum z 3 znaków',
            'name.max'         => 'Imię powinno się składać maksymalnie z 60 znaków',
            'lastname.min'     => 'Nazwisko powinno się składać minimum z 3 znaków',
            'lastname.max'     => 'Nazwisko powinno się składać minimum z 60 znaków',
            'city.requried'    => 'To pole jest wymagane',
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
            'name'            => $this->input('name'),
            'lastname'        => $this->input('lastname'),
            'city'            => $this->input('city'),
            'status'          => $this->input('status'),
            'phone_number'    => $this->formatPhoneNumber(),
            'type_of_client'  => $this->input('type_of_client'),
            'name_of_company' => $this->input('name_of_company'),
        ];
    }
}
