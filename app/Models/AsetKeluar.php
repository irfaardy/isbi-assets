<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetKeluar extends Model
{
   
    protected $table = "asset_keluar";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tanggal',
        'asset_id',
        'jumlah',
        'jenis',
        'satuan_id',
        'jumlah',
    ];

     public function aset()
    {
        return $this->belongsTo(Aset::class, 'asset_id');
    }

     public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
}
