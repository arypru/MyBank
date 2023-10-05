<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cuenta extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }

    public function banco(){
        return $this->hasOne(Banco::class);
    }

    public function tipoCuenta(){
        return $this->hasOne(TipoCuenta::class);
    }

    public function estado(){
        return $this->hasOne(Estado::class);
    }

    public static function TodasCuenta($id){

        $user =  Persona::findOrFail($id);
        if($user){
            $query = DB::table('cuentas')
                ->select(
                    'cuentas.id as idCuenta',
                    'cuentas.CBU as CBU',
                    'cuentas.alias as alias',
                    'cuentas.numeroCuenta as numeroCuenta',
                    'cuentas.isFavorita as isFavorita',
                    'cuentas.isCuentaPropia as isCuentaPropia',
                    'cuentas.saldoDisponible as saldoDisponible',
                    'cuentas.saldoBloqueado as saldoBloqueado',
                    'personas.nombre as nombreTitular',
                    'personas.apellido as apellidoTitular',
                    'personas.dni as dniTitular',
                    'bancos.nombre as descripcionBanco',
                    'bancos.logoUrl as logoBanco',
                    'tipo_cuentas.acronimo as acronimoTipoCuenta',
                    'tipo_cuentas.descripcion as tipoCuentaDescrip',
                    'monedas.descripcion as monedaDescrip',
                    'monedas.simbolo as monedaSimbolo',
                )
                ->join('personas', 'personas.id', '=', 'cuentas.persona_id')
                ->join('bancos', 'bancos.id','=', 'cuentas.banco_id')
                ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
                ->join('estados','estados.id','=','cuentas.estado_id')
                ->join('monedas','tipo_cuentas.moneda_id','=','monedas.id')
                ->where('persona_id', $user->id)
                ->where('cuentas.estado_id',1)
                ->orderBy('cuentas.id')
                ->get();

            return $query;
        }else{
            return "no se encontro usuario";
        }

    }


    public static function verDetalleCuenta($numeroCuenta){

            $query = DB::table('cuentas')
                ->select(
                    'cuentas.id as idCuenta',
                    'cuentas.CBU as CBU',
                    'cuentas.alias as alias',
                    'cuentas.numeroCuenta as numeroCuenta',
                    'cuentas.isFavorita as isFavorita',
                    'cuentas.descripcion as descripcion',
                    'cuentas.isCuentaPropia as isCuentaPropia',
                    'cuentas.saldoDisponible as saldoDisponible',
                    'cuentas.saldoBloqueado as saldoBloqueado',
                    'personas.nombre as nombreTitular',
                    'personas.apellido as apellidoTitular',
                    'personas.dni as dniTitular',
                    'bancos.nombre as descripcionBanco',
                    'bancos.logoUrl as logoBanco',
                    'tipo_cuentas.acronimo as acronimoTipoCuenta',
                    'tipo_cuentas.descripcion as tipoCuentaDescrip',
                    'monedas.descripcion as monedaDescrip',
                    'monedas.simbolo as monedaSimbolo',
                )
                ->join('personas', 'personas.id', '=', 'cuentas.persona_id')
                ->join('bancos', 'bancos.id','=', 'cuentas.banco_id')
                ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
                ->join('estados','estados.id','=','cuentas.estado_id')
                ->join('monedas','tipo_cuentas.moneda_id','=','monedas.id')
                ->where('numeroCuenta', $numeroCuenta)
                ->orderBy('cuentas.id')
                ->get();

            return $query;
    }

    public static function nroCuentaAleatorio(){
        $nroCuenta = str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_RIGHT);
        return $nroCuenta;
    }

    public static function cbuAleatorio(){
        $cbu  = str_pad(mt_rand(1, 999999999999999999), 22, '0', STR_PAD_RIGHT);
        return $cbu;
    }

    public static function aliasAleatorio(){
        $listaDePalabras = ['MANZANA', 'MONTAÑA', 'PUMA', 'GUITARRA', 'FRESCO', 'PIÑA'];
        $palabra1  = mt_rand(0, count($listaDePalabras) - 1);
        $palabra2  = mt_rand(0, count($listaDePalabras) - 1);
        return $listaDePalabras[$palabra1] . "." . $listaDePalabras[$palabra2];
    }

    public static function darDeBaja($numeroCuenta){

        $query = DB::table('cuentas')
            ->select(
                'cuentas.id as idCuenta',
                'cuentas.numeroCuenta as numeroCuenta',
                'estados.id as estadoId',
                'tipo_cuentas.acronimo as acronimoTipoCuenta',
                'tipo_cuentas.descripcion as tipoCuentaDescrip',
                'monedas.descripcion as monedaDescrip',
                'monedas.simbolo as monedaSimbolo',
            )
            ->join('estados','estados.id','=','cuentas.estado_id')
            ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
            ->join('monedas','tipo_cuentas.moneda_id','=','monedas.id')
            ->where('numeroCuenta', $numeroCuenta)
            ->orderBy('cuentas.id')
            ->get();

        return $query;
    }

    public static function verCuentaId($cuenta_id){

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $query = DB::table('cuentas')
            ->select(
                'cuentas.id as idCuenta',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.isFavorita as isFavorita',
                'cuentas.isCuentaPropia as isCuentaPropia',
                'cuentas.saldoDisponible as saldoDisponible',
                'cuentas.saldoBloqueado as saldoBloqueado',
                'personas.nombre as nombreTitular',
                'personas.apellido as apellidoTitular',
                'personas.dni as dniTitular',
                'bancos.nombre as descripcionBanco',
                'bancos.logoUrl as logoBanco',
                'tipo_cuentas.acronimo as acronimoTipoCuenta',
                'tipo_cuentas.descripcion as tipoCuentaDescrip',
                'monedas.descripcion as monedaDescrip',
                'monedas.simbolo as monedaSimbolo',
            )
            ->join('personas', 'personas.id', '=', 'cuentas.persona_id')
            ->join('bancos', 'bancos.id','=', 'cuentas.banco_id')
            ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
            ->join('estados','estados.id','=','cuentas.estado_id')
            ->join('monedas','tipo_cuentas.moneda_id','=','monedas.id')
            ->where('cuentas.id', $cuenta_id)
            ->where('cuentas.user_id', $user->id)
            ->orderBy('cuentas.id')
            ->get();

        return $query;
    }

    public static function verCuentaBeneficiario($cuenta_id, $id_beneficiario){

        $query = DB::table('cuentas')
            ->select(
                'cuentas.id as idCuenta',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.isFavorita as isFavorita',
                'cuentas.isCuentaPropia as isCuentaPropia',
                'cuentas.saldoDisponible as saldoDisponible',
                'cuentas.saldoBloqueado as saldoBloqueado',
                'personas.nombre as nombreTitular',
                'personas.apellido as apellidoTitular',
                'personas.dni as dniTitular',
                'bancos.nombre as descripcionBanco',
                'bancos.logoUrl as logoBanco',
                'tipo_cuentas.acronimo as acronimoTipoCuenta',
                'tipo_cuentas.descripcion as tipoCuentaDescrip',
                'monedas.descripcion as monedaDescrip',
                'monedas.simbolo as monedaSimbolo',
            )
            ->join('bancos', 'bancos.id','=', 'cuentas.banco_id')
            ->join('personas', 'personas.id','=', 'cuentas.persona_id')
            ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
            ->join('estados','estados.id','=','cuentas.estado_id')
            ->join('monedas','tipo_cuentas.moneda_id','=','monedas.id')
            ->where('cuentas.id', $cuenta_id)
            ->where('cuentas.persona_id', $id_beneficiario)
            ->orderBy('cuentas.id')
            ->get();

        return $query;
    }

    public static function obtenerSaldo($cuentaId){

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $saldo = 0;

        $query = DB::table('cuentas')
            ->select(
                'cuentas.saldoDisponible as saldoDisponible',
            )
            ->where('cuentas.id', $cuentaId)
            ->where('cuentas.user_id', $user->id)
            ->get();

        foreach ($query as $valor) {
            $saldo = $valor->saldoDisponible;
        }

        return $saldo;
    }

    public static function buscarBeneficiarioAlias($alias){

        $query = DB::table('cuentas')
            ->select(
                'cuentas.id as idCuenta',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.isFavorita as isFavorita',
                'cuentas.isCuentaPropia as isCuentaPropia',
                'personas.nombre as nombreTitular',
                'personas.apellido as apellidoTitular',
                'personas.dni as dniTitular',
                'bancos.nombre as descripcionBanco',
                'bancos.logoUrl as logoBanco'
            )
            ->join('personas', 'personas.id', '=', 'cuentas.persona_id')
            ->join('bancos', 'bancos.id','=', 'cuentas.banco_id')
            ->join('tipo_cuentas', 'tipo_cuentas.id', '=', 'cuentas.tipocuenta_id')
            ->where('cuentas.alias', 'LIKE', "%$alias%")
            ->orderBy('cuentas.id')
            ->get();

        return $query;
    }


}
