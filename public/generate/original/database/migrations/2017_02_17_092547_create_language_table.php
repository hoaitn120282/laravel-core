<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('language',function (Blueprint $table){
            $table->bigIncrements('language_id');
            $table->bigInteger('country_id')->default(0)->unsigned();
            $table->string('name');
            $table->string('image');
            $table->text('description');

            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('language');
    }
}
