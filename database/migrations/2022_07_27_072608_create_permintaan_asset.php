<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanAsset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_asset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju',80);
            $table->string('unit_kerja',60);
            $table->unsignedBigInteger('asset_id');
            $table->float('jumlah',12,2);
            $table->text('kepentingan');
            $table->boolean('is_acc')->default(0);//0 waiting, 1 acc,2 tolak
            $table->unsignedBigInteger('accessor_id');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('permintaan_asset');
    }
}
