<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PersonaSeeder extends Seeder
{

    private $arrayPersona = array(

        array(
            'nombre' => 'Maria Itati',
            'apellido' => 'Perez',
            'dni' => 20789456,
            'telefono' => '+37947845152',
            'cuil' => 27207894564,
            'direccion' => 'Pedro Araoz 1501',
            'sexo' => 'Femenino',
            'edad' => '24'
        ),

        array(
            'nombre' => 'Selena',
            'apellido' => 'Gomex',
            'dni' => 20418784,
            'telefono' => '+37947845152',
            'cuil' => 27204187844,
            'direccion' => 'Calle N522',
            'sexo' => 'Femenino',
            'edad' => '29'
        ),

        array(
            'nombre' => 'Juan',
            'apellido' => 'Romero',
            'dni' => 38741852,
            'telefono' => '+37947845152',
            'cuil' => 20387418522,
            'direccion' => 'Paraguay 147',
            'sexo' => 'Masculino',
            'edad' => '29'
        ),

        array(
            'nombre' => 'Miguel',
            'apellido' => 'Pruyas',
            'dni' => 38789456,
            'telefono' => '+37947845152',
            'cuil' => 20387894564,
            'direccion' => 'Calle N522',
            'sexo' => 'Masculino',
            'edad' => '33'
        )
    );

    public function run(): void
    {

        $fecha_nacimiento = Carbon::createFromFormat('d/m/Y', '15/04/1999');

        foreach ($this->arrayPersona as $p) {
            $persona = new Persona();
            $persona->nombre = $p['nombre'];
            $persona->apellido = $p['apellido'];
            $persona->dni = $p['dni'];
            $persona->telefono = $p['telefono'];
            $persona->cuil = $p['cuil'];
            $persona->direccion = $p['direccion'];
            $persona->fecha_nacimiento = $fecha_nacimiento;
            $persona->sexo = $p['sexo'];
            $persona->edad = $p['edad'];
            $persona->save();
        }
    }
}
