<?php

namespace App\Http\Controllers\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Validator;
use App\Models\Berita;
use App\Models\BKategori;
use App\Models\Komentar;
use Storage;
class BeritaController extends Controller
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
    public function berita()
    {
        $berita = Berita::where('status', 1)->latest()->paginate(6);
        return view('frontend.berita.berita', compact('berita'));
    }

    public function detail($slug)
    {
        $kategori = BKategori::latest()->get();
        $recent_berita = Berita::latest()->limit(5)->get();
        $berita = Berita::where('slug', $slug)->first();
        $sesudah = Berita::where([
            ['created_at', '>', $berita->created_at]
        ])->orderBy('created_at', 'asc')
        ->first();
        $sebelum = Berita::where([
            ['created_at', '<', $berita->created_at]
        ])->orderBy('created_at', 'desc')
        ->first();
        // dd($sebelum);
        $komentar = Komentar::where('berita_id', $berita->id)->get();
        return view('frontend.berita.detail', compact('berita', 'kategori', 'recent_berita', 'komentar', 'sesudah', 'sebelum'));
    }

    public function komentar(Request $request)
    {

        $rules = [
            'description' => 'required',
        ];

        $pesan = [
            'description.required' => '*Deskripsi Komentar Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $data = new Komentar();
            $data->description = $request->description;
            $data->user_id = auth()->user()->id;
            $data->berita_id = $request->berita_id;
            $data->status = "1";
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

}
