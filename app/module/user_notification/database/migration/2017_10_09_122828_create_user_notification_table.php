<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_notification', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id')->default(0);

            $table->string('title')->nullable();

            $table->string('body')->nullable();

            $table->string('url')->nullable();

            $table->string('is_read')->default(false);


            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('user_notification', function (Blueprint $table) {
//            $table->renameColumn('price', 'total');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('user_notification');
    }
}
