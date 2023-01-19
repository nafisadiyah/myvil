<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Village;
use App\Models\Problem;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function Index()
    {
        $desa = Village::all()->sortByDesc("created_at");
        return view('user-umum.desa', compact('desa'));
    }

    public function get_desa($id)
    {
        $desa = Village::where('id', $id)->get();
        $problem = Problem::where('user_id', $desa->first()->user->id)->get();
        return view('user-umum.detail-desa', ['desa' => $desa->first(), 'problems' => $problem]);
    }
}
