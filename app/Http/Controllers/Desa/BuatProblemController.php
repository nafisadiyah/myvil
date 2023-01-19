<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BuatProblemController extends Controller
{
    public function Input(Request $request)
    {
        $rules = [
            'judul'                  => 'required|min:5|max:100',
            'deskripsi'              => 'required|min:5|max:100',
            'saran'                  => 'required|min:5|max:100',
            'lampiran1'             => 'required|mimes:png,jpg,jpeg|max:2048',
            'lampiran2'             => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
 
        $messages = [
            'judul.required' => 'Judul wajib diisi.',
            'judul.min'      => 'Judul minimal 5 karakter.',
            'judul.max'      => 'Judul maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min'      => 'Deskripsi minimal 5 karakter.',
            'deskripsi.max'      => 'Deskripsi maksimal 100 karakter.',
            'saran.required' => 'Saran wajib diisi.',
            'saran.min'      => 'Saran minimal 5 karakter.',
            'saran.max'      => 'Saran maksimal 100 karakter.',
            'lampiran1.required' => 'Foto lampiran 1 wajib diupload.',
            'lampiran1.mimes' => 'File lampiran 1 harus .png/.jpg/.jpeg',
            'lampiran2.required' => 'Foto lampiran 2 wajib diupload.',
            'lampiran2.mimes' => 'File lampiran 2 harus .png/.jpg/.jpeg',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $lampiran1     = $request->file('lampiran1');
        $lampiran1Name = time()."_".$lampiran1->getClientOriginalName();
        $lampiran1Path   = "lampiran1";
        $lampiran1->move($lampiran1Path, $lampiran1Name);

        $lampiran2     = $request->file('lampiran2');
        $lampiran2Name = time()."_".$lampiran2->getClientOriginalName();
        $lampiran2Path   = "lampiran2";
        $lampiran2->move($lampiran2Path, $lampiran2Name);

        ($request->all());
        $this->saveProblem($request->all(), $lampiran1Name, $lampiran2Name);

        return Redirect::to("/user-desa/home")->withSuccess('Problem Berhasil Diinput! Silahkan Menunggu Persetujuan Dari Admin.');
    }

    protected function saveProblem(array $data, $lampiran1 = null, $lampiran2= null)
    {
        // dd($data);
        return Problem::create([
            'judul'      => $data['judul'],
            'deskripsi'  => $data['deskripsi'],
            'saran'         => $data['saran'],
            'lampiran_1'     => $lampiran1,
            'lampiran_2'    => $lampiran2,
            'user_id'     => Auth::user()->id,
            'status_id'   => $data['status_id']
            ]);
    }

}
