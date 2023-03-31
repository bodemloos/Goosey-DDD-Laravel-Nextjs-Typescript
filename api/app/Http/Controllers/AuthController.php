<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Modules\Users\Services\CreateUserService;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request): UserResource|JsonResponse
    {
        if (!$token = auth()->attempt($request->data())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return new UserResource($this->respondWithToken($token, auth()->user()));
    }

    public function register(
        CreateUserRequest $request,
        CreateUserService $service
    ): UserResource {
        $user = $service->create($request->data());
        $token = auth()->login($user);
        return new UserResource($this->respondWithToken($token, $user));
    }

    public function logout(Request $request): JsonResponse
    {
        auth()->logout();
        return response()
            ->json(["message" => "User successfully logged out"], 204);
    }

    protected function respondWithToken($token, $user)
    {
        return [
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
                'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
            ]
        ];
    }
}