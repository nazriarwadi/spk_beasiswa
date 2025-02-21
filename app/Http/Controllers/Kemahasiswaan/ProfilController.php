<?php

namespace App\Http\Controllers\Kemahasiswaan;

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
        return view('pages.kemahasiswaan.profil.index', $data);
    }

    public function update(Request $request) {
        $request->validate([
            'photo' => 'nullable',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'nullable'
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
        ]);
        return to_route('kemahasiswaan.profil.index');
    }
}
