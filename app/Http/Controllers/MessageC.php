<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MessageC extends Controller
{

    public function listChat(){
        $chats = DB::table('message')->selectRaw('message.iduser,sum(message.state) as state, name')
        ->groupBy('message.iduser', 'name')->orderBy('state','desc')
        ->join('user','user.iduser','=','message.iduser')->get();
        return view('director/ListChat', compact('chats'));
    }

    public function directorMessenger($iduser){
        DB::table('message')->where('iduser',$iduser)->update(['state' => 0]);
        $messages = DB::table('message')->where('iduser',$iduser)->get();
        return view('director/Messenger',compact('messages'));
    }

    public function userMessenger(){
        $iduser = Session::get('iduser');
        $messages = DB::table('message')->where('iduser',$iduser)->get();
        return view('user/Messenger',compact('messages'));
    }
}

?>