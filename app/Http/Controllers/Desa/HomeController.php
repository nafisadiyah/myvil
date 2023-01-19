<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Suggestion;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Index()
    {
        $user = Auth::user();
        $home = Problem::all()->where('status_id', '!=', 3)->sortByDesc("created_at");
        $desa = Village::where('user_id', $user->id)->first();

        $resultUlasanDesa = Suggestion::all()->where("user_id", $user->id)->count();
        
        $resultPermsalahanSekarang = Problem::all()->where("user_id", $user->id)->where('status_id','LIKE', 2)->count();

        $resultPermsalahanDikerjakan = Problem::all()->where("user_id", $user->id)->where('status_id','LIKE', 4)->count();

        return view('user-desa.home', compact('home', 'desa', 'resultUlasanDesa', 'resultPermsalahanSekarang', 'resultPermsalahanDikerjakan'));
    }

    public function Detail($id)
    {
        $home = Problem::where('id', $id)->first();
        return view('user-desa.detail-problem', compact('home'));
    }

}
