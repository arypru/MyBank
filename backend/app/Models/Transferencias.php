<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Transferencias extends Model
{
    use HasFactory;

    public function cuentas(){
        return $this->hasOne(Cuenta::class);
    }

    public function users(){
        return $this->hasOne(User::class);
    }

    public function banco(){
        return $this->hasOne(Banco::class);
    }

    public function monedas(){
        return $this->hasOne(Moneda::class);
    }

    public static function actualizarSaldoOrigen($cuenta_origen_id, $monto){

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $cuentasOrigen = DB::table('cuentas')
            ->select('cuentas.saldoDisponible as saldo')
            ->whereRaw('user_id =' . $user->id )
            ->whereRaw('banco_id =' . 1)
            ->whereRaw('id =' .$cuenta_origen_id)
            ->get();

        foreach ($cuentasOrigen as $valor) {
            $saldo = $valor->saldo;
        }

       $total = $saldo - $monto;

        return $total;
    }

    public static function buscarBeneficiario($cuenta_benef_id){

        $user_id = 0;

        $cuentaDestinoTercero= DB::table('cuentas')
            ->whereRaw('id =' . $cuenta_benef_id)
            ->get();

        foreach ($cuentaDestinoTercero as $valor) {
            $user_id = $valor->persona_id;
        }

        return $user_id;
    }

    public static function actualizarSaldoDestino($cuenta_dest_id, $monto){

        $saldo = 0;

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $cuentasDestino = DB::table('cuentas')
            ->select('cuentas.saldoDisponible as saldo')
            ->whereRaw('user_id =' . $user->id )
            ->whereRaw('isCuentaPropia =' . 1)
            ->whereRaw('id =' .$cuenta_dest_id)
            ->get();

        foreach ($cuentasDestino as $valor) {
            $saldo = $valor->saldo;
        }

        $total = $saldo + $monto;

        return $total;
    }

    public static function actualizarSaldoDestinoTercero($cuenta_dest_id, $beneficiario_id, $monto){

        $saldo = 0;

        $cuentasDestino = DB::table('cuentas')
            ->select('cuentas.saldoDisponible as saldo')
            ->whereRaw('persona_id =' . $beneficiario_id)
            ->whereRaw('id =' .$cuenta_dest_id)
            ->get();

        foreach ($cuentasDestino as $valor) {
            $saldo = $valor->saldo;
        }

        $total = $saldo + $monto;

        return $total;
    }

    public static function verTransferenciaId($id){

        $query = DB::table('transferencias')
            ->select(
                'transferencias.id as id',
                'transferencias.tipo_transaccion as tipo_transaccion',
                'transferencias.referencia as referencia',
                'transferencias.descripcion as descripcion',
                'transferencias.importe as importe',
                'transferencias.fecha_op as fecha_op',
                'transferencias.estado as estado',
                'transferencias.saldoAnteriorOrigen as saldoAnteriorOrigen',
                'transferencias.saldoActualizadoOrigen as saldoActualizadoOrigen',
                'transferencias.saldoAnteriorDestino as saldoAnteriorDestino',
                'transferencias.saldoActualizadoDestino as saldoActualizadoDestino',
                'monedas.descripcion as moneda_Desp',
                'monedas.simbolo as simbolo'
            )
            ->where('transferencias.id', $id)
            ->join('monedas', 'monedas.id', '=', 'transferencias.moneda_id')
            ->get();

        return $query;
    }

}
