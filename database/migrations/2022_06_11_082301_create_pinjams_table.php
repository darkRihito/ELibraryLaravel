<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id()->unique;
            $table->unsignedBigInteger('sirkulasi_id');
            $table->unsignedBigInteger('koleksi_id');
            $table->date('tanggal_pinjam')->nullable();
            $table->integer('lama_pinjam')->nullable();
            $table->string('status')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();
        });

        Schema::table('pinjams', function (Blueprint $table) {
            $table->foreign('sirkulasi_id')->references('id')->on('sirkulasis')->onDelete('cascade');
            $table->foreign('koleksi_id')->references('id')->on('koleksis')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjams');
    }
}
