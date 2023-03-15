<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        return view('login.index');
    }

    public function store(UserRequest $request)
    {
        $data = $request->toData();

        if(auth()->attempt($data))
        {
            session()->regenerate();

            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Niepoprawny adres email lub hasło.'
        ]);
    }
}
