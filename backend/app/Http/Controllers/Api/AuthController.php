<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\accesos;
use App\Models\User;
use App\Models\Devices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperarContrasena;



class AuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        //$user = User::where('nombre_user', request()->nombre_user)->first();


        $user = DB::table('users')
            ->whereRaw('nombre_user =' . $request->nombre_user)
            ->get();

        /*foreach ($nombre as $valor) {
            $nombre = $valor->nombre_user;
        }*/

        dd($user);

        if(isset($user->id)){
            $user->tokens()->delete();

            if(Hash::check((request()->password), $user->password)){
                $token_v1 = $user->createToken('token')->plainTextToken;
                $user->token = $token_v1;
                $user->save();

                $device = new Devices();
                $device->device_name = Agent::device();
                $device->browser = Agent::browser();
                $device->os = Agent::platform();
                $device->save();

                $acceso = new accesos();
                $ultima_conexion = Carbon::now();
                $acceso->ultima_conexion = $ultima_conexion->format('d/m/Y H:i:s');
                $acceso->ip = request()->ip();
                $acceso->user_id = $user->id;
                $acceso->devices_id = $device->id;
                $acceso->save();

                return response()->json([
                    'message' => "Usuario logueado correctamente",
                    'user' => $user,
                    'acceso' => $acceso,
                    'token' => $token_v1,

                ],200);

            }else{
                return response()->json([
                    'message' => "Error. Contraseña Incorrecta",
                    "state" => "error",
                    'user' => $user,
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

    public function enviarCodigo($email){

        if(User::where('email', '=', $email)->exists()){

            $codigo = User::generarCódigoAleatorio();

            $user = DB::table('users')
                ->where('email', $email)
                ->update(['codigo' => $codigo]);

            $nombre = DB::table('users')
                ->where('email', $email)
                ->get('nombre_user');

            foreach ($nombre as $valor) {
                $nombre = $valor->nombre_user;
            }

            $correoDestino = $email;
            Mail::to($correoDestino)->send(new RecuperarContrasena($nombre, $codigo));

            return response()->json([
                'message' => "Se le ha enviado a su correo con un código de cuatro digitos",
                "state" => "sucess"
            ],200);

        }else{

            return response()->json([
                'message' => "Correo electronico no encontrado. Vuelva a intentar",
                "state" => "sucess"
            ],200);
        }


    }

    public function verificarCodigo(Request $request){

        $user = DB::table('users')
            ->where('email', $request->email)
            ->get('codigo');

        foreach ($user as $valor) {
            $codigoTabla = $valor->codigo;
        }

        if($codigoTabla == $request->codigo){

            return response()->json([
                'message' => "Código verificado con exito",
                "state" => "ok"
            ],200);
        }else{
            return response()->json([
                'message' => "Código incorrecto, verifique nuevamente",
                "state" => "no ok"
            ],200);
        }

    }
}
