<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkreditasiPusdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akreditasi_pusdi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('pusat_studi');
            $table->string('akreditasi');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
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
        Schema::dropIfExists('akreditasi_pusdi');
    }
}
