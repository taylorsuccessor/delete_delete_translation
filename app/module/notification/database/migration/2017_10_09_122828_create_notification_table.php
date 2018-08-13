<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('title');
            $table->string('type');
            $table->string('status');
            $table->string('to_field')->nullable();
            $table->string('to_email')->nullable();

            $table->string('language')->nullable();

            $table->string('data')->nullable();

            $table->text('body')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('role', function (Blueprint $table) {
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

        Schema::dropIfExists('notification');
    }
}
