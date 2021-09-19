<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchgroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchgroup', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('fakultas');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            
            $table->string('tahun1');
            // $table->string('tahun2');
            // $table->string('tahun3');
            // $table->string('tahun4');
            // $table->string('tahun5');

            
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
        Schema::dropIfExists('researchgroup');
    }
}
