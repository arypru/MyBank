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

    public static function calcularEdad($fecha_nac){

        $fecha_actual = Carbon::now();
        $fechaNacimiento = Carbon::createFromDate($fecha_nac);

        $edad = $fechaNacimiento->diffInYears($fecha_actual);

        return $edad;
    }

    public static function getFechaNacimiento($value){
        return Carbon::parse($value)->format('d/m/Y');
    }


}
