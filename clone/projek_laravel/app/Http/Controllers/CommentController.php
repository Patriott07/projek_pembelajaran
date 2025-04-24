<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kursus;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function comment_create(Request $request, $id){
        // return redirect('')
        $kursus = Kursus::findOrFail($id);

        $request['user_id'] = Auth::user()->id;
        $request['tanggal'] = Carbon::now();
        $request['kursus_id'] = $id;

        Comment::create($request->all());

        return redirect('/kursus/'. Str::slug($kursus->nama_kursus).'/' . $kursus->id . '#comment');
    }

    public function like(Request $request, $id){
        Session::put('like', 'like');
        $kursus = Kursus::findOrFail($id);

        $kursus->update([
            'like' => $kursus->like + 1
        ]);
        
        return redirect('/kursus/'. Str::slug($kursus->nama_kursus).'/' . $kursus->id );
    }
}
