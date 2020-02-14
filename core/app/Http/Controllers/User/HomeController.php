<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use App\Models\Berita;
use App\Models\BKategori;
use App\Models\Video;
use App\Models\Slider;
use App\Models\Infografis;

class HomeController extends Controller
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
    public function index()
    {
        $berita = Berita::latest()->limit(3)->get();
        $eko = Berita::where('b_kategori_id', 2)->limit(4)->get();
        $art = Berita::where('b_kategori_id', 3)->limit(4)->get();
        $pojok = Berita::latest()->limit(4)->get();
        $slider = Slider::latest()->get();
        $video = Video::latest()->limit(3)->get();
        $infografis = Infografis::latest()->limit(4)->get();

        return view('frontend.beranda', compact('berita', 'video', 'slider', 'eko', 'art', 'pojok', 'infografis'));
    }
    public function indexs()
    {
        return view('frontend.berita');
    }

}
