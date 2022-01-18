<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewIndeksPenelitiPkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_indeks_penelitian_pkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table');
            $table->string('periode');
            $table->string('tahun_input');
            $table->string('sumber_data');

            $table->string('h_index');

            $table->string('fib_jumlah');
            $table->string('fib_percent');

            $table->string('fkip_jumlah');
            $table->string('fkip_percent');
            
            $table->string('feb_jumlah');
            $table->string('feb_percent');
            
            $table->string('fh_jumlah');
            $table->string('fh_percent');
            
            $table->string('fisip_jumlah');
            $table->string('fisip_percent');
            
            $table->string('fk_jumlah');
            $table->string('fk_percent');
            
            $table->string('fp_jumlah');
            $table->string('fp_percent');
            
            $table->string('ft_jumlah');
            $table->string('ft_percent');
            
            $table->string('fmipa_jumlah');
            $table->string('fmipa_percent');
            
            $table->string('fsrd_jumlah');
            $table->string('fsrd_percent');
            
            $table->string('fkor_jumlah');
            $table->string('fkor_percent');
            
            $table->string('sv_jumlah');
            $table->string('sv_percent');
            
            $table->string('pascasarjana_jumlah');
            $table->string('pascasarjana_percent');
            
            $table->string('total_jumlah');
            $table->string('total_percent');

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
        Schema::dropIfExists('new_indeks_peneliti_pkm');
    }
}
