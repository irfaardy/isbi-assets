<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanAset;
use App\Models\Aset;
use Hash;
class LaporanAsetController extends Controller
{
    
   
    public function index()
    {
        $assets = LaporanAset::get();
        return view('laporan/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('laporan/create')->with(['aset' => $aset]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'nama_pengaju' => "required|string",
                    'unit_kerja' => "required|string",
                    'judul_laporan' => "required|exists:\App\Models\Aset,id",
                    'tanggal' => "required|string",
                    'file' => "max:5300|mimes:pdf,doc,docx,jpg,rtf",
                    'keterangan' => "nullable|string",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        LaporanAset::create($this->params($request));

        return redirect()->route('pengajuan.aset')->with(['message_success' => 'Berhasil menambahkan pengajuan']);
    }

    public function edit($id)
    {
        $data = LaporanAset::where('id',$id)->first();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('laporan/edit')->with(['data' => $data,'aset_list' => $aset]);
    }

    public function detail($id)
    {
        $data = LaporanAset::where('id',$id)->first();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('laporan/detail')->with(['data' => $data,'aset_list' => $aset]);
    }


    public function acc($id)
    {
        LaporanAset::where('id',$id)->update(['is_acc' => 1,'accessor_id' => auth()->user()->id]);
        return redirect()->route('pengajuan.aset')->with(['message_success' => 'Berhasil menerima pengajuan']);
    }

    public function tolak($id)
    {
       LaporanAset::where('id',$id)->update(['is_acc' => 2,'accessor_id' => auth()->user()->id]);
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

        LaporanAset::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah  pengajuan']);
    }
    public function delete($id)
    {
        

        LaporanAset::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus pengajuan']);
    }
    private function params($request)
    {
        $params = [
            'nama_pengaju' => $request->nama_pengaju,
            'unit_kerja' => $request->unit_kerja,
            'judul_laporan' => $request->judul_laporan,
            'tanggal' => $request->tanggal,
            
            'keterangan' => $request->keterangan,
            'updated_by' => auth()->user()->id,
        ];
        if(empty($request->file))
        {
            $params['file']  = $request->file;
        }
        return $params;
    }
}