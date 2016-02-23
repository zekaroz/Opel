<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_models', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->integer('brand_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            
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
        Schema::drop('brand_models');
    }
}
