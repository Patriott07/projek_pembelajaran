<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    //
    public function kursus_view(Request $request){
        $pengajar = Pengajar::where('user_id', Auth::user()->id)->first();
        $kursus = Kursus::with(['pengajar', 'category'])->where('pengajar_id', $pengajar->id)->paginate(10);
        $delete_data = Kursus::onlyTrashed()->get();
        $search = "";

        // dd($delete_data);

        if($request->s){
            $search = $request->s;
            $kursus = Kursus::with(['pengajar', 'category'])->where('nama_kursus', 'LIKE', '%' . $search . '%')->paginate(10);
        }

        return view('kursus_view', ['s' => $search, 'data_kursus' => $kursus, 'data_delete' => $delete_data]);
    }

    public function kursus_view_create(){
        $category = Category::all();
        $pengajar = Pengajar::all();
        return view('kursus_create', ['category' => $category, 'pengajar' => $pengajar]);
    }

    public function kursus_view_update(Request $request, $id){
        $category = Category::all();
        $pengajar = Pengajar::all();

        $kursus = Kursus::findOrFail($id);

        return view('kursus_update', ['data' => $kursus, 'category' => $category, 'pengajar' => $pengajar]);
    }

    public function kursus_create(Request $request){

        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); 
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web 

            $request['foto'] = $file_url;
        }

        $request['like'] = 0; // set default like dari 0

        // dd($request->all());
        Kursus::create($request->all()); 
        return redirect('/kursus')->with('ok', 'Tambah Data telah berhasil!');
    }

    public function kursus_update(Request $request, $id){
        $kursus = Kursus::findOrFail($id);

        // Mengecek apakah admin menyantumkan foto pada form
        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); // simpan file dalam variabel
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web : http://...

            $request['foto'] = $file_url; // tambahkan $request[foto] agar bisa tersimpan di database
        }

        $kursus->update($request->all());
        return redirect('/kursus')->with('ok', 'Modify data berhasil!');
    }

    public function kursus_delete(Request $request, $id){
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();
        return redirect('/kursus')->with('ok', 'Data Terhapus!');
    }

    public function kursus_restore(Request $request, $id){
        // dd($id);
        $kursus = Kursus::onlyTrashed()->where('id', $id)->first();
        $kursus->restore();

        return redirect('/kursus')->with('ok', 'Data Telah Dikembalikan');
    }
}
