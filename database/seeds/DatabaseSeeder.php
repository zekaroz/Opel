<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call(ShopsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PartTypesTableSeeder::class);
        $this->call(ArticleTypesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
    }
}
