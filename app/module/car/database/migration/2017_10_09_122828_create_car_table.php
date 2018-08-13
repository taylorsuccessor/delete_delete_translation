<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('car', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('email');

            $table->string('type');

            $table->string('phone');


            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('car', function (Blueprint $table) {
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

        Schema::dropIfExists('car');
    }
}
