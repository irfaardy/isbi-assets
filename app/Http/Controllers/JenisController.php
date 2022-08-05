<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Imports\AsetImport;
use Hash;

class JenisController extends Controller
{
    
   
    public function index()
    {
        $assets = Jenis::get();
        return view('admin/jenis/index')->with(['assets' => $assets]);
    }

    public function create()
    {
        return view('admin/jenis/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'kode_jenis' => "required|string|unique:\App\Models\Jenis,kode_jenis",
                    'name' => "required",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        Jenis::create($this->params($request));

        return redirect()->route('jenis.aset')->with(['message_success' => 'Berhasil menambahkan Jenis']);
    }
   
    public function edit($id)
    {
        $assets = Jenis::where('id',$id)->first();
        return view('admin/jenis/edit')->with(['data' => $assets]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Jenis,id",
                    'kode_jenis' => "required|string|unique:\App\Models\Jenis,kode_jenis,".$request->id,
                    'name' => "required",
                    ];
        $this->validate($request, $validate);

        Jenis::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data Jenis']);
    }
    public function delete($id)
    {
        

        Jenis::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus data Jenis']);
    }
    private function params($request)
    {
        $params = [
            'kode_jenis' => $request->kode_jenis,
            'name' => $request->name,
        ];
        return $params;
    }
}
