<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Models\Vidio;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    //

    public function video_view(Request $request, $id){
        $kursus = Kursus::findOrFail($id);
        $video = Vidio::with(['kursus'])->where('kursus_id', $kursus->id)->orderBy('urutan_dalam_playlist', 'asc')->paginate(10);
        $delete_data = Vidio::onlyTrashed()->get();
        $search = "";

        // dd($delete_data);

        if($request->s){
            $search = $request->s;
            $video = Vidio::with(['kursus'])->where('kursus_id', $kursus->id)->where('nama_vidio', 'LIKE', '%' . $search . '%')->orderBy('urutan_dalam_playlist', 'asc')->paginate(10);
        }

        return view('video_view', ['s' => $search, 'data_video' => $video, 'data_delete' => $delete_data, 'kursus' => $kursus]);
    }

    public function video_view_create(Request $request, $id){
        // $category = Category::all();
        // $kursus = Kursus::all();

        $kursus = Kursus::findOrFail($id);
        return view('video_create', ['kursus' => $kursus]);
    }

    public function video_view_update(Request $request, $id, $video_id){
        // $category = Category::all();
        // $pengajar = Pengajar::all();

        $video = Vidio::findOrFail($video_id);
        $kursus = Kursus::findOrFail($id);

        return view('video_update', ['data' => $video, 'kursus' => $kursus]);
    }

    public function video_create(Request $request, $id){
        // dd($request->all());
        $request['kursus_id'] = $id;

        if($request->hasFile('file_video')){
            $file = $request->file('file_video'); 
            $path = $file->store('public/store/kursus'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web 

            $request['path'] = $path;
            $request['url'] = $file_url;
        }

        // dd($request->all());
        Vidio::create($request->all()); 
        return redirect('/kursus/'.$id.'/video')->with('ok', 'Tambah Data telah berhasil!');
    }

    public function video_update(Request $request, $id, $video_id){
        $video = Vidio::findOrFail($video_id);
        $request['kursus_id'] = $id;

        // Mengecek apakah admin menyantumkan vidio pada form
        if($request->hasFile('file_video')){
            $file = $request->file('file_video'); // simpan file dalam variabel
            $path = $file->store('public/store/kursus'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web : http://...

            $request['path'] = $path;
            $request['url'] = $file_url;
        }

        $video->update($request->all());
        return redirect('/kursus/'.$id.'/video')->with('ok', 'Modify data berhasil!');
    }

    public function video_delete(Request $request, $id, $video_id){
        $video = Vidio::findOrFail($video_id);
        $video->delete();
        return redirect('/kursus/'.$id.'/video')->with('ok', 'Data Terhapus!');
    }

    public function video_restore(Request $request, $id, $video_id){
        // dd($id);
        $video = Vidio::onlyTrashed()->where('id', $video_id)->first();
        $video->restore();

        return redirect('/kursus/'.$id.'/video')->with('ok', 'Data Telah Dikembalikan');
    }
}
