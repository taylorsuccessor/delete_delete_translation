<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('upload_file', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id')->nullable();
            $table->string('upload_group_id')->nullable();
            $table->string('name')->nullable();
            $table->string('original_name')->nullable();
            $table->string('new_name')->nullable();
            $table->string('upload_base_url')->nullable();
            $table->string('detail')->nullable();
           $table->timestamps();
           $table->softDeletes();

        });

//        Schema::table('upload_file', function (Blueprint $table) {
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

        Schema::dropIfExists('upload_file');
    }
}
