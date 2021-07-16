<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpDoktors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_doktors', function (Blueprint $table) {
            $table->id();
            $table->string('id_status_pegawai');
            $table->string('id_fakultas');
            $table->string('rentang_usia1_laki');
            $table->string('rentang_usia1_perempuan');
            $table->string('rentang_usia2_laki');
            $table->string('rentang_usia2_perempuan');
            $table->string('rentang_usia3_laki');
            $table->string('rentang_usia3_perempuan');
            $table->string('rentang_usia4_laki');
            $table->string('rentang_usia4_perempuan');
            $table->string('rentang_usia5_laki');
            $table->string('rentang_usia5_perempuan');
            $table->string('rentang_usia6_laki');
            $table->string('rentang_usia6_perempuan');
            $table->string('periode');
            $table->string('tahun_input');
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
        Schema::dropIfExists('pp_doktors');
    }
}
