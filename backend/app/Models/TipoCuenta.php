<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;

    public function moneda(){
        return $this->hasOne(Moneda::class);
    }

}
