<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProblemController extends Controller
{
    public function Index(){
        $term1 = '1';
        $problem = Problem::all()->where('status_id','LIKE',$term1)->sortByDesc("created_at");
    	return view('super-admin.permasalahan', compact('problem'));
    }
    
    public function Terima(){
        $term2 = '2';
        $problemTerima = Problem::all()->where('status_id','LIKE', $term2)->sortByDesc("updated_at");
    	return view('super-admin.permasalahan-diterima', compact('problemTerima'));
    }

    public function Tolak(){
        $term3 = '3';
        $problemTolak = Problem::all()->where('status_id','LIKE', $term3)->sortByDesc("updated_at");
    	return view('super-admin.permasalahan-ditolak', compact('problemTolak'));
    }

    public function updateTerima(Request $request, $id)
    {
    $problems = Problem::find($id);
    $problems->status_id = $request->status_id;
    //return dd($problems);
    $problems->save();
    return Redirect::to("/super-admin/permasalahan-diterima")->withSuccess('Problem Berhasil Disetujui!');
    }

    public function updateTolak(Request $request, $id)
    {
    $problems = Problem::find($id);
    $problems->status_id = $request->status_id;
    //return dd($problems);
    $problems->save();
    return Redirect::to("/super-admin/permasalahan-ditolak")->withSuccess('Problem Berhasil Ditolak!');
    }

    public function Detail($id){
        $problems = Problem::where('id',$id)->first();
        return view('super-admin.detail-problem', compact('problems'));
     }
}
