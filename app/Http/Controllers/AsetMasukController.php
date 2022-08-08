<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsetMasuk;
use App\Models\Aset;
use Hash;
class AsetMasukController extends Controller
{
    
   
    public function index()
    {
        $assets = AsetMasuk::get();
        return view('aset_masuk/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('aset_masuk/create')->with(['aset' => $aset]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'tanggal' => "required|date",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    'harga' => "required|numeric",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        AsetMasuk::create($this->params($request));

        return redirect()->route('data.aset.masuk')->with(['message_success' => 'Berhasil menambahkan asset masuk']);
    }

    public function edit($id)
    {
        $assets = AsetMasuk::where('id',$id)->first();
          $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('aset_masuk/edit')->with(['aset' => $assets,'aset_list' => $aset]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\AsetMasuk,id",
                    'tanggal' => "required|date",
                    'asset_id' => "required|exists:\App\Models\Aset,id",
                    'jumlah' => "required|numeric",
                    'harga' => "required|numeric",
                    ];
        $this->validate($request, $validate);

        AsetMasuk::where('id',$request->id)->update($this->params($request));

        return redirect()->route('data.aset.masuk')->with(['message_success' => 'Berhasil mengubah  asset masuk']);
    }
    public function delete($id)
    {
        

        AsetMasuk::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus asset masuk']);
    }
    private function params($request)
    {
        $params = [
            'tanggal' => $request->tanggal,
            'asset_id' => $request->asset_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ];
        return $params;
    }
}
