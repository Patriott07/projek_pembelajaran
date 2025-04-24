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
        Schema::table('comment', function (Blueprint $table) {
            //
            $table->integer('star_rating')->after('isi_komen');
            $table->unsignedBigInteger('kursus_id');

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
        Schema::table('comment', function (Blueprint $table) {
            //
            $table->dropColumn('star_rating');
            $table->dropForeign('kursus_id');
            $table->dropColumn('kursus_id');
        });
    }
};
