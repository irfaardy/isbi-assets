<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsetKeluar;
use App\Models\AsetMasuk;
use App\Models\Aset;
use Hash;
 use Barryvdh\DomPDF\Facade\Pdf;

class ReportAssetController extends Controller
{
    
   
    public function index(Request $request)
    {
        if($request->tipe == "keluar")
        {
            if(!empty($request->date)){
                $assets = AsetKeluar::where('tanggal','like',$request->date.'%')->get();
            } else{
                 $assets = AsetKeluar::get();
            }
        } else{
             if(!empty($request->date)){
                $assets = AsetMasuk::where('tanggal','like',$request->date.'%')->get();
            } else{
                 $assets = AsetMasuk::get();
            }
        }
        return view('laporan/asset')->with(['assets' => $assets]);
    }

    public function download(Request $request)
    {
        if($request->tipe == "keluar")
        {
            if(!empty($request->date)){
                $assets = AsetKeluar::where('tanggal','like',$request->date.'%')->get();
            } else{
                 $assets = AsetKeluar::get();
            }
        } else{
             if(!empty($request->date)){
                $assets = AsetMasuk::where('tanggal','like',$request->date.'%')->get();
            } else{
                 $assets = AsetMasuk::get();
            }
        }

        $parse = date('m',strtotime($request->date."-01"));
        $year = date('Y',strtotime($request->date."-01"));

        switch ($parse) {
            case '01':
                $date = "Januari";    
            break;   
            
            case '02':
                $date = "Februari";    
            break;   
            
            case '03':
                $date = "Maret";    
            break;   
            
            case '04':
                $date = "April";    
            break;   
            
            case '05':
                $date = "Mei";    
            break;   
            
            case '06':
                $date = "Juni";    
            break;   
            
            case '07':
                $date = "Juli";    
            break;   
            
            case '08':
                $date = "Agustus";    
            break;   
            
            case '09':
                $date = "September";    
            break;   
            
            case '10':
                $date = "Oktober";    
            break;   
            
            case '11':
                $date = "November";    
            break;   
            
            case '12':
                $date = "Desember";    
            break;
            

            default:
                $date = "-";        
            break;
        }


        $pdf = Pdf::loadView('laporan.pdf', ['assets' => $assets , 'type' => ucwords($request->tipe), 'date' => $date,'year' => $year]);
        return $pdf->download(time().'.pdf');
    }

    private function params($request)
    {
        $params = [
            'tanggal' => $request->tanggal,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
        ];
        return $params;
    }
}
