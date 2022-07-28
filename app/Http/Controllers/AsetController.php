<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use Hash;
class AsetController extends Controller
{
    
   
    public function index()
    {
        $assets = Aset::get();
        return view('admin/aset/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        return view('admin/aset/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'kode_barang' => "required|string|unique:\App\Models\Aset,kode_barang",
                    'nama_barang' => "required",
                    'kategori' => "required",
                    'jenis' => "required",
                    'jumlah' => "required|numeric",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        Aset::create($this->params($request));

        return redirect()->route('data.aset')->with(['message_success' => 'Berhasil menambahkan asset']);
    }

    public function edit($id)
    {
        $assets = Aset::where('id',$id)->first();
        return view('admin/aset/edit')->with(['assets' => $assets]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Aset,id",
                    'kode_barang' => "required|string|unique:\App\Models\Aset,kode_barang,".$request->id,
                    'nama_barang' => "required",
                    'kategori' => "required",
                    'jenis' => "required",
                    'jumlah' => "required|numeric",
                    ];
        $this->validate($request, $validate);

        Aset::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data Pengguna']);
    }
    public function delete($id)
    {
        

        Aset::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus data aset']);
    }
    private function params($request)
    {
        $params = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
        ];
        return $params;
    }
}
