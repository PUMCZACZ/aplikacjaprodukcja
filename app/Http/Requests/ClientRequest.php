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
            'name'     => ['min:3'],
            'lastname' => ['min:3'],
            'city'     => ['required'],
            'status'   => ['min:1'],
        ];
    }

    public function toData(): array
    {
        return [
            'name' => $this->input('name'),
            'lastname' => $this->input('lastname'),
            'city' => $this->input('city'),
            'status' => $this->input('status'),
        ];
    }
}
