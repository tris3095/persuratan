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
        Schema::create('users', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->unsignedTinyInteger('id_jabatan');
            $table->boolean('aktif')->default(1);
            $table->timestamps();

            $table->foreign("id_jabatan")->references("id")->on("jabatans")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
