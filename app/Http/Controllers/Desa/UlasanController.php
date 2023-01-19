<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function Index()
    {
        $user = Auth::user();
        $desa = Village::where('user_id', $user->id);
        $ulasan = Suggestion::where('village_id', $desa->first()->id)->get()->sortByDesc("created_at");

        return view('user-desa.ulasan', compact('ulasan'));
    }

    public function store(Request $request)
    {
        $request->validate(['ulasan' => 'required']);

        $data = $request->all();

        Suggestion::create([
            'deskripsi' => $data['ulasan'],
            'user_id' => $data['user_id'],
            'village_id' => $data['village_id'],
        ]);

        return redirect('/user-umum/desa/' . $data['village_id'])->with('messages', 'Kritik & Saran berhasil dikirim');
    }
}
