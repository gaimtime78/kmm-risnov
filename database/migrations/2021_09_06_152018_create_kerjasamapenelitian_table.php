<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjasamapenelitianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasamapenelitian', function (Blueprint $table) {
            $table->id();
            $table->string('pusat_studi');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');
            
            $table->string('tahun1');            

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
        Schema::dropIfExists('kerjasamapenelitian');
    }
}
