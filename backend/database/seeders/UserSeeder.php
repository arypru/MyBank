<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    Private $arrayUser = array (

        array(
            'persona_id' => 1,
            'nombre_user' => 'mperez',
            'email'=>'mariaperez@gmail.com',
            'password'=>'maria123'),

        array(
            'persona_id' => 2,
            'nombre_user' => 'sgomez',
            'email'=>'selenagomex@gmail.com',
            'password'=>'selena123'),

        array(
            'persona_id' => 3,
            'nombre_user' => 'sbritez',
            'email'=>'sarabritez@gmail.com',
            'password'=>'sara123'),

    );

    public function run(): void
    {
        foreach ($this->arrayUser as $u)
        {
            $user = new User();
            $user->persona_id = $u['persona_id'];
            $user->nombre_user = $u['nombre_user'];
            $user->email = $u['email'];
            $user->password = $u['password'];
            $user->save();
        }
    }
}
