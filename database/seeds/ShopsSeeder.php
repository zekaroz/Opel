<?php

use Illuminate\Database\Seeder;
use App\Shop;
use Carbon\Carbon;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

    //  Shop::truncate();
      $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());
  
       foreach(range(1,20) as $index){
             Shop::create([
               'name' => $faker->name,
               'shopDescription' => $faker->realText($maxNbChars = 200, $indexSize = 2),
               'location' => $faker->city,
               'contactNumber' => $faker->phoneNumber,
               'openingDate' => $startDate->toDateTimeString(),
               'email' => $faker->companyEmail
               ]);
       }

    }
}
