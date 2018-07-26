<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vue', function (Blueprint $table) {
            $table->increments('id');

    $table->string('email');

    $table->string('password');

    $table->string('name')->default('default');

    $table->string('birth_day')->default('1985-01-01');

    $table->string('phone')->default('777777');

    $table->string('gender')->default(0);


$table->timestamps();
        });

//        Schema::table('vue', function (Blueprint $table) {
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

        Schema::dropIfExists('vue');
    }
}
