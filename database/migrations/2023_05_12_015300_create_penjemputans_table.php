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
        Schema::create('penjemputans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('jumlah_sampah');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
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
        Schema::dropIfExists('penjemputans');
    }
};
