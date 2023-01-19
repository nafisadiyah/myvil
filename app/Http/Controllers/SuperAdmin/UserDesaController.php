<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserDesaController extends Controller
{
    public function index()
    {
        $term = '2';
        $userDesa = User::all()->where('role_id', 'LIKE', $term)->sortByDesc("updated_at");;
        $desa = Village::all()->sortByDesc("updated_at");
        return view('super-admin.user-desa', compact('desa'));
    }

    public function register(Request $request)
    {
        $rules = [
            'nama'                  => 'required|min:3|max:35',
            'email'                 => 'required|email',
            'password'              => 'required|min:6|max:20',
            'kecamatan'             => 'required',
            'kota'                  => 'required',
            'provinsi'              => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama Lengkap wajib diisi.',
            'nama.min'      => 'Nama lengkap minimal 3 karakter.',
            'nama.max'      => 'Nama lengkap maksimal 35 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
            'password.max'      => 'Password maksimal 20 karakter.',
            'kecamatan'             => 'Kecamatan wajib diisi!',
            'kota'                  => 'Kabupaten/Kota wajib diisi!',
            'provinsi'              => 'Provinsi wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->nama = ucwords(strtolower($request->nama));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->alamat = ucwords(strtolower("$request->kecamatan, $request->kota, $request->provinsi"));
        $user->role_id = intval($request->role_id);
        $user->foto = $request->foto;
        $simpan = $user->save();

        if ($simpan) {

            $desa = new Village;
            $desa->user_id = $user->id;
            $desa->kecamatan = ucwords(strtolower($request->kecamatan));;
            $desa->kota = ucwords(strtolower($request->kota));;
            $desa->provinsi = ucwords(strtolower($request->provinsi));;
            $desa->save();

            return Redirect::to("super-admin/user-desa")->withSuccess('Data user desa berhasil ditambahkan!');
        }
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'nama'                  => 'required|min:3|max:35',
            'email'                 => 'email:users',
            // 'password'              => 'min:6|max:20',
        ];

        $messages = [
            'nama.required' => 'Nama Lengkap wajib diisi.',
            'nama.min'      => 'Nama lengkap minimal 3 karakter.',
            'nama.max'      => 'Nama lengkap maksimal 35 karakter.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Email tidak valid.',
            // 'password.required' => 'Password wajib diisi.',
            // 'password.min'      => 'Password minimal 6 karakter.',
            // 'password.max'      => 'Password maksimal 20 karakter.',

        ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }

        $user = User::find($id);
        $user->nama = ucwords(strtolower($request->nama));

        if ($user->email != $request->email) {
            $user->email = strtolower($request->email);
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->alamat = ucwords(strtolower("$request->kecamatan, $request->kota, $request->provinsi"));
        $user->save();

        $desa = Village::where('user_id', $id)->get()->first();
        $desa->kecamatan = ucwords(strtolower($request->kecamatan));
        $desa->kota = ucwords(strtolower($request->kota));
        $desa->provinsi = ucwords(strtolower($request->provinsi));
        $desa->save();
        return Redirect::to("super-admin/user-desa")->withSuccess('Data desa berhasil diperbarui!');
    }

    // public function delete($id){
    //     DB::table('users')->where('id', $id)->delete();
    //     return redirect()->back();
    // }

    public function destroy($id)
    {
        User::find($id)->delete();
        Village::where('user_id', $id)->get()->first()->delete();
        return Redirect::to("super-admin/user-desa")->withSuccess('Data user desa berhasil dihapus!');
    }
}
