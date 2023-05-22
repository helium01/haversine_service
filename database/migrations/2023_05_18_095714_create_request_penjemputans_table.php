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
        Schema::create('request_penjemputans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_sampah');
            $table->integer('id_user');
            $table->integer('id_outlite')->nullable();
            $table->date('tanggal_penjemputan');
            $table->text('alamat');
            $table->text('catatan');
            $table->string('status');
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
        Schema::dropIfExists('request_penjemputans');
    }
};
