<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $data = [
            'profil' => auth()->user()
        ];
        return view('pages.mahasiswa.profil.index', $data);
    }

    public function update(Request $request) {
        $request->validate([
            'photo' => 'nullable',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            "tempat_lahir" => "nullable",
            "tanggal_lahir" => "nullable",
            "jenis_kelamin" => "nullable",
            "alamat_tinggal" => "nullable",
            "no_hp" => "nullable",
            "email" => "nullable",
            "nik" => "nullable",
            "no_kk" => "nullable",
            "nik_kk" => "nullable",
            "nisn" => "nullable",
            "asal_sekolah" => "nullable",
            "kab_kota_sekolah" => "nullable",
            "provinsi_sekolah" => "nullable",
        ]);
        $profil = auth()->user();
        if($request->password){
            $password = Hash::make($request->password);
        } else{
            $password = $profil->password;
        }
        if ($request->photo != null) {
            $photo = $request->photo->store('/profil', 'public');
        } else {
            $photo = $profil->photo;
        }
        $profil->update([
            'photo' => $photo,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $password,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat_tinggal" => $request->alamat_tinggal,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "nik" => $request->nik,
            "no_kk" => $request->no_kk,
            "nik_kk" => $request->nik_kk,
            "nisn" => $request->nisn,
            "asal_sekolah" => $request->asal_sekolah,
            "kab_kota_sekolah" => $request->kab_kota_sekolah,
            "provinsi_sekolah" => $request->provinsi_sekolah,
        ]);
        return to_route('mahasiswa.profil.index');
    }
}
