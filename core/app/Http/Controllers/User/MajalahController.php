<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use App\Models\Majalah;

class MajalahController extends Controller
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
        $majalah = Majalah::where('status', 1)->latest()->paginate(6);
        return view('frontend.majalah.index', compact('majalah'));
    }

    public function detail($slug)
    {
        $kiri = Majalah::where('status', 1)->latest()->limit(2)->get();
        $recomen = Majalah::where('status', 1)->latest()->limit(4)->get();
        $majalah = Majalah::where('slug', $slug)->first();
        return view('frontend.majalah.detail', compact('majalah', 'recomen', 'kiri'));
    }

}
