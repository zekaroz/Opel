<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableForGoogle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       if(Schema::hasColumn('users', 'first_name')) {
       } else
       {
         Schema::table('users', function ($table) {
           $table->string('first_name');
           $table->string('last_name');
         });
       }
     }
     public function down()  {
       Schema::table('users', function ($table) {
         $table->dropColumn('first_name');
         $table->dropColumn('last_name');
       });
     }
}
