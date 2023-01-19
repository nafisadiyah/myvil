<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Proposal;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function Index()
    {
        $home = Problem::all()->where('status_id', '!=', 1)->where('status_id', '!=', 3)->sortByDesc("created_at");

        $term1 = '2';
        $user = User::all()->where('role_id', 'LIKE', $term1);
        $desa = Village::all()->sortByDesc("created_at")->take(6);

        $auth = Auth::user();
        $resultPermsalahanDikerjakan = Proposal::all()->where("user_id", $auth->id)->where('status_id','LIKE',6)->count();

        return view('user-umum.home', compact('home', 'desa', 'resultPermsalahanDikerjakan'));
    }

    public function Detail($id)
    {
        $home = Problem::where('id', $id)->first();
        return view('user-umum.detail-problem', compact('home'));
    }

    public function Input(Request $request)
    {
        $rules = [
            'judul'                  => 'required|min:5|max:100',
            'deskripsi'              => 'required|min:5|max:100',
            'jumlah_anggota'         => 'required|min:1|max:50',
            'lampiran'              => 'required|mimes:pdf|max:5048',
        ];
 
        $messages = [
            'judul.required' => 'Judul wajib diisi.',
            'judul.min'      => 'Judul minimal 5 karakter.',
            'judul.max'      => 'Judul maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min'      => 'Deskripsi minimal 5 karakter.',
            'deskripsi.max'      => 'Deskripsi maksimal 100 karakter.',
            'jumlah_anggota.required' => 'Saran wajib diisi.',
            'jumlah_anggota.min'      => 'Saran minimal 5 karakter.',
            'jumlah_anggota.max'      => 'Saran maksimal 100 karakter.',
            'lampiran.required' => 'Foto lampiran wajib diupload.',
            'lampiran.mimes' => 'File lampiran harus .pdf',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $lampiran     = $request->file('lampiran');
        $lampiranName = time() . "_" . $lampiran->getClientOriginalName();
        $lampiranPath   = "lampiran";
        $lampiran->move($lampiranPath, $lampiranName);

        ($request->all());
        $this->saveProposal($request->all(), $lampiranName);

        return Redirect::to("/user-umum/home")->withSuccess('Proposal Berhasil Diinput! Silahkan Menunggu Persetujuan Dari Desa.');
    }

    protected function saveProposal(array $data, $lampiran = null)
    {
        // dd($data);
        return Proposal::create([
            'judul'         => $data['judul'],
            'deskripsi'     => $data['deskripsi'],
            'jumlah_anggota'   => $data['jumlah_anggota'],
            'lampiran'      => $lampiran,
            'user_id'       => Auth::user()->id,
            'status_id'      => $data['status_id'],
            'problem_id'      => $data['problem_id'],
        ]);
    }
}
