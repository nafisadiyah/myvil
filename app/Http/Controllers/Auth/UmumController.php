<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class UmumController extends Controller
{
    public function Register(Request $request)
    {
        $rules = [
            'nama'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:6|max:20',
            'alamat'                => 'required'
        ];
 
        $messages = [
            'nama.required' => 'Nama Lengkap wajib diisi.',
            'nama.min'      => 'Nama lengkap minimal 3 karakter.',
            'nama.max'      => 'Nama lengkap maksimal 35 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Email tidak valid.',
            'email.unique'       => 'Email sudah ada.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.max'      => 'Password maksimal 20 karakter.',
            'alamat.required'   => 'Alamat wajib diisi.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->nama = ucwords(strtolower($request->nama));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->alamat = ucwords(strtolower($request->alamat));
        $user->role_id = intval($request->role_id);
        $user->foto = $request->foto;
        $simpan = $user->save();

        if($simpan){
            // Session::flash('success', 'Register berhasil! Silahkan login untuk Mengakses Beranda');
            // return view('auth.login-user');
            return Redirect::to("/")->withSuccess('Register Berhasil! Silahkan Login Untuk Mengakses Beranda');
        }
    }

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
            if ($user->role_id == 3) {
                // dd($request->all());
                return redirect()->intended('/user-umum/home');
            } 
            return Redirect::to("/")->withErrors('Login Gagal! Email Atau Password Salah');
        }
        return Redirect::to("/")->withErrors('Login Gagal! Email Atau Password Salah');
    }

    public function Logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
