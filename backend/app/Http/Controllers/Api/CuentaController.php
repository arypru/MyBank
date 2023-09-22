<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Persona;
use App\Models\TipoCuenta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    public function verTodasLasCuentasUsuario ($id){

        $cuentas = Cuenta::TodasCuenta($id);

        if($cuentas){
            return response()->json([
                'cuentas'=> $cuentas
            ], 200);
        }else{
            return response()->json([
                'msg'=> 'no posee cuentas asociada al usuario'
            ], 200);
        }
    }

    public function verDetalleCuenta ($nrocuenta){

        $cuenta = Cuenta::verDetalleCuenta($nrocuenta);

        if($cuenta){
            return response()->json([
                'cuenta'=> $cuenta
            ], 200);
        }else{
            return response()->json([
                'msg'=> 'no posee cuentas asociada al usuario'
            ], 200);
        }
    }

    public function store (Request $request){

        $numeroCuentaAleat = Cuenta::nroCuentaAleatorio();
        $cbuAlet = Cuenta::cbuAleatorio();
        $aliasAlet = Cuenta::aliasAleatorio();
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $cuenta = new Cuenta();
        $cuenta->CBU = $cbuAlet;
        $cuenta->alias = $aliasAlet;
        $cuenta->numeroCuenta = $numeroCuentaAleat;
        $cuenta->persona_id = $user->id;
        $cuenta->banco_id = 1;
        $cuenta->tipocuenta_id = $request->tipocuenta_id;
        $cuenta->estado_id = 1;
        $cuenta->save();

        return response()->json($cuenta, 200);
    }

    public function darDeBaja ($idCuenta){

        $cuentaDeshabilitada = Cuenta::findOrFail($idCuenta);
        $cuentaDeshabilitada->estado_id = 2;
        $cuentaDeshabilitada->update();

        $msg = 'Cuenta' . $cuentaDeshabilitada->numeroCuenta . 'Deshabilitada correctamente';

        return response()->json($msg, 200);
    }

    public function modificarAlias(Request $request){

        $cuentaAlias = Cuenta::findOrFail($request->idCuenta);
        $cuentaAlias->alias = $request->alias;
        $cuentaAlias->update();

        return response()->json($cuentaAlias, 200);
    }

    public function modificarDescripcion(Request $request){

        $cuentaDescrip = Cuenta::findOrFail($request->idCuenta);
        $cuentaDescrip->descripcion = $request->descripcion;
        $cuentaDescrip->update();

        return response()->json($cuentaDescrip, 200);
    }
}
