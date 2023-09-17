<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bibliografi_id');
            $table->string('no_reg')->nullable()->unique();
            $table->string('ddc');
            $table->string('collection_number')->unique();
            $table->string('lokasi')->nullable();
            $table->string('status')->nullable();
            $table->string('tersedia')->nullable();
            $table->timestamps();
        });
        
        Schema::table('koleksis', function (Blueprint $table) {
            $table->foreign('bibliografi_id')->references('id')->on('bibliografis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koleksis');
    }
}
