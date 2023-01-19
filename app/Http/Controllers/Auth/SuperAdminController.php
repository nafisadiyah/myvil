<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function Login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|min:6|max:20',
        ];

        $messages = [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.max'      => 'Password maksimal 20 karakter.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                // dd($request->all());
                return redirect()->intended('/super-admin/home');
            } 
            return Redirect::to("/super-admin")->withErrors('Login Gagal! Email Atau Password Salah');
        }
        return Redirect::to("/super-admin")->withErrors('Login Gagal! Email Atau Password Salah');
    }

    public function Logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/super-admin');
    }
}
