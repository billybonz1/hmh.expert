<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForPostPostsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_posts_category', function (Blueprint $table) {
            $table->foreign("posts_category_id")->references("id")->on('posts_categories')->onDelete("cascade");
            $table->foreign("post_id")->references("id")->on('posts')->onDelete("cascade");
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('post_posts_category', function(Blueprint $table){
            $table->dropForeign('post_posts_category_posts_category_id_foreign');
            $table->dropForeign('post_posts_category_post_id_foreign');
        });
    }
}
