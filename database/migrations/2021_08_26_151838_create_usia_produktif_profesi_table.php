<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsiaProduktifProfesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usia_produktif_profesi', function (Blueprint $table) {
            $table->id();
            $table->string('fakultas');
            $table->string('status');
            $table->string('jenjang');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            $table->string('usia25sd35_L');
            $table->string('usia25sd35_P');
            $table->string('usia25sd35_jumlah');
            $table->string('usia36sd45_L');
            $table->string('usia36sd45_P');
            $table->string('usia36sd45_jumlah');
            $table->string('usia46sd55_L');
            $table->string('usia46sd55_P');
            $table->string('usia46sd55_jumlah');
            $table->string('usia56sd65_L');
            $table->string('usia56sd65_P');
            $table->string('usia56sd65_jumlah');
            $table->string('usia66sd75_L');
            $table->string('usia66sd75_P');
            $table->string('usia66sd75_jumlah');
            $table->string('usia75_L');
            $table->string('usia75_P');
            $table->string('usia75_jumlah');
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
        Schema::dropIfExists('usia_produktif_profesi');
    }
}
