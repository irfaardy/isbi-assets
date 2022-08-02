<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PermintaanAsetExport implements FromView,ShouldAutoSize
{
    private $presensi_data;
    private $range;
    
    public function __construct($data,$range,$tipe)
    {
        $this->data = $data;
        $this->range = $range;
        $this->tipe = $tipe;
    }
    public function view(): View
    {
        return view('exports.permintaan_aset', [
            'data' => $this->data,
            'range' => $this->range,
            'tipe' => $this->tipe
        ]);
    }
}
