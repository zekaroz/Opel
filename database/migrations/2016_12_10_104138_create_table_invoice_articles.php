<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInvoiceArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_articles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('invoice_id')->unsigned();
          $table->integer('article_id')->unsigned();
          $table->integer('quantity');
          $table->decimal('unit_price',15,2)->nullable();
          $table->decimal('sub_total',15,2)->nullable();

          $table->foreign('article_id')
                ->references('id')
                ->on('articles');
          $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_articles', function (Blueprint $table) {
            $table->dropIfExists('invoice_articles');
        });
    }
}
