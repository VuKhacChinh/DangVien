<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class IndexC extends Controller
{
    public function indexManager($type){
        if($type==1){
            $indexs = DB::table('class')->select('idclass as id', 'class as name')->orderBy('id', 'desc')->get();
        }
        else $indexs = DB::table('major')->select('idmajor as id', 'major as name')->orderBy('id', 'desc')->get();
        $data = array(
            'type' => $type,
            'indexs' => $indexs
        );
        return view('director/IndexManager', compact('data'));
    }
}

?>