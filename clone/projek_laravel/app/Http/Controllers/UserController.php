<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function user_view(Request $request){
        $user = User::paginate(10);
        $search = "";

        if($request->s){
            $search = $request->s;
            $user = User::where('name', 'LIKE', '%' . $search . '%')->paginate(10);
        }

        return view('user_view', ['s' => $search, 'data_user' => $user]);
    }

    public function user_view_create(){
        
        return view('user_create');
    }

    public function user_view_update(Request $request){
        
    }

    public function user_create(){

    }

    public function user_update(){

    }

    public function user_delete(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user');
    }

    public function user_assign_pengajar(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
            "role" => 'pengajar'
        ]);

        // Create Pengajar
        Pengajar::create([
            "name" => $user->name,
            "keahlian" => "",
            "bio" => "", 
            "foto" => "",
            "user_id" => $user->id
        ]);

        return redirect('/user')->with('ok', 'Assign Sebagai Pengajar Sukses');
    }


}
