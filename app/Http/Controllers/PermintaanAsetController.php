<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanAset;
use App\Models\Aset;
use Hash;
class PermintaanAsetController extends Controller
{
    
   
    public function index()
    {
        $assets = PermintaanAset::get();
        return view('permintaan_aset/index')->with(['assets' => $assets]);
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
        $assets = PermintaanAset::where('id',$id)->first();
          $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('permintaan_aset/edit')->with(['aset' => $assets,'aset_list' => $aset]);
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

        PermintaanAset::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah  pengajuan']);
    }
    public function delete($id)
    {
        

        PermintaanAset::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus pengajuan']);
    }
    private function params($request)
    {
        $params = [
            'nama_pengaju' => $request->nama_pengaju,
            'unit_kerja' => $request->unit_kerja,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'kepentingan' => $request->kepentingan,
            'keterangan' => $request->keterangan,
        ];
        return $params;
    }
}
