<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanAset;
use App\Models\Aset;
use App\Exports\PermintaanAsetExport;
use Hash;
class PermintaanAsetController extends Controller
{
    
   
    public function index(Request $request)
    {
        if(!empty($request->id))
        {
            $assets = PermintaanAset::where('id',$request->id)->get();

        } else{

            $assets = PermintaanAset::get();
        }
        return view('permintaan_aset/index')->with(['assets' => $assets]);
    }

    public function index_self()
    {
        $assets = PermintaanAset::where('pengaju_id',auth()->user()->id)->get();
        return view('permintaan_aset_self/index')->with(['assets' => $assets]);
    }
    public function create()
    {
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('permintaan_aset/create')->with(['aset' => $aset]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'nama_pengaju' => "required|string",
                    'unit_kerja' => "required|string",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    'kepentingan' => "required|string",
                    'keterangan' => "nullable|string",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        PermintaanAset::create($this->params($request));

        return redirect()->route('pengajuan.aset')->with(['message_success' => 'Berhasil menambahkan pengajuan']);
    }

    public function edit($id)
    {
        $data = PermintaanAset::where('id',$id)->first();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('permintaan_aset/edit')->with(['data' => $data,'aset_list' => $aset]);
    } 

    public function export(Request $request)
    {
         $validate = [
                        'tipe' => 'required|in:0,1,2',
                        'start' => 'required|date',
                        'end' => 'required|date',
                    ];
        $this->validate($request, $validate);
        $PermintaanAset = PermintaanAset::whereBetween('created_at', [$request->start." 00:00:00", $request->end." 00:00:00"])->where('is_acc',$request->tipe)->get();
        $range = $request->start." s/d ".$request->end;
        if(empty(count($PermintaanAset)))
        {
             return redirect()->route('pengajuan.aset')->with(['message_fail' => 'Tidak ada data permintaan pada tanggal '.$range.'.']); 
        }
        switch($request->tipe){
            case 0:
                $tipe = "Menunggu-Persetujuan";
            break; 
            case 1:
                $tipe = "Disetujui";
            break; 
            case 2:
                $tipe = "Ditolak";
            break; 
            default:
                $tipe = "Tidak-diketahui";
            break;
        }

         return \Excel::download(new PermintaanAsetExport($PermintaanAset,$range,$tipe), 'ISBI-PERMINTAAN-ASET_'.$tipe."_".str_replace("/", "", $range).'.xlsx');
    }

    public function detail($id)
    {
        $data = PermintaanAset::where('id',$id)->firstOrFail();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('permintaan_aset/detail')->with(['data' => $data,'aset_list' => $aset]);
    }


    public function acc($id)
    {
        PermintaanAset::where('id',$id)->update(['is_acc' => 1,'accessor_id' => auth()->user()->id]);
        return redirect()->route('pengajuan.aset')->with(['message_success' => 'Berhasil menerima pengajuan']);
    }

    public function tolak($id)
    {
       PermintaanAset::where('id',$id)->update(['is_acc' => 2,'accessor_id' => auth()->user()->id]);
        return redirect()->route('pengajuan.aset')->with(['message_success' => 'Berhasil menolak pengajuan']);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\PermintaanAset,id",
                    'nama_pengaju' => "required|string",
                    'unit_kerja' => "required|string",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    'kepentingan' => "required|string",
                    'keterangan' => "nullable|string",
                    ];
        $this->validate($request, $validate);

        PermintaanAset::where('id',$request->id)->update($this->params($request,true));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah  pengajuan']);
    }
    public function delete($id)
    {
        

        PermintaanAset::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus pengajuan']);
    }
    private function params($request,$is_update=false)
    {
        $params = [
            'nama_pengaju' => $request->nama_pengaju,
            'unit_kerja' => $request->unit_kerja,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'kepentingan' => $request->kepentingan,
            'keterangan' => $request->keterangan,
        ];
         if(!$is_update)
        {
            $params['pengaju_id'] = auth()->user()->id;
        }
        return $params;
    }
}
