<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapSkemaPnbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_skema_pnbp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('jenis_skema')->nullable();
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
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
        Schema::dropIfExists('rekap_skema_pnbp');
    }
}
