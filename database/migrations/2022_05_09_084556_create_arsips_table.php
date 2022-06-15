<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('tanggal')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('no_surat', 30);
            $table->string('instansi', 100);
            $table->string('file', 100);
            $table->enum('jenis_surat', ['masuk', 'keluar','keliping']);
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
        Schema::dropIfExists('arsips');
    }
};
