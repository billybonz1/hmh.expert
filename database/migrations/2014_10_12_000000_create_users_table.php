<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('name');
            $table->string('lastname')->default('');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('country')->default('');
            $table->string('city')->default('');
            $table->string('phone')->default('');
            $table->string('skype')->default('');
            $table->string('vk')->default('');
            $table->string('od')->default('');
            $table->string('fb')->default('');
            $table->string('refer')->default('');
            $table->string('avatar')->default('');
            $table->float('balance')->default('0');
            $table->bigInteger('groups_messages')->default('3');
            $table->text('about')->nullable();
            $table->text('consulting_themes')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
