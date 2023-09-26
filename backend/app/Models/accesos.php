<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class accesos extends Model
{
    use HasFactory;

    public function devices(){
        return $this->hasOne(Devices::class);
    }

    public function usuario(){
        return $this->hasOne(User::class);
    }

    public static function buscarDevicesUser($id_user){

        $query = DB::table('accesos')
            ->select(
                'accesos.id as accesoId',
                'accesos.ultima_conexion as ultimaConexion',
                'accesos.ip as ip',
                'devices.device_name as servicioNombre',
                'devices.browser as browser',
                'devices.os as os',
            )
            ->join('devices', 'devices.id', '=', 'accesos.devices_id')
            ->where('user_id', $id_user)
            ->orderByDesc('accesos.ultima_conexion')
            ->get();

        return $query;
    }

}
