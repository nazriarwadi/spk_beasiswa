<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Foto opsional, maksimal 2MB
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Password wajib diisi
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'alamat_tinggal' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'nik' => 'required|string|max:16|unique:users',
            'no_kk' => 'required|string|max:16',
            'nik_kk' => 'required|string|max:16',
            'nisn' => 'required|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'kab_kota_sekolah' => 'required|string|max:255',
            'provinsi_sekolah' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Simpan foto jika ada
        $photoPath = null;
        if ($data['photo']) {
            $photoPath = $data['photo']->store('profil', 'public');
        }

        return User::create([
            'photo' => $photoPath,
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'alamat_tinggal' => $data['alamat_tinggal'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'nik' => $data['nik'],
            'no_kk' => $data['no_kk'],
            'nik_kk' => $data['nik_kk'],
            'nisn' => $data['nisn'],
            'asal_sekolah' => $data['asal_sekolah'],
            'kab_kota_sekolah' => $data['kab_kota_sekolah'],
            'provinsi_sekolah' => $data['provinsi_sekolah'],
        ]);
    }
    public function register(Request $request)
    {
        // Validasi input
        $this->validator($request->all())->validate();

        // Buat user baru
        event(new Registered($user = $this->create($request->all())));

        // Redirect atau kirim response JSON
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
}
