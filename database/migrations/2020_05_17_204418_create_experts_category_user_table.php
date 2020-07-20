 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsCategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts_category_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("experts_category_id")->unsigned();
            $table->foreign('experts_category_id')->references('id')->on('experts_categories')->onDelete('cascade');
            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('experts_category_user', function (Blueprint $table) {
            $table->dropForeign('experts_category_user_experts_category_id_foreign');
            $table->dropForeign('experts_category_user_user_id_foreign');
        });
        Schema::dropIfExists('experts_category_user');
    }
}
