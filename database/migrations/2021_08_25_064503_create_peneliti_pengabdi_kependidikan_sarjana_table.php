<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitiPengabdiKependidikanSarjanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peneliti_pengabdi_kependidikan_sarjana', function (Blueprint $table) {
            $table->id();
            $table->string('fakultas');
            $table->string('status');
            $table->string('jenjang');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');

            $table->string('usia25_L');
            $table->string('usia25_P');
            $table->string('usia25_jumlah');
            
            $table->string('usia25sd35_L');
            $table->string('usia25sd35_P');
            $table->string('usia25sd35_jumlah');
            
            $table->string('usia36sd45_L');
            $table->string('usia36sd45_P');
            $table->string('usia36sd45_jumlah');
            
            $table->string('usia46sd55_L');
            $table->string('usia46sd55_P');
            $table->string('usia46sd55_jumlah');
            
            $table->string('usia56sd60_L');
            $table->string('usia56sd60_P');
            $table->string('usia56sd60_jumlah');
            
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
        Schema::dropIfExists('peneliti_pengabdi_kependidikan_sarjana');
    }
}
