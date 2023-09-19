<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call(MonedaSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(TipoCuentaSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CuentaSeeder::class);
    }
}
