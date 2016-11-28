<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsStarredToFileEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            $table->boolean('is_starred');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            $table->dropColumn('is_starred');
        });
    }
}
