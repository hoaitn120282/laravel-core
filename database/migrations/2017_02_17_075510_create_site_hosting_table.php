<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteHostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_hosting',function (Blueprint $table){
            $table->bigIncrements('site_hosting_id');
            $table->bigInteger('site_id')->default(0)->unsigned();
            $table->string('host',255)->nullable();
            $table->string('port',255)->nullable();
            $table->string('username',255)->nullable();
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
        Schema::dropIfExists('site_hosting');
    }
}
