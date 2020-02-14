<?php

namespace App\Http\Controllers\Admin;

use App\Models\Infografis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InfografisController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Infografis::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){

                        if($row->status == 1)
                        {
                            $status = '<span class="badge badge-success">Publikasi</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Tidak Publikasi</span>';
                        }

                        return $status;
                })
                ->addColumn('auth', function($row){
                        return $row->admin->name;
                })
                ->addColumn('action', function($row){
                    $btn = '<center><div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                <a class="dropdown-item" href="javascript:void(0)" onClick="edit('.$row->id.')">
                                    <i class="si si-note mr-5"></i>Edit Album
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus('.$row->id.')">
                                    <i class="si si-trash mr-5"></i>Hapus Album
                                </a>
                            </div>
                        </div></center>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.infografis.index');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'judul' => 'required',
            'slug' => 'required',
            'foto' => 'required',
            'status' => 'required'
        ];

        $pesan = [
            'judul.required' => 'Judul Wajib Diisi!',
            'slug.required' => 'Slug Infografis Wajib Diisi!',
            'foto.required' => 'Cover Infografis Wajib Diisi!',
            'status.required' => 'Status Infografis Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $foto_file = $request->file('foto');
            $foto = Storage::disk('public')->put('infografis', $foto_file);

            $data = new Infografis();
            $data->judul = $request->judul;
            $data->slug = $request->slug;
            $data->foto = $foto;
            $data->admin_id = auth()->user()->id;
            $data->seo_keyword = $request->seo_keyword;
            $data->seo_description = $request->seo_description;
            $data->seo_tags = $request->seo_tags;
            $data->status = $request->status;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function edit($id){
        $album = Infografis::find($id);
        $res = Collect([
            'id' => $album->id,
            'judul' => $album->judul,
            'slug' => $album->slug,
            'foto' => asset('uploads/'.$album->foto),
            'seo_keyword' => $album->seo_keyword,
            'seo_description' => $album->seo_description,
            'seo_tags' => $album->seo_tags,
            'status' => $album->status
        ]);
        return response()->json($res);
    }

    public function update(Request $request)
    {

        $rules = [
            'judul' => 'required',
            'slug' => 'required',
            // 'foto' => 'required',
            'status' => 'required'
        ];

        $pesan = [
            'judul.required' => 'Judul Infografis Wajib Diisi!',
            'slug.required' => 'Slug Infografis Wajib Diisi!',
            // 'foto.required' => 'Cover Album Wajib Diisi!',
            'status.required' => 'Status Infografis Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $id = $request->id;
            if($request->hasfile('foto'))
            {
                $album = Infografis::find($id);
                $file = public_path().'/uploads/'.$album->foto;
                if (is_file($file)){
                    $del_thumb = unlink($file);
                    if($del_thumb)
                    {
                        $foto_file = $request->file('foto');
                        $foto = Storage::disk('public')->put('infografis', $foto_file);
                    }
                }
            }

            $data = Infografis::find($request->id);
            $data->judul = $request->judul;
            $data->slug = $request->slug;
            $data->admin_id = auth()->user()->id;
            $data->seo_keyword = $request->seo_keyword;
            $data->seo_description = $request->seo_description;
            $data->seo_tags = $request->seo_tags;
            $data->status = $request->status;
            if($request->hasfile('foto'))
            {
                $data->foto = $foto;
            }
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function check_slug(Request $request)
    {
        // Old version: without uniqueness
        // $slug = str_slug($request->judul);

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Infografis::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }


    public function hapus($id)
    {
        $album = Infografis::find($id);
        $del_album_img = unlink(public_path().'/uploads/'.$album->foto);
        if($del_album_img)
        {
            $del_album = Infografis::destroy($album->id);
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
