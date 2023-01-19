<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function Profil(){
        $profil = Auth::user();
    	return view('user-umum.profil', compact('profil'));
    }
}
