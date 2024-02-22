<?php

namespace Database\Seeders;

use App\Models\Personales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = Personales::create([
            "nombre" => "Cristian",
            "apellido" => "Huaman",
            "texto" => "despedido",
            "celular" => "123456",
        ]);
    }
}
