<?php

use Illuminate\Database\Seeder;
use Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'email' => 'zekaroz@gmail.com',
            'name' => 'José Queirós',
            'password' => Hash::make('123456')
         ]);

         $faker = Faker\Factory::create();

         foreach(range(1,20) as $index){
             User::create([
                'email' => $faker->email,
                'name' => $faker->name,
                'password' => Hash::make('123456')
             ]);
         }


    }
}
