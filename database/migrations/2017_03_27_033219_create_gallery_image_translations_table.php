<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryImageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_image_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gallery_image_id')->unsigned();
            $table->string('locale');
            $table->string('image_title');
            $table->text('image_description');
            $table->timestamps();
            $table->foreign('gallery_image_id')->references('id')->on('gallery_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery_image_translations');
    }
}
