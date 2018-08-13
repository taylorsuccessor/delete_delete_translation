<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email');

            $table->string('guest_email')->nullable();

            $table->string('password');

            $table->string('android_device_id')->nullable();

            $table->string('ios_device_id')->nullable();

            $table->string('last_login')->nullable();

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('birth_day')->nullable();

            $table->string('avatar')->nullable();

            $table->string('phone')->nullable();

            $table->string('mobile')->nullable();

            $table->string('area_id')->nullable();

            $table->string('country')->nullable();

            $table->string('address')->nullable();

            $table->string('gender')->nullable();

            $table->string('occupation')->nullable();

            $table->string('type')->nullable();

            $table->string('session_id')->nullable();

            $table->string('lat')->nullable();

            $table->string('long')->nullable();

            $table->string('remember_token')->nullable();
            $table->string('token')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('user', function (Blueprint $table) {
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

        Schema::dropIfExists('user');
    }
}
