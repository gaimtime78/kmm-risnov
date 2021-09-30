<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkemaNonPnbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skema_non_pnbp', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('fakultas');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            $table->string('keterangan')->nullable();
            $table->string('jumlah');
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
        Schema::dropIfExists('skema_non_pnbp');
    }
}
