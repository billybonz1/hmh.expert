<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("message");
            $table->bigInteger("from_id")->unsigned();
            $table->bigInteger("to_id")->unsigned();
            $table->bigInteger("chat_id")->unsigned();
            $table->bigInteger("readed")->default('0');
            $table->foreign("chat_id")->references("id")->on('chats')->onDelete("cascade");
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
        Schema::table('messages', function(Blueprint $table){
            $table->dropForeign('messages_chat_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
}
