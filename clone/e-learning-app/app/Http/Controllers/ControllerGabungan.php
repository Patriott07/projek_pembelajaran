<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Kursus;
use App\Models\Pembayaran;
use App\Models\Token_aksess;
use App\Models\Vidio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ControllerGabungan extends Controller
{
    //

    public function home_view(Request $request)
    {
        $category = Category::orderBy('id', 'desc')->get();
        $kursus = Kursus::with(['pengajar', 'category'])->paginate(9);
        $search = "";
        $filter = "";
        $categ = "";
        $name = "";

        if ($request->categ) {
            $categ = $request->categ;
            $name = $request->name;
            $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $categ)->paginate(9);
        }

        if ($request->s) {
            $search = $request->s;
            $kursus = Kursus::with(['pengajar', 'category'])->where('nama_kursus', 'LIKE', '%' . $search . '%')->paginate(9);

            if ($request->categ)  $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $categ)->where('nama_kursus', 'LIKE', '%' . $search . '%')->paginate(9);
        }

        if ($request->filter) {
            $filter = $request->filter;
            if ($filter == "new") $kursus = Kursus::with(['pengajar', 'category'])->orderBy('id', 'desc')->paginate(9);
            if ($filter == "oldest") $kursus = Kursus::with(['pengajar', 'category'])->orderBy('id', 'asc')->paginate(9);
            if ($filter == "harga_asc") $kursus = Kursus::with(['pengajar', 'category'])->orderBy('harga', 'asc')->paginate(9);
            if ($filter == "harga_desc") $kursus = Kursus::with(['pengajar', 'category'])->orderBy('harga', 'desc')->paginate(9);
            if ($filter == "like") $kursus = Kursus::with(['pengajar', 'category'])->orderBy('like', 'desc')->paginate(9);
        }

        return view('halaman_utama.home', ['data_category' => $category, 'data_kursus' => $kursus, 's' => $search, 'filter' => $filter, 'categ' => $categ, 'name' => $name]);
    }
    public function member_view(Request $request)
    {
        $id = $request->id;
        $video_id = $request->video;

        if (!$id) {
            $pembayaranTerakhir = Pembayaran::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->first();

            // dd($id);
            if (!$pembayaranTerakhir) return redirect('/');

            $kursus = Kursus::findOrFail($pembayaranTerakhir->kursus_id);

            return redirect('/member-area?name=' . Str::slug($kursus->nama_kursus) . '&id=' . $kursus->id);
        } else {
            $kursus = Kursus::findOrFail($id);
        }

        // pengecekan apakah user sudah membeli
        // Start filtering
        $pembayaranValid = Pembayaran::where('kursus_id', $kursus->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'pembayaran valid')
            ->first();

        $token_valid = Token_aksess::where('kursus_id', $kursus->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'active')
            ->first();

        // dd($pembayaranValid, $token_valid, $pembayaranValid && $token_valid);

        if (!$pembayaranValid || !$token_valid) return redirect('/');

        $pembayaranValids = Pembayaran::where('user_id', Auth::user()->id)
            ->where('status', 'pembayaran valid')
            ->get();

        $ids = [];
        foreach ($pembayaranValids as $data) {
            $ids[] = $data->kursus_id;
        }

        $myKursus = Kursus::whereIn('id', $ids)->get();

        $videos = Vidio::where('kursus_id', $kursus->id)->orderBy('urutan_dalam_playlist', 'asc')->get();

        if ($video_id) {

            $video = Vidio::where('kursus_id', $kursus->id)
                ->where('urutan_dalam_playlist', $video_id)
                ->first();
        } else {
            $video = null;
        }


        // dd($myKursus, $ids);
        return view('halaman_utama.MemberArea', ['data_kursus' => $myKursus, 'kursus' => $kursus, 'data_videos' => $videos, 'video' => $video]);
    }

    public function course_by_category_view(Request $request, $name, $id)
    {
        $filter = "";

        $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->paginate(9);
        $category = Category::findOrFail($id);

        if ($request->filter) {
            $filter = $request->filter;
            if ($filter == "new") $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->orderBy('id', 'desc')->paginate(9);
            if ($filter == "oldest") $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->orderBy('id', 'asc')->paginate(9);
            if ($filter == "harga_asc") $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->orderBy('harga', 'asc')->paginate(9);
            if ($filter == "harga_desc") $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->orderBy('harga', 'desc')->paginate(9);
            if ($filter == "like") $kursus = Kursus::with(['pengajar', 'category'])->where('category_id', $id)->orderBy('like', 'desc')->paginate(9);
        }

        return view('halaman_utama.findByCateg', ['filter' => $filter, 'category' => $category, 'data_kursus' => $kursus]);
    }

    public function course_view(Request $request, $name, $id)
    {
        $kursus = Kursus::with(['pengajar', 'category'])->findOrFail($id);
        $access = false;
        $msg = "";
        $like = true;

        if (Session::has('like')) $like = false;

        // Start filtering
        $pembayaranValid = Pembayaran::where('kursus_id', $kursus->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'pembayaran valid')
            ->first();

        $token_valid = Token_aksess::where('kursus_id', $kursus->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'active')
            ->first();

        $pembayaranBelumDiRespon =  Pembayaran::where('kursus_id', $kursus->id)
            ->where('user_id', Auth::user()->id)
            ->where('status', 'menunggu konfirmasi')
            ->first();

        if ($pembayaranBelumDiRespon) $msg = "Pembayaran Sebelumnya Belum Di Periksa Oleh Admin, Kamu tidak bisa isi form lagi.";

        if ($pembayaranValid && $token_valid) $access = true;

        $countCourseByPengajar = Kursus::where('pengajar_id', $kursus->pengajar->id)->count();
        $videos = Vidio::where('kursus_id', $kursus->id)->orderBy('urutan_dalam_playlist', 'asc')->get();
        $comment = Comment::with(['user'])->where('kursus_id', $kursus->id)->get();

        // dd($videos);

        $durasi_kursus = 0;
        $minute = 0;

        foreach ($videos as $data) {
            $minute += $data->durasi; // anggap durasi dalam menit
        }

        $jam = floor($minute / 60);         // ambil jam utuh
        $menit_sisa = $minute % 60;         // sisa menit

        $durasi_kursus = "{$jam}jam/{$menit_sisa}menit";

        return view('halaman_utama.DetailKursus', ['kursus' => $kursus, 'access' => $access, 'countCourseByPengajar' => $countCourseByPengajar, 'data_video' => $videos, 'data_comment' => $comment, 'msg' => $msg, 'durasi' => $durasi_kursus]);
    }
}
