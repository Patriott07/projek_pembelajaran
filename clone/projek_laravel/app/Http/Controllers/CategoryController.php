<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function category_view(Request $request){
        $category = Category::paginate(10);
        $delete_data = Category::onlyTrashed()->get();
        $search = "";

        // dd($delete_data);

        if($request->s){
            $search = $request->s;
            $category = Category::where('nama_pelajaran', 'LIKE', '%' . $search . '%')->paginate(10);
        }

        return view('category_view', ['s' => $search, 'data_category' => $category, 'data_delete' => $delete_data]);
    }

    public function category_view_create(){
        
        return view('category_create');
    }

    public function category_view_update(Request $request, $id){
        $category = Category::findOrFail($id);

        return view('category_update', ['data' => $category]);
    }

    public function category_create(Request $request){

        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); 
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web 

            $request['foto'] = $file_url;
        }

        Category::create($request->all()); 
        return redirect('/category')->with('ok', 'Tambah Data telah berhasil!');
    }

    public function category_update(Request $request, $id){
        $category = Category::findOrFail($id);

        // Mengecek apakah admin menyantumkan foto pada form
        if($request->hasFile('file_foto')){
            $file = $request->file('file_foto'); // simpan file dalam variabel
            $path = $file->store('public/store'); // menampung lokasi file disimpan dalam projek : public/store/...
            $file_url = Storage::url($path); // untuk mendapatkan filesupaya bisa tampil di web : http://...

            $request['foto'] = $file_url; // tambahkan $request[foto] agar bisa tersimpan di database
        }

        $category->update($request->all());
        return redirect('/category')->with('ok', 'Modify data berhasil!');
    }

    public function category_delete(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/category')->with('ok', 'Data Terhapus!');
    }

    public function category_restore(Request $request, $id){
        // dd($id);
        $category = Category::onlyTrashed()->where('id', $id)->first();
        $category->restore();

        return redirect('/category')->with('ok', 'Data Telah Dikembalikan');
    }

}
