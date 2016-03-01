<?php

use Illuminate\Database\Seeder;
use App\ArticleType;
class ArticleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*Codes required P and C */

        ArticleType::create([
           'name' => 'Automóveis Reciclados',
           'code' => 'C'
        ]);
        ArticleType::create([
           'name' => 'Peças Recicladas',
           'code' => 'P'
        ]);
    }
}
