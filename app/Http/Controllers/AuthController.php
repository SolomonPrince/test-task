<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])){
                $user = auth()->user();

                $token = $user->createToken("api_token")->plainTextToken;
                return $this->sendResponse(['user' => $user, 'token' => $token], 200);
            }else{
                return $this->sendError("user not found", [], 404);
            }
        }catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
