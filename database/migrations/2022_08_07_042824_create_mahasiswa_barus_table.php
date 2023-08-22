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
        Schema::create('mahasiswa_barus', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->text('nama');
            $table->string('npm');
            $table->string('kelompok');
            $table->enum('status_lulus', ['Lulus', 'Tidak Lulus', '-'])->default('-');
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
        Schema::dropIfExists('mahasiswa_barus');
    }
};
