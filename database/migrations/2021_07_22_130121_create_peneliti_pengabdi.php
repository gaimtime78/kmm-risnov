<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitiPengabdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peneliti_pengabdi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('fakultas');
            $table->string('status');
            $table->string('jenjang');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            $table->string('usia25sd35_jumlah');
            $table->string('usia36sd45_jumlah');
            $table->string('usia46sd55_jumlah');
            $table->string('usia56sd65_jumlah');
            $table->string('usia66sd75_jumlah');
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
        Schema::dropIfExists('peneliti_pengabdi');
    }
}
