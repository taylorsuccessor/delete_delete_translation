<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');

            $table->string('name');
            $table->string('allow_permission');
            $table->string('deny_permission');


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

        Schema::dropIfExists('role');
    }
}
