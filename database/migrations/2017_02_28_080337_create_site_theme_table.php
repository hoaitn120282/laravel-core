<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_theme', function (Blueprint $table) {
            $table->bigIncrements('site_theme_id');

            $table->bigInteger('site_id')->default(0)->unsigned();
            $table->bigInteger('theme_id')->default(0)->unsigned();

            $table->foreign('site_id')->references('site_id')->on('site')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_theme');
    }
}
