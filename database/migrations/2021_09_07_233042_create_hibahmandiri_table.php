<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHibahmandiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibahmandiri', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('fakultas');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');

            $table->string('2018_usulan');
            $table->string('2018_diterima');
            $table->string('2019_usulan');
            $table->string('2019_diterima');
            $table->string('2020_usulan');
            $table->string('2020_diterima');
            $table->string('2021_usulan');
            $table->string('2021_diterima');

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
        Schema::dropIfExists('hibahmandiri');
    }
}
