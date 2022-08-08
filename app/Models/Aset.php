<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
   
    protected $table = "assets";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'jenis',
        'jumlah',
        'harga',
        'updated_by',
    ];
    public function kategoritb()
    {
        return $this->belongsTo(Kategori::class, 'kategori');
    }
    public function jenistb()
    {
        return $this->belongsTo(Jenis::class, 'jenis');
    }

}
