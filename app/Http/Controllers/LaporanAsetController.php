<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanAset;
use App\Models\Aset;
use Hash;
class LaporanAsetController extends Controller
{
    
   
    public function index(Request $request)
    {
        if(!empty($request->id))
        {
            $assets = LaporanAset::where('id',$request->id)->get();

        } else{

            $assets = LaporanAset::get();
        }
        return view('laporan/index')->with(['assets' => $assets]);
    }  

    public function index_self()
    {
        $assets = LaporanAset::where('pengaju_id',auth()->user()->id)->get();
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
                    'judul_laporan' => "required",
                    'tanggal' => "required|string",
                    'file' => "max:5300|mimes:pdf,doc,docx,jpg,rtf",
                    'keterangan' => "nullable|string",
                    ];
        // dd($request->password_confirmation." ".$request->password);
        $this->validate($request, $validate);

        LaporanAset::create($this->params($request));

        return redirect()->route('pengajuan.laporan.self')->with(['message_success' => 'Berhasil menambahkan laporan']);
    }

    public function edit($id)
    {
        $data = LaporanAset::where('id',$id)->first();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('laporan/edit')->with(['data' => $data,'aset_list' => $aset]);
    }

    public function detail($id,Request $request)
    {
        if(auth()->user()->role == 'admin' AND !empty($request->notif_id))
        {
            \NotifHelpers::setRead($request->notif_id);
        }
        $data = LaporanAset::where('id',$id)->firstOrFail();
        $aset = Aset::orderBy('nama_barang','ASC')->get();
        return view('laporan/detail')->with(['data' => $data,'aset_list' => $aset]);
    }


    public function acc($id)
    {
        LaporanAset::where('id',$id)->update(['is_acc' => 1,'accessor_id' => auth()->user()->id]);
        $laporan = LaporanAset::where('id',$id)->first();
        \NotifHelpers::addNotif($laporan->pengaju_id,'Laporan anda "'.$laporan->judul_laporan.'" diterima',route('pengajuan.laporan.detail',['id' => $id]));
        return redirect()->route('pengajuan.laporan')->with(['message_success' => 'Berhasil menerima laporan']);
    }

    public function tolak($id)
    {
       LaporanAset::where('id',$id)->update(['is_acc' => 2,'accessor_id' => auth()->user()->id]);
        $laporan = LaporanAset::where('id',$id)->first();
        \NotifHelpers::addNotif($laporan->pengaju_id,'Laporan anda "'.$laporan->judul_laporan.'"  ditolak',route('pengajuan.laporan.detail',['id' => $id]));
       

        return redirect()->route('pengajuan.laporan')->with(['message_success' => 'Berhasil menolak laporan']);
    }

    public function update(Request $request)
    {
        $validate = [
                    'id' => "required|exists:\App\Models\PermintaanAset,id",
                    'nama_pengaju' => "required|string",
                    'unit_kerja' => "required|string",
                    'judul_laporan' => "required",
                    'tanggal' => "required|string",
                    'file' => "nullable|max:5300|mimes:pdf,doc,docx,jpg,rtf",
                    'keterangan' => "nullable|string",
                    ];
        $this->validate($request, $validate);

        LaporanAset::where('id',$request->id)->update($this->params($request,true));

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah  pengajuan']);
    }
    public function download($file)
    {
        $laporan = LaporanAset::where('file',$file)->first();
        return response()->download(storage_path('laporan_aset/'.$laporan->file), $laporan->file);
    }
    public function delete($id)
    {
        

        LaporanAset::where('id',$id)->delete();

        return redirect()->back()->with(['message_success' => 'Berhasil menghapus pengajuan']);
    }
    private function params($request,$is_update=false)
    {
        $params = [
            'nama_pengaju' => $request->nama_pengaju,
            'unit_kerja' => $request->unit_kerja,
            'judul_laporan' => $request->judul_laporan,
            'tanggal' => $request->tanggal,
            
            
            'keterangan' => $request->keterangan,
            'updated_by' => auth()->user()->id,
        ];
        if(!$is_update)
        {
            $params['pengaju_id'] = auth()->user()->id;
        }
        if(!empty($request->file))
        {
            $file = $request->file('file');
 
            $nama_file ="LAPORAN-ASET_ISBI_".md5(auth()->user()->id.time()).".".$file->getClientOriginalExtension();
     
            $file->move(storage_path('laporan_aset'),$nama_file);
            $params['file']  = $nama_file;
        }
        return $params;
    }
}
