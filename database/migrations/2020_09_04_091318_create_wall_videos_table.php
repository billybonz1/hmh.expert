<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWallVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wall_videos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("desc");
            $table->string("file_name");
            $table->string("img");
            $table->bigInteger("user_id");
            $table->string("duration");
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
        Schema::dropIfExists('wall_videos');
    }
}
