<?php

namespace App\Http\Controllers\User;

use App\Models\QKategori;
use App\Models\Pertanyaan;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Support\Facades\Notification;
use App\Notifications\TanyaJawab;

class KonsultasiController extends Controller
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
        $pertanyaan = Pertanyaan::latest()->paginate(10);
        $kategori = QKategori::latest()->get();
        return view('frontend.konsultasi.konsultasi', compact('pertanyaan', 'kategori'));
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Pertanyaan::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }

    public function tambah()
    {
        $pertanyaan = Pertanyaan::latest()->limit(5)->get();
        $kategori = QKategori::latest()->get();

        return view('frontend.konsultasi.tambah', compact('kategori', 'pertanyaan'));
    }

    public function simpan(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'pertanyaan' => 'required',
            'kategori' => 'required',
        ];

        $pesan = [
            'judul.required' => 'Judul Topik Pertanyaan Wajib Diisi!',
            'kategori.required' => 'Kategori Pertanyaan Wajib Diisi!',
            'pertanyaan.required' => 'Deskripsi Pertanyaan Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            $data = new Pertanyaan();
            $data->judul = $request->judul;
            $data->slug = Str::slug($request->judul, '-');
            $data->deskripsi = $request->pertanyaan;
            $data->kategori_id = $request->kategori;
            $data->status = 0;
            $data->user_id = auth()->user()->id;

            $admin = Admin::all();
            if($data->save())
            {
                if(Notification::send($admin, new TanyaJawab(Pertanyaan::latest('id')->first())))
                {
                    return redirect()->route('konsultasi')->with('success','Product created successfully.');
                }
                return redirect()->route('konsultasi')->with('success','Product created successfully.');
            }
        }
    }

    public function detail($slug)
    {
        $tanya = Pertanyaan::where('slug', $slug)->first();
        $kategori = QKategori::latest()->get();
        $jawab = Jawaban::where('pertanyaan_id', $tanya->id)->first();
        return view('frontend.konsultasi.detail', compact('tanya', 'jawab', 'kategori'));
    }

}
