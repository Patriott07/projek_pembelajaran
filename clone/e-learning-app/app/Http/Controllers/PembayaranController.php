<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Pembayaran;
use App\Models\Pengajar;
use App\Models\Token_aksess;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    //
    public function pembayaran_view(Request $request){
        $search = "";
        $pembayaranSukses = Pembayaran::with(['user', 'kursus'])->where('status', 'pembayaran valid')->paginate(20);
        $pembayaranPending = Pembayaran::with(['user', 'kursus'])->where('status', 'menunggu konfirmasi')->paginate(20);
        $delete = Pembayaran::with(['user', 'kursus'])->onlyTrashed()->get();

        // dd($pembayaranSukses, $pembayaranPending);

        return view('pembayaran_view', ['s' => $search, 'data_pembayaran' => $pembayaranSukses, 'data_pembayaran_pending' => $pembayaranPending,'data_delete' => $delete]);
    }


    public function pembayaran_create(Request $request, $id){
        $kursus = Kursus::findOrFail($id);
        $request['user_id'] = Auth::user()->id;
        $request['tanggal'] = Carbon::now();
        $request['kursus_id'] = $kursus->id;

        $request['status'] = "menunggu konfirmasi";

        // dd($request->all());

        if($request->hasFile('bukti_bayar_file')){
            $file = $request->file('bukti_bayar_file');
            $path = $file->store('public/bukti_bayar');

            $url = Storage::url($path);
            $request['bukti_bayar'] = $url;
        }

        Pembayaran::create($request->all());

        return redirect('/kursus/'. Str::slug($kursus->nama_kursus).'/' . $kursus->id . '#form')->with('ok', 'Pembayaran Anda Tercatat, Mohon tunggu konfirmasi admin');
    }

    public function pembayaran_accept(Request $request, $id){

        $pembayaran = Pembayaran::findOrFail($id);
        $kursus = Kursus::findOrFail($pembayaran->kursus_id);
        $pengajar = Pengajar::findOrFail($kursus->pengajar_id);

        if($pengajar->user_id != Auth::user()->id) return redirect('/pembayaran')->with('err', 'Kamu tidak bisa melakukan accept pembayaran, kamu bukan pemilik kursus');
        
        $pembayaran->update([
            'status' => 'pembayaran valid'
        ]);

        Token_aksess::create([
            'kursus_id' => $pembayaran->kursus_id,
            'user_id' => $pembayaran->user_id,
            'status' => 'active'
        ]);

        return redirect('/pembayaran')->with('ok', 'Pembayaran Berhasil di konfirmasi!');
    }

    public function pembayaran_delete(Request $request, $id){
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect('/pembayaran')->with('ok', 'Data Terhapus!');
    }

    public function pembayaran_restore(Request $request, $id){
        $pembayaran = Pembayaran::onlyTrashed()->where('id', $id)->first();
        $pembayaran->restore();

        return redirect('/pembayaran')->with('ok', 'Data Telah Dikembalikan');
    }


}
