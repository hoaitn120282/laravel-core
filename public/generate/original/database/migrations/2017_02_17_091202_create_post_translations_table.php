<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post_translations',function (Blueprint $table){
            $table->bigIncrements('post_translations_id');
            $table->bigInteger('post_id')->default(0)->unsigned();
            $table->string('locale');
            $table->text('post_title');
            $table->text('post_excerpt');
            $table->longText('post_content');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

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
        Schema::dropIfExists('post_translations');
    }
}
