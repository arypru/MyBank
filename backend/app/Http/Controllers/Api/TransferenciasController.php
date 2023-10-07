<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Transferencias;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Decimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transferencias $transferencias)
    {
        //
    }

    public function verCuentasMyBank($userId)
    {
        $cuentas = DB::table('cuentas')
            ->whereRaw('user_id =' . $userId)
            ->whereRaw('banco_id =' . 1)
            ->whereRaw('isCuentaPropia =' . 1)
            ->whereRaw('estado_id =' . 1)
            ->join('bancos', 'bancos.id', '=', 'cuentas.banco_id')
            ->join('tipo_cuentas','tipo_cuentas.id','=', 'cuentas.tipocuenta_id')
            ->get([
                'cuentas.id as id',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'bancos.nombre as bancoNombre',
                'bancos.logoUrl as logoUrl',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.saldoDisponible as saldoDisponible',
                'cuentas.alias as alias',
                'tipo_cuentas.moneda_id as moneda_id',
                'tipo_cuentas.acronimo as acronimo',
                'tipo_cuentas.descripcion as descripcion'
            ]);

        foreach ($cuentas as $valor) {
            $cuentamybank = [
                'id' => $valor->id,
                'urlLogo' => asset('storage/'.$valor->logoUrl),
                'CBU' => $valor->CBU,
                'alias' =>$valor->alias,
                'bancoNombre' =>$valor->bancoNombre,
                'numeroCuenta' =>$valor->numeroCuenta,
                'saldoDisponible' =>$valor->saldoDisponible,
                'alias' =>$valor->alias,
                'moneda_id' =>$valor->moneda_id,
                'acronimo' =>$valor->acronimo,
                'descripcion' =>$valor->descripcion,
            ];

        }

        return response()->json(
            [$cuentamybank], 200);
    }

    public function verCuentasPropias($userId)
    {

        $cuentasPropias = DB::table('cuentas')
            ->whereRaw('user_id =' . $userId)
            ->whereRaw('isCuentaPropia =' . 1)
            ->whereRaw('estado_id =' . 1)
            ->join('bancos', 'bancos.id', '=', 'cuentas.banco_id')
            ->join('tipo_cuentas','tipo_cuentas.id','=', 'cuentas.tipocuenta_id')
            ->get([
                'cuentas.id as id',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'bancos.nombre as bancoNombre',
                'bancos.logoUrl as logoUrl',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.saldoDisponible as saldoDisponible',
                'cuentas.alias as alias',
                'tipo_cuentas.moneda_id as moneda_id',
                'tipo_cuentas.acronimo as acronimo',
                'tipo_cuentas.descripcion as descripcion'
            ]);


        foreach ($cuentasPropias as $valor) {
            $cuentasPropias = [
                    'id' => $valor->id,
                    'urlLogo' => asset('storage/'.$valor->logoUrl),
                    'CBU' => $valor->CBU,
                    'bancoNombre' =>$valor->bancoNombre,
                    'numeroCuenta' =>$valor->numeroCuenta,
                    'saldoDisponible' =>$valor->saldoDisponible,
                    'alias' =>$valor->alias,
                    'moneda_id' =>$valor->moneda_id,
                    'acronimo' =>$valor->acronimo,
                    'descripcion' =>$valor->descripcion,
                ];
        }

        return response()->json([$cuentasPropias], 200);
    }

    public function transferenciaPropias(Request $request)
    {

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $saldoAnteriorOrigen = Cuenta::obtenerSaldo($request->cuenta_origen_id);
        $saldoAnteriorDestino = Cuenta::obtenerSaldo($request->cuenta_dest_id);

        $saldoActualizadoOrigen = Transferencias::actualizarSaldoOrigen($request->cuenta_origen_id, $request->importe);
        $saldoActualizadoDest = Transferencias::actualizarSaldoDestino($request->cuenta_dest_id, $request->importe);

        $cuentaOrigen = DB::table('cuentas')
            ->whereRaw('user_id =' . $user->id)
            ->whereRaw('banco_id =' . 1)
            ->whereRaw('id =' . $request->cuenta_origen_id)
            ->update(['saldoDisponible' => $saldoActualizadoOrigen]);

        $cuentaDestino = DB::table('cuentas')
            ->whereRaw('user_id =' . $user->id)
            ->whereRaw('isCuentaPropia =' . 1)
            ->whereRaw('id =' . $request->cuenta_dest_id)
            ->update(['saldoDisponible' => $saldoActualizadoDest]);

        $transferenciaPropia =
            DB::table('transferencias')->insertGetId([
                'usuario_origen_id' => $user->id,
                'cuenta_origen_id' => $request->cuenta_origen_id,
                'usuario_dest_id' => $user->id,
                'cuenta_dest_id' => $request->cuenta_dest_id,
                'tipo_transaccion' => 'Transf. a mi mismo',
                'referencia' => $request->referencia,
                'descripcion' => $request->descripcion,
                'moneda_id' => $request->moneda_id,
                'importe' => $request->importe,
                'fecha_op' => Carbon::now(),
                'estado' => 'ACEPTADO',
                'saldoAnteriorOrigen' => $saldoAnteriorOrigen,
                'saldoActualizadoOrigen' => $saldoActualizadoOrigen,
                'saldoAnteriorDestino' => $saldoAnteriorDestino,
                'saldoActualizadoDestino' => $saldoActualizadoDest,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        $DetalleCuentaOrigen = Cuenta::verCuentaId($request->cuenta_origen_id);
        $DetalleCuentaDestino = Cuenta::verCuentaId($request->cuenta_dest_id);
        $DetalleTransferencia = Transferencias::verTransferenciaId($transferenciaPropia);

        return response()->json([
            $DetalleCuentaOrigen,
            $DetalleCuentaDestino,
            $DetalleTransferencia
        ], 200);
    }

    public function transferenciaTerceros(Request $request)
    {

        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $saldoAnteriorOrigen = Cuenta::obtenerSaldo($request->cuenta_origen_id);
        $saldoActualizadoOrigen = Transferencias::actualizarSaldoOrigen($request->cuenta_origen_id, $request->importe);

        $beneficiarioId = Transferencias::buscarBeneficiario($request->cuenta_benef_id);
        $saldoActualizadoDest = Transferencias::actualizarSaldoDestinoTercero($request->cuenta_benef_id, $beneficiarioId, $request->importe);


        $cuentaOrigen = DB::table('cuentas')
            ->whereRaw('persona_id =' . $user->id)
            ->whereRaw('banco_id =' . 1)
            ->whereRaw('id =' . $request->cuenta_origen_id)
            ->update(['saldoDisponible' => $saldoActualizadoOrigen]);

        $transferenciaTerceros =
            DB::table('transferencias')->insertGetId([
                'usuario_origen_id' => $user->id,
                'cuenta_origen_id' => $request->cuenta_origen_id,
                'usuario_dest_id' => $beneficiarioId,
                'cuenta_dest_id' => $request->cuenta_benef_id,
                'tipo_transaccion' => 'Transf. a terceros',
                'referencia' => $request->referencia,
                'descripcion' => $request->descripcion,
                'moneda_id' => $request->moneda_id,
                'importe' => $request->importe,
                'fecha_op' => Carbon::now(),
                'estado' => 'ACEPTADO',
                'saldoAnteriorOrigen' => $saldoAnteriorOrigen,
                'saldoActualizadoOrigen' => $saldoActualizadoOrigen,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        $DetalleCuentaOrigen = Cuenta::verCuentaId($request->cuenta_origen_id);
        $DetalleCuentaBenef = Cuenta::verCuentaBeneficiario($request->cuenta_benef_id, $beneficiarioId);
        $DetalleTransferencia = Transferencias::verTransferenciaId($transferenciaTerceros);

        return response()->json([
            $DetalleCuentaOrigen,
            $DetalleCuentaBenef,
            $DetalleTransferencia,
        ], 200);

    }

    public function buscarBeneficiarioAlias($alias)
    {

        $cuentaBeneficiario = DB::table('cuentas')
            ->where('cuentas.alias', 'LIKE', "%$alias%")
            ->join('bancos', 'bancos.id', '=', 'cuentas.banco_id')
            ->join('tipo_cuentas','tipo_cuentas.id','=', 'cuentas.tipocuenta_id')
            ->join('personas','personas.id','=', 'cuentas.persona_id')
            ->get([
                'personas.nombre as nombreTitular',
                'personas.apellido as apellidoTitular',
                'personas.dni as dniTitular',
                'cuentas.id as id',
                'cuentas.CBU as CBU',
                'cuentas.alias as alias',
                'bancos.nombre as bancoNombre',
                'bancos.logoUrl as logoUrl',
                'cuentas.numeroCuenta as numeroCuenta',
                'cuentas.saldoDisponible as saldoDisponible',
                'cuentas.alias as alias',
                'tipo_cuentas.moneda_id as moneda_id',
                'tipo_cuentas.acronimo as acronimo',
                'tipo_cuentas.descripcion as descripcion'
            ]);

        foreach ($cuentaBeneficiario as $valor) {
            $query = [
                'id' => $valor->id,
                'urlLogo' => asset('storage/'.$valor->logoUrl),
                'CBU' => $valor->CBU,
                'bancoNombre' =>$valor->bancoNombre,
                'numeroCuenta' =>$valor->numeroCuenta,
                'saldoDisponible' =>$valor->saldoDisponible,
                'alias' =>$valor->alias,
                'moneda_id' =>$valor->moneda_id,
                'acronimo' =>$valor->acronimo,
                'descripcion' =>$valor->descripcion,
                'nombreTitular'=>$valor->nombreTitular,
                'apellidoTitular'=>$valor->apellidoTitular,
                'dniTitular'=>$valor->dniTitular,

            ];
        }

        return response()->json([$query], 200);

    }

    public function verTransferencias($idUsuario)
    {
        $transferencias = DB::table('transferencias')
            ->where('transferencias.usuario_origen_id', '=', $idUsuario)
            ->join('cuentas as or', 'or.id', '=', 'transferencias.cuenta_dest_id')
            ->join('cuentas as dest', 'dest.id', '=', 'transferencias.cuenta_origen_id')
            ->orderByDesc('transferencias.id')
            ->get([
                'transferencias.id as id',
                'transferencias.tipo_transaccion as tipo_transaccion',
                'transferencias.referencia as referencia',
                'transferencias.descripcion as descripcion',
                'transferencias.importe as importe',
                'transferencias.fecha_op as fecha_op',
                'transferencias.estado as estado',
                'or.numeroCuenta as numero_cuentaDest',
                'or.alias as aliasOrigen',
                'dest.numeroCuenta as numero_cuentaOrig',
                'dest.alias as aliasDestino'
            ]);

        return response()->json([$transferencias], 200);
    }


    public function verMovimientos(Request $request){

        $cuenta = Cuenta::verDetalleCuenta($request->cuentaNumero);

        foreach ($cuenta as $valor) {
            $idCuenta = $valor->idCuenta;
        }

        $transfQuitar = DB::table('transferencias')
            ->where('transferencias.cuenta_origen_id', '=', $idCuenta)
            ->where('transferencias.usuario_origen_id', '=', $request->idUsuario)
            ->join('cuentas', 'cuentas.id', '=', 'transferencias.cuenta_dest_id' )
            ->orderByDesc('transferencias.id')
            ->get([
                'transferencias.id as id',
                'transferencias.tipo_transaccion as tipo_transaccion',
                'transferencias.referencia as referencia',
                'transferencias.descripcion as descripcion',
                'transferencias.importe as importe',
                'transferencias.fecha_op as fecha_op',
                'transferencias.estado as estado',
                'cuentas.numeroCuenta as numero_cuentaDest',
                'cuentas.alias as aliasDestino'
            ]);

        $transfAdd = DB::table('transferencias')
            ->where('transferencias.cuenta_dest_id', '=', $idCuenta)
            ->join('cuentas', 'cuentas.id', '=', 'transferencias.cuenta_dest_id' )
            ->orderByDesc('transferencias.id')
            ->get([
                'transferencias.id as id',
                'transferencias.tipo_transaccion as tipo_transaccion',
                'transferencias.referencia as referencia',
                'transferencias.descripcion as descripcion',
                'transferencias.importe as importe',
                'transferencias.fecha_op as fecha_op',
                'transferencias.estado as estado',
                'cuentas.numeroCuenta as numero_cuentaDest',
                'cuentas.alias as aliasDestino'
            ]);

        $movimientosCuentas = [
            'egresos' => $transfQuitar,
            'ingreso' => $transfAdd
        ];

        return response()->json([$movimientosCuentas], 200);

    }

}
