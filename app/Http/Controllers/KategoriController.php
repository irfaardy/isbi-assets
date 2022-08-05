<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Imports\AsetImport;
use Hash;
class KategoriController extends Controller
{
    
   
    public function index()
    {
        $assets = Kategori::get();
        return view('admin/kategori/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        return view('admin/kategori/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'kode_kategori' => "required|string|unique:\App\Models\Kategori,kode_kategori",
                    'name' => "required",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        Kategori::create($this->params($request));

        return redirect()->route('kategori.aset')->with(['message_success' => 'Berhasil menambahkan Kategori']);
    }
   
    public function edit($id)
    {
        $assets = Kategori::where('id',$id)->first();
        return view('admin/kategori/edit')->with(['data' => $assets]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Kategori,id",
                    'kode_kategori' => "required|string|unique:\App\Models\Kategori,kode_kategori,".$request->id,
                    'name' => "required",
                    ];
        $this->validate($request, $validate);

        Kategori::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data Kategori']);
    }
    public function delete($id)
    {
        

        Kategori::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus data kategori']);
    }
    private function params($request)
    {
        $params = [
            'kode_kategori' => $request->kode_kategori,
            'name' => $request->name,
        ];
        return $params;
    }
}
