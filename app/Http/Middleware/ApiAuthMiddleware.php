<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $bearer = $request->bearerToken();
        if (!$bearer) {
            return response()->json([
                'message' => 'Necessário autenticação'
            ], 401);
        }
        $user = User::firstWhere(['accessToken' => $bearer]);
        if (!$user) {
            return response()->json([
                'message' => 'Token inválido'
            ], 403);
        }
        Auth::login($user);
        return $next($request);
    }
}
