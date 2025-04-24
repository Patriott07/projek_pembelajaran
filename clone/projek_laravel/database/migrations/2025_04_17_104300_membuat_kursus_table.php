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
        Schema::create('kursus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kursus');
            $table->text('deskripsi');
            $table->string('foto');
            $table->date('tanggal');
            $table->integer('harga');
            $table->unsignedBigInteger('pengajar_id'); //cuma bikin column
            $table->unsignedBigInteger('category_id');
            $table->integer('like');
            // string, text, id, integer, unsignedBigInteger, softDeletes, date
            $table->softDeletes(); //bikin column deleted_at
            $table->timestamps();

            //Assign foreign key
            $table->foreign('pengajar_id')->references('id')->on('pengajar');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursus');
    }
};
