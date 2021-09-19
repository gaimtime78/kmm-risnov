<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndeksPenelitianPkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indeks_penelitian_pkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('fakultas');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');

            $table->string('jumlah0');
            $table->string('percent0');
            
            $table->string('jumlah1');
            $table->string('percent1');

            $table->string('jumlah2');
            $table->string('percent2');
            
            $table->string('jumlah3');
            $table->string('percent3');
            
            $table->string('jumlah4');
            $table->string('percent4');
            
            $table->string('jumlah5');
            $table->string('percent5');
            
            $table->string('jumlah6');
            $table->string('percent6');
            
            $table->string('jumlah7');
            $table->string('percent7');
            
            $table->string('jumlah8');
            $table->string('percent8');
            
            $table->string('jumlah9');
            $table->string('percent9');
            
            $table->string('jumlah10');
            $table->string('percent10');
            
            $table->string('jumlah11');
            $table->string('percent11');
            
            $table->string('jumlah12');
            $table->string('percent12');
            
            $table->string('jumlah13');
            $table->string('percent13');
            
            $table->string('jumlah14');
            $table->string('percent14');
            
            $table->string('jumlah15');
            $table->string('percent15');
            
            $table->string('jumlah16');
            $table->string('percent16');
            
            $table->string('jumlah17');
            $table->string('percent17');
            
            $table->string('jumlah18');
            $table->string('percent18');
            
            $table->string('jumlah19');
            $table->string('percent19');

            $table->string('percent20');
            $table->string('jumlah20');
         
            $table->string('percent21');
            $table->string('jumlah21');
            
            $table->string('jumlahtotal');
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
        Schema::dropIfExists('indeks_penelitian_pkm');
    }
}
