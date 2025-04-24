<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajarController extends Controller
{
    //

    public function pengajar_view(Request $request){
        $pengajar = Pengajar::with(['user'])->paginate(10);
        $delete_data = Pengajar::onlyTrashed()->get();
        $search = "";

        // dd($delete_data);

        if($request->s){
            $search = $request->s;
            $pengajar = Pengajar::with(['user'])->where('name', 'LIKE', '%' . $search . '%')->paginate(10);
        }

        return view('pengajar_view', ['s' => $search, 'data_pengajar' => $pengajar, 'data_delete' => $delete_data]);
    }

    public function pengajar_view_create(){
        
        return view('pengajar_create');
    }

    public function pengajar_view_update(Request $request, $id){
        $pengajar = Pengajar::findOrFail($id);

        return view('pengajar_update', ['data' => $pengajar]);
    }

    public function pengajar_create(Request $request){

        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); 
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web 

            $request['foto'] = $file_url;
        }

        Pengajar::create($request->all()); 
        return redirect('/pengajar')->with('ok', 'Tambah Data telah berhasil!');
    }

    public function pengajar_update(Request $request, $id){
        $pengajar = Pengajar::findOrFail($id);

        // Mengecek apakah admin menyantumkan foto pada form
        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); // simpan file dalam variabel
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web : http://...

            $request['foto'] = $file_url; // tambahkan $request[foto] agar bisa tersimpan di database
        }

        $pengajar->update($request->all());
        return redirect('/profile')->with('ok', 'Modify data berhasil!');
    }

    public function pengajar_delete(Request $request, $id){
        $pengajar = Pengajar::findOrFail($id);
        $pengajar->delete();
        return redirect('/pengajar')->with('ok', 'Data Terhapus!');
    }

    public function pengajar_restore(Request $request, $id){
        // dd($id);
        $pengajar = Pengajar::onlyTrashed()->where('id', $id)->first();
        $pengajar->restore();

        return redirect('/pengajar')->with('ok', 'Data Telah Dikembalikan');
    }

    public function profile(Request $request){
        $s = "";
        $pengajar = Pengajar::where('user_id', Auth::user()->id)->first();
        return view('profile', ['s' => $s, 'data' => $pengajar]);
    }

}
