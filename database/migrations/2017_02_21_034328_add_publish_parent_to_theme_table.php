<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishParentToThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->bigInteger('parent_id')->default(0)->after('id');
            $table->bigInteger('is_publish')->default(0)->after('parent_id');
            $table->bigInteger('theme_type_id')->default(1)->after('is_publish');
//            $table->foreign('theme_type_id')->references('theme_type_id')->on('theme_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('is_publish');
            $table->dropColumn('theme_type_id');
        });
    }
}
