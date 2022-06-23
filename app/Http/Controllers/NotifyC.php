<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class NotifyC extends Controller
{
    public function notifyManager(){
        $notifys = DB::table('notify')->orderBy('idnotify', 'desc')->get();
        return view('director/NotifyManager', compact('notifys'));
    }

    public function notify(){
        $notifys = DB::table('notify')->orderBy('idnotify', 'desc')->paginate(7);
        return view('user/Notify', compact('notifys'));
    }
}

?>