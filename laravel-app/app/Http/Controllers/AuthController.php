<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {

        // Email e senha do usuario
        $account = $request->all(['email', 'password']);

        // Autentificação com tratamento e código de status
        $token = auth('api')->attempt($account);
        if ($token) {
            return response()->json(
                ['token' => $token]
            );
        } else {
            return response()->json(
                ['erro' => 'Usuário não encontrado!'], 403
            );
        }

    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso']);
    }

    public function refresh() {
        // $token = auth('api')->refresh();
    }

    public function me() {

        // Autentificação com tratamento e código de status
        $token = auth('api');
        if ($token) {
            return response()->json(auth()->user());
        } else {
            return response()->json(
                ['erro' => 'Token is invalid'], 403
            );
        };
    }

    public function register(Request $request){
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json($user, 201);
    }
}