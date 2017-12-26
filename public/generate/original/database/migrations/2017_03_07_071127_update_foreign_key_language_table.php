<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_language', function (Blueprint $table) {
            //

            $table->dropForeign('clinic_language_country_id_foreign');
            $table->dropColumn('country_id');
            $table->bigInteger('language_id')->default(0)->unsigned();
            $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_language', function (Blueprint $table) {
            //
            $table->addColumn('country_id');
            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
            $table->dropForeign('clinic_language_language_id_foreign');
            $table->dropColumn('language_id');
        });
    }
}
