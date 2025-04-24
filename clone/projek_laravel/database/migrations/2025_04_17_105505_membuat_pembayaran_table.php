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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kursus_id');
            $table->unsignedBigInteger('user_id');
            $table->string('bukti_bayar');
            $table->date('tanggal');
            $table->string('metode_bayar');
            $table->string('status');
            // string, text, id, integer, unsignedBigInteger, softDeletes, date
            $table->softDeletes(); //bikin column deleted_at
            $table->timestamps();

            $table->foreign('kursus_id')->references('id')->on('kursus');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
