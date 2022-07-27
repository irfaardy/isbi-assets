<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanAsset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_asset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju',80);
            $table->string('unit_kerja',60);
            $table->string('judul_laporan',200);
            $table->date('tanggal');
            $table->string('file',120);
            $table->string('keterangan',500)->nullable();
            $table->boolean('is_acc')->default(0);//0 waiting, 1 acc,2 tolak
            $table->unsignedBigInteger('accessor_id');
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_asset');
    }
}
