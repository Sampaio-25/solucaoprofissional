<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Retorna a view de registro
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:11|unique:users',
            'contato' => 'required|string|max:15',
            'cidade' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'contato' => $request->contato,
            'cidade' => $request->cidade,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Logar o usuário após o registro (opcional)
        auth()->login($user);

        return redirect()->route('login')->with('status', 'Conta criada com sucesso!');
    }
}
