<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role == 1) {
                return to_route('kemahasiswaan.data-pendaftar.index');
            } else if (auth()->user()->role == 0) {
                return to_route('mahasiswa.informasi-beasiswa.index');
            }
        }
        return to_route('login');
    }
}
