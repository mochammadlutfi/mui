<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use App\Models\Infografis;
class InfografisController extends Controller
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
        $infografis = Infografis::where('status', 1)->latest()->paginate(8);
        return view('frontend.infografis.infografis', compact('infografis'));
    }

    public function detail($slug)
    {
        $kiri = Infografis::where('status', 1)->latest()->limit(2)->get();
        $recomen = Infografis::where('status', 1)->latest()->limit(4)->get();
        $infografis = Infografis::where('slug', $slug)->first();
        return view('frontend.infografis.detail_infografis', compact('infografis', 'recomen', 'kiri'));
    }

}
