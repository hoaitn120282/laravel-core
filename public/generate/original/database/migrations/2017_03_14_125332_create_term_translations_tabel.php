<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermTranslationsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('term_id')->default(0)->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('description');
            $table->foreign('term_id')->references('term_id')->on('terms')->onDelete('cascade');
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
        Schema::drop('term_translations');
    }
}
