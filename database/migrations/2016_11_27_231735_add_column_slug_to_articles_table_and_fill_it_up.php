<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Article;

class AddColumnSlugToArticlesTableAndFillItUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug');
        });

        foreach(Article::all() as $article){
            $article->slug = str_slug($article->name) .'-' .$article->id;
            $article->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
          $table->dropColumn('slug');

        });
    }
}
