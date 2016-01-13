<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('reference');
            $table->string('description');
            $table->decimal('price',15,2);
            $table->integer('shop_id')->unsigned();
            $table->integer('article_type_id')->unsigned();
            $table->integer('part_type_id')->unsigned();
            $table->integer('model_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('shop_id')
                  ->references('id')
                  ->on('shops');
            $table->foreign('article_type_id')
                  ->references('id')
                  ->on('article_types');
            $table->foreign('part_type_id')
                  ->references('id')
                  ->on('part_types');
            $table->foreign('model_id')
                  ->references('id')
                  ->on('brand_models');
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            Schema::drop('articles');
        });
    }
}
