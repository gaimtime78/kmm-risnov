<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitiPengabdiMagister extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peneliti_pengabdi_magister', function (Blueprint $table) {
            $table->id();
            $table->string('fakultas');
            $table->string('status');
            $table->string('jenjang');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('25sd35_L');
            $table->string('25sd35_P');
            $table->string('25sd35_jumlah');
            $table->string('36sd45_L');
            $table->string('36sd45_P');
            $table->string('36sd45_jumlah');
            $table->string('46sd55_L');
            $table->string('46sd55_P');
            $table->string('46sd55_jumlah');
            $table->string('56sd65_L');
            $table->string('56sd65_P');
            $table->string('56sd65_jumlah');
            $table->string('66sd75_L');
            $table->string('66sd75_P');
            $table->string('66sd75_jumlah');
            $table->string('75_L');
            $table->string('75_P');
            $table->string('75_jumlah');
            $table->string('total');
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('peneliti_pengabdi_magister');
    }
}
