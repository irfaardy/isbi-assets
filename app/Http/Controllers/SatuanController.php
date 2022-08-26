<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use App\Imports\AsetImport;
use Hash;
class SatuanController extends Controller
{
    
   
    public function index()
    {
        $satuan = Satuan::get();
        return view('admin/satuan/index')->with(['satuan' => $satuan]);
    }

    public function create()
    {
        return view('admin/satuan/create');
    }

    public function save(Request $request)
    {
        $validate = [
                    'name' => "required|string|unique:\App\Models\Satuan,name",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        Satuan::create($this->params($request));

        return redirect()->route('satuan.aset')->with(['message_success' => 'Berhasil menambahkan satuan']);
    }
   
    public function edit($id)
    {
        $satuan = Satuan::where('id',$id)->first();
        return view('admin/satuan/edit')->with(['satuan' => $satuan]);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\Satuan,id",
                    'name' => "required|string|unique:\App\Models\Satuan,name,".$request->id,
                    ];
        $this->validate($request, $validate);

        Satuan::where('id',$request->id)->update($this->params($request));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah data Satuan']);
    }
    public function delete($id)
    {
        

        Satuan::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus data Satuan']);
    }
    private function params($request)
    {
        $params = [
            'name' => $request->name,
        ];
        return $params;
    }
}
