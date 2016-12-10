<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('fiscal_number')->->nullable();
          $table->text('description')->nullable();
          $table->date('invoice_date');
          $table->decimal('total',15,2)->nullable();
          $table->softDeletes();
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->drop('invoices');
        });
    }
}
