<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTelephoneToClinicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_info', function (Blueprint $table) {
            $table->integer('telephone')->default(0)->after('clinic_id');
            $table->string('address')->default(null)->after('telephone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_info', function (Blueprint $table) {
            Schema::dropIfExists('telephone');
        });
    }
}
