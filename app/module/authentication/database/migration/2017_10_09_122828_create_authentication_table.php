<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthenticationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('authentication', function (Blueprint $table) {
            $table->increments('id');

    $table->string('email');

    $table->string('password');


$table->timestamps();
        });

//        Schema::table('authentication', function (Blueprint $table) {
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

        Schema::dropIfExists('authentication');
    }
}
