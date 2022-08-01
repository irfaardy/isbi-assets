<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAset extends Model
{
   
    protected $table = "permintaan_asset";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_pengaju','unit_kerja','judul_laporan','tanggal','file','keterangan','is_acc','accessor_id','updated_by'
    ];

     public function aset()
    {
        return $this->belongsTo(Aset::class, 'asset_id');
    } 
    public function accessor()
    {
        return $this->belongsTo(User::class, 'accessor_id');
    }
}
