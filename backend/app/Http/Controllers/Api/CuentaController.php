<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    public function verTodasLasCuentasUsuario ($id){

        $cuentas = Cuenta::detalleCuenta($id);

        dd($cuentas);

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
}
