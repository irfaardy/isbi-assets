<?php

namespace App\Imports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AsetImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Aset([
            'kode_barang' => $row[0],
            'nama_barang' => $row[1],
            'kategori' => $row[2],
            'jenis' => $row[3],
            'harga' => $row[4],
            'jumlah' => $row[5],
        ]);
    }
}
