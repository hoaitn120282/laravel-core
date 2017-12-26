<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clinic_info',function (Blueprint $table){
            $table->bigIncrements('clinic_info_id');
            $table->bigInteger('clinic_id')->default(0)->unsigned();
            $table->string('site_name',255)->nullable();
            $table->string('site_slogan',255)->nullable();
            $table->string('username',255)->nullable();
            $table->string('email',255)->nullable();
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
        Schema::dropIfExists('clinic_info');
    }
}