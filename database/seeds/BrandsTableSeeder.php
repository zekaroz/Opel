<?php

use Illuminate\Database\Seeder;
use App\Brand;
use App\BrandModel;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
           'name' => 'Opel',
           'code' => ''
        ]);

              BrandModel::create([
                 'name' => 'Corsa',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Vectra',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Insignia',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Astra',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Mondeo',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);

        $brand = Brand::create([
           'name' => 'Audi',
           'code' => ''
        ]);

              BrandModel::create([
                 'name' => 'A1',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A2',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A3',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A4',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A5',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'TT',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A6',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A7',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'A8',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);

        $brand = Brand::create([
           'name' => 'Renault',
           'code' => ''
        ]);

              BrandModel::create([
                 'name' => 'Clio',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Espace',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Kangoo',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Megane',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Laguna',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Modus',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Fluence',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);
              BrandModel::create([
                 'name' => 'Captur',
                 'code' => '',
                 'brand_id' => $brand->id
              ]);

        $brand = Brand::create([
           'name' => 'Fiat',
           'code' => ''
        ]);
        $brand = Brand::create([
           'name' => 'BMW',
           'code' => ''
        ]);
        $brand = Brand::create([
           'name' => 'Seat',
           'code' => ''
        ]);
    }
}
