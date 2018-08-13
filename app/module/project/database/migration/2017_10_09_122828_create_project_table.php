<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('from_language')->nullable();
            $table->string('to_language')->nullable();
            $table->string('status')->nullable();
           $table->timestamps();
           $table->softDeletes();

        });

//        Schema::table('project', function (Blueprint $table) {
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

        Schema::dropIfExists('project');
    }
}
