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
        Schema::create('vidio', function (Blueprint $table) {
            $table->id();
            $table->string('nama_vidio');
            $table->string('url');
            $table->string('path');
            $table->unsignedBigInteger('kursus_id');
            // string, text, id, integer, unsignedBigInteger, softDeletes, date
            $table->softDeletes(); //bikin column deleted_at
            $table->timestamps();

            $table->foreign('kursus_id')->references('id')->on('kursus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidio');
    }
};
