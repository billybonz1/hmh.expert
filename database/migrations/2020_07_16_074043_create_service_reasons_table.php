<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reasons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("service_id")->unsigned();
            $table->string("text");
            $table->timestamps();
        });

        Schema::table('service_reasons', function(Blueprint $table){
            $table->foreign("service_id")->references("id")->on('services')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_reasons', function(Blueprint $table){
            $table->dropForeign('service_reasons_service_id_foreign');
        });
        Schema::dropIfExists('service_reasons');
    }
}
