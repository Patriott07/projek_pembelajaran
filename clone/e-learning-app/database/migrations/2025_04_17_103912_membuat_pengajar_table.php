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
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id(); // bikin column id (PK)
            $table->string('name');
            $table->string('keahlian');
            $table->text('bio');
            $table->string('foto');
            $table->unsignedBigInteger('user_id');
            // string, text, id, integer, unsignedBigInteger, softDeletes, date
            $table->softDeletes(); //bikin column deleted_at
            $table->timestamps();

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
        Schema::dropIfExists('pengajar');
    }
};
