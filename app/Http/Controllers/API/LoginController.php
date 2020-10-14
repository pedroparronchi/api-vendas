<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * 
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt(($credentials))) {
            $user = $request->user();

            $response = [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken('token')->accessToken
            ];

            return response()->json($response, 200);
        }

        return response()->json("Usuário não autorizado", 401);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = $request->user();
        if (!empty($user)) {
            $user->token()->revoke();
            return response()->json("Logout efetuado com sucesso", 200);
        }

        return response()->json("Usuário não autorizado", 401);
    }
}
