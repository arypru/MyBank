<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login()
    {
        $user = User::where('nombre_user', request()->nombre_user)->first();
        if(isset($user->id)){
            $user->tokens()->delete();

            if(Hash::check(request()->password, $user->password)){
                $token_v1 = $user->createToken('token')->plainTextToken;
                $user->token = $token_v1;
                $user->save();

                return response()->json([
                    'message' => "Usuario logueado correctamente",
                    'user' => $user,
                    'token' => $token_v1,

                ],200);

            }else{
                return response()->json([
                    'message' => "Error. Contraseña Incorrecta",
                    "state" => "error"
                ],200);
            }
        }else{

            return response()->json([
                'message' => "Error. Usuario Incorrecto",
                "state" => "error"
            ],200);
        }
    }


    public function logout(){

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());
        $user->tokens()->delete();
        //
        return response()->json([
            'message' => "Usuario deslogueado con éxito",
            "state" => "error"
        ],200);

    }
}
