<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableForFacebook extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    if(Schema::hasColumn('users', 'facebook_id')) {
    } else
    {
      Schema::table('users', function ($table) {
        $table->string('facebook_id');
      });
    }
  }
  public function down()  {
    Schema::table('users', function ($table) {
      $table->dropColumn('facebook_id');
    });
  }
}
