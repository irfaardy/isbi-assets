<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;


class NotifyController extends Controller
{
    
   
    public function setRead(Request $request)
    {
        Notifikasi::where('id',$request->id)->update(['is_read' => 1]);

        return response()->json(['read' => true]);
    }

  
}
