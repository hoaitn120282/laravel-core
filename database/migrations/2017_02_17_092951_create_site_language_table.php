<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_language',function (Blueprint $table){
            $table->bigIncrements('site_language_id');
            $table->bigInteger('country_id')->default(0)->unsigned();
            $table->bigInteger('site_id')->default(0)->unsigned();

            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('site_language');
    }
}
