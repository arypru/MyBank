<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accesos extends Model
{
    use HasFactory;

    public function devices(){
        return $this->hasOne(Devices::class);
    }

    public function usuario(){
        return $this->hasOne(User::class);
    }


}
