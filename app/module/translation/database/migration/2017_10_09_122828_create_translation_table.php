<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('translation', function (Blueprint $table) {
            $table->increments('id');

    $table->string('translate_en')->default(0);

    $table->string('translate_ar')->default(0);

    $table->string('translate_before_en')->default(0);

    $table->string('translate_after_en')->default(0);

    $table->string('translate_before_ar')->default(0);

    $table->string('translate_after_ar')->default(0);

    $table->string('user_id')->default(0);

    $table->string('status')->default(0);


$table->timestamps();
        });

//        Schema::table('translation', function (Blueprint $table) {
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

        Schema::dropIfExists('translation');
    }
}
