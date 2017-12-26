<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clinic_database',function (Blueprint $table){
            $table->bigIncrements('clinic_database_id');
            $table->bigInteger('clinic_id')->default(0)->unsigned();
            $table->string('host',255)->nullable();
            $table->string('port',255)->nullable();
            $table->string('database_name',255)->nullable();
            $table->string('table_prefix',255)->nullable();
            $table->string('username',255)->nullable();
            $table->string('password',255)->nullable();
            $table->text('description')->nullable();

            $table->foreign('clinic_id')->references('clinic_id')->on('site')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('clinic_database');
    }
}
