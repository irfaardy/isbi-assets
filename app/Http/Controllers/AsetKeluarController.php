<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsetKeluar;
use App\Models\Aset;
use Hash;
class AsetKeluarController extends Controller
{
    
   
    public function index()
    {
        $assets = AsetKeluar::get();
        return view('aset_keluar/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('aset_keluar/create')->with(['aset' => $aset]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'tanggal' => "required|date",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        AsetKeluar::create($this->params($request));

        return redirect()->route('data.aset.keluar')->with(['message_success' => 'Berhasil menambahkan asset keluar']);
    }

    public function edit($id)
    {
        $assets = AsetKeluar::where('id',$id)->first();
          $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('aset_keluar/edit')->with(['aset' => $assets,'aset_list' => $aset]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\AsetKeluar,id",
                    'tanggal' => "required|date",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    ];
        $this->validate($request, $validate);

        AsetKeluar::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah  asset keluar']);
    }
    public function delete($id)
    {
        

        AsetKeluar::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus asset keluar']);
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
