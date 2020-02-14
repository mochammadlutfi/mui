<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class KomisiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function komisi_fatwa()
    {
        return view('frontend.komisi.komisi_fatwa');
    }

    public function komisi_informasi()
    {
        return view('frontend.komisi.komisi_informasi');
    }
    public function komisi_hukum()
    {
        return view('frontend.komisi.komisi_hukum');
    }
    public function komisi_dakwah()
    {
        return view('frontend.komisi.komisi_dakwah');
    }
    public function komisi_pendidikan()
    {
        return view('frontend.komisi.komisi_pendidikan');
    }
    public function komisi_pengkajian()
    {
        return view('frontend.komisi.komisi_pengkajian');
    }



    public function komisi_perempuan()
    {
        return view('frontend.komisi.komisi_perempuan');
    }
    public function komisi_ukhuwah()
    {
        return view('frontend.komisi.komisi_ukhuwah');
    }
    public function komisi_kerukunan()
    {
        return view('frontend.komisi.komisi_kerukunan');
    }

    public function komisi_pembinaan()
    {
        return view('frontend.komisi.komisi_pembinaan');
    }
    public function komisi_pemberdayaan()
    {
        return view('frontend.komisi.komisi_pemberdayaan');
    }
    public function komisi_luar_negeri()
    {
        return view('frontend.komisi.komisi_luar_negeri');
    }
    public function komisi_prasarana()
    {
        return view('frontend.komisi.komisi_prasarana');
    }
}
