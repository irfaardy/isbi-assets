<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Jenis;
use App\Imports\AsetImport;
use Hash;
class AsetController extends Controller
{
    
   
    public function index()
    {
        $assets = Aset::get();
        $satuan = Satuan::get();
        return view('admin/aset/index')->with(['assets' => $assets,'satuan' => $satuan]);
    } 

    public function stokCek(Request $request)
    {
        $assets = Aset::select('kode_barang','nama_barang','jumlah')->where('id',$request->id)->first();
        $as['kode_barang'] = $assets->kode_barang;
        $as['nama_barang'] = $assets->nama_barang;
        $as['jumlah'] = $assets->jumlah;
        $as['satuan'] = empty($assets->satuan)?"":$assets->satuan->name;
        return response()->json($as);
    }

    public function create()
    {
        $kategori = Kategori::orderBy('name','ASC')->get();
        $jenis = Jenis::orderBy('name','ASC')->get();
        $satuan = Satuan::get();
        return view('admin/aset/create')->with(['kategori' => $kategori,'jenis' => $jenis,'satuan'=>$satuan]);
    }

    public function save(Request $request)
    {
        $validate = [
                    'kode_barang' => "required|string|unique:\App\Models\Aset,kode_barang",
                    'satuan' => "required|string|exists:\App\Models\Satuan,id",
                    'nama_barang' => "required",
                    'kategori' => "required",
                    'jenis' => "required",
                    'jumlah' => "required|numeric",
                   'harga' => "required|numeric",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        Aset::create($this->params($request));

        return redirect()->route('data.aset')->with(['message_success' => 'Berhasil menambahkan asset']);
    }
    public function import(Request $request)
    {
         $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx|max:102000'
        ]);
 
      
        $file = $request->file('file');
 
        $nama_file = time().$file->getClientOriginalName();
 
        $file->move(storage_path('imported'),$nama_file);
 
       
        \Excel::import(new AsetImport, storage_path('/imported/'.$nama_file));
 
       return redirect()->route('data.aset')->with(['message_success' => 'Berhasil mengimpor asset']);
    }
    public function edit($id)
    {
        $kategori = Kategori::orderBy('name','ASC')->get();
        $jenis = Jenis::orderBy('name','ASC')->get();
        $assets = Aset::where('id',$id)->first();
        $satuan = Satuan::get();
        return view('admin/aset/edit')->with(['assets' => $assets,'kategori' => $kategori,'jenis' => $jenis,'satuan'=>$satuan]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Aset,id",
                    'kode_barang' => "required|string|unique:\App\Models\Aset,kode_barang,".$request->id,
                    'satuan' => "required|string|exists:\App\Models\Satuan,id",
                    'nama_barang' => "required",
                    'kategori' => "required",
                    'jenis' => "required",
                    'jumlah' => "required|numeric",
                    'harga' => "required|numeric",
                    ];
        $this->validate($request, $validate);

        Aset::where('id',$request->id)->update($this->params($request));

        return redirect()->route('data.aset')->with(['message_success' => 'Berhasil mengubah data Pengguna']);
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
            'harga' => $request->harga,
            'satuan_id' => $request->satuan,
        ];
        return $params;
    }
}
