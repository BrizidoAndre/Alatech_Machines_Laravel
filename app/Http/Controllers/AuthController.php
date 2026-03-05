<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);
        if ($validator->fails()) {
            return $this->message(400, ['message' => 'Credenciais inválidas']);
        }
        $user = User::firstWhere(['username' => $request->input('username', '')]);
        if ($user->password !== md5($request->input('password', ''))) {
            return $this->message(400, ['message' => 'Credenciais inválidas']);
        }
        if ($user->accessToken) {
            return $this->message(403, [
                'message' => 'Usuário já autenticado'
            ]);
        }
        $user->update([
            'accessToken' => \Illuminate\Support\Str::random(8)
        ]);
        return $this->message(200, [
            'message' => $user->accessToken
        ]);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->update([
            'accessToken' => null
        ]);
        return $this->message(200, [
            'message' => 'Logout com sucesso'
        ]);
    }
}
