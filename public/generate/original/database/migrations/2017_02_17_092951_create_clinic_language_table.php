<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clinic_language',function (Blueprint $table){
            $table->bigIncrements('clinic_language_id');
            $table->bigInteger('country_id')->default(0)->unsigned();
            $table->bigInteger('clinic_id')->default(0)->unsigned();

            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('clinic_language');
    }
}
