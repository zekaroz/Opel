<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileentries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('path');
                        $table->string('thumbnail_path');
			$table->string('filename');
			$table->string('mime');
			$table->string('original_filename');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('fileentries');
    }
}
