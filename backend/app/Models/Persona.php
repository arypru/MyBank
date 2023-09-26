<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Persona extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }

    public static function calcularEdad($fecha_actual, $fecha_nac){
        return $fecha_actual - $fecha_nac;
    }

    public function setFechaNacimiento($value)
    {
        return $this->attributes['fecha_nacimiento'] = Carbon::parse($value);
    }

    public static function getFechaNacimiento($value){
        return Carbon::parse($value)->format('d/m/Y');
    }


}
