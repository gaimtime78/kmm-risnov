<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaianIkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_iku', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            $table->string('ik');
            $table->string('target_capaian');
            $table->string('no');
            $table->string('detail_target');
            $table->string('satuan');
            $table->string('target');
            $table->string('capaian');
            $table->string('percenttotal');
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
        Schema::dropIfExists('capaian_iku');
    }
}
