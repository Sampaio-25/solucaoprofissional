<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // Retorna a view de login
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // A autenticação foi bem-sucedida
            return redirect()->intended('home')->with('status', 'Bem-vindo de volta!');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('status', 'Você saiu com sucesso.');
    }
}

