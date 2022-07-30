<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanAset extends Model
{
   
    protected $table = "permintaan_asset";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_pengaju','unit_kerja','asset_id','jumlah','kepentingan','is_acc','accessor_id','keterangan'
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
