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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_surat');
            $table->unsignedTinyInteger('disposisi');
            $table->text('catatan')->nullable();
            $table->string('file', 100)->nullable();
            $table->boolean('status_surat')->default(0);
            $table->timestamps();

            $table->foreign("disposisi")->references("id")->on("jabatans")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisis');
    }
};
