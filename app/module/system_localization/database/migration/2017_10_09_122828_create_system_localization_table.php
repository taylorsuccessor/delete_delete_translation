<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemLocalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('system_localization', function (Blueprint $table) {
            $table->increments('id');

            $table->string('key')->nullable();
            $table->string('en')->nullable();
            $table->string('ar')->nullable();
           $table->timestamps();
           $table->softDeletes();

        });

//        Schema::table('system_localization', function (Blueprint $table) {
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

        Schema::dropIfExists('system_localization');
    }
}
