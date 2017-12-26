<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site',function (Blueprint $table){
            $table->bigIncrements('site_id');
            $table->bigInteger('theme_id')->default(0)->unsigned();
            $table->string('domain',255)->nullable();
            $table->enum('is_same_hosting',[0,1])->default(1);
            $table->text('contact_info')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('site');
    }
}
