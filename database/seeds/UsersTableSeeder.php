<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        /*  for brand new environments
       User::truncate();*/

       User::create([
                'email' => 'zekaroz@gmail.com',
                'name' => 'José Queirós',
                'password' => Hash::make('123456')
             ]);


         foreach(range(1,50) as $index){
             User::create([
                'email' => $faker->email,
                'name' => $faker->name,
                'password' => Hash::make('123456')
             ]);
         }
  }
}
