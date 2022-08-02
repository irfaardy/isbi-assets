<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanAset;
use App\Models\AsetMasuk;
use App\Models\AsetKeluar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $PermintaanAsetCount = PermintaanAset::count();
        $AsetMasuk = AsetMasuk::count();
        $AsetKeluar = AsetKeluar::count();
        return view('home')->with(['permintaan_aset' => $PermintaanAsetCount,'AsetMasuk' => $AsetMasuk,'AsetKeluar' => $AsetKeluar]);
    }
}
