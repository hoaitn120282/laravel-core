<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_info',function (Blueprint $table){
            $table->bigIncrements('site_info_id');
            $table->bigInteger('site_id')->default(0)->unsigned();
            $table->string('site_name',255)->nullable();
            $table->string('site_slogan',255)->nullable();
            $table->string('username',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('password',255)->nullable();
            $table->text('description')->nullable();
            $table->foreign('site_id')->references('site_id')->on('site')->onDelete('cascade');

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
        Schema::dropIfExists('site_info');
    }
}