<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHyperpayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hyperpay', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id')->nullable();

            $table->string('amount')->nullable();

            $table->string('checkout_body')->nullable();

            $table->string('checkout_id')->nullable();

            $table->string('note')->nullable();

            $table->string('response_body')->nullable();

            $table->string('response_status')->nullable();

            $table->string('return_url')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('hyperpay', function (Blueprint $table) {
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

        Schema::dropIfExists('hyperpay');
    }
}
