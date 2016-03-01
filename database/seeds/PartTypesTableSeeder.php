<?php

use Illuminate\Database\Seeder;
use App\PartType;

class PartTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartType::create([
           'name' => 'Interiores',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Vidros',
           'code' => 'glass'
        ]);
        PartType::create([
           'name' => 'Espelhos',
           'code' => 'mirror'
        ]);
        PartType::create([
           'name' => 'Pneus',
           'code' => 'Tyre'
        ]);
        PartType::create([
           'name' => 'Jantes',
           'code' => 'wheel'
        ]);
        PartType::create([
           'name' => 'Escapes',
           'code' => 'exaust'
        ]);
        PartType::create([
           'name' => 'Direcção',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Hidraulicos',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Travões',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Embraiagem',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Turbo',
           'code' => 'Int'
        ]);
        PartType::create([
           'name' => 'Intercooler',
           'code' => 'Int'
        ]);
    }
}
