<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Team;
use App\Models\Order;
use App\Models\Message;
use App\Models\ResLike;
use App\Models\ResManager;

class Ajax extends Controller
{
    

    

    public function chat(Request $request){
        $data = $request->all();
        $message = array(
            'iduser' => $data['iduser'],
            'content' => $data['content'],
            'type' => $data['type'],
            'state' => $data['state'],
        );

        DB::table('message')->insertGetId($message);
    }
    

    public function deleteIndex(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $type=$data['type'];
        if($type==1){
            DB::table('class')->where('idclass',$id)->delete();
        }
        else DB::table('major')->where('idmajor',$id)->delete();
    }

    public function editIndex(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $type=$data['type'];
        $name = $data['name'];
        if($type==1){
            DB::table('class')->where('idclass',$id)->update(['class' => $name]);
        }
        else DB::table('major')->where('idmajor',$id)->update(['major' => $name]);
    }

    public function addIndex(Request $request){
        $data = $request->all();
        $type=$data['type'];
        $name = $data['name'];
        if($type==1){
            DB::table('class')->insertGetId(['class' => $name]);
        }
        else DB::table('major')->insertGetId(['major' => $name]);
    }

    public function deleteNotify(Request $request){
        $data = $request->all();
        $idnotify = $data['idnotify'];
        DB::table('notify')->where('idnotify',$idnotify)->delete();
    }

    public function editNotify(Request $request){
        $data = $request->all();
        $idnotify = $data['idnotify'];
        $content = $data['content'];
        DB::table('notify')->where('idnotify',$idnotify)->update(['content' => $content]);
    }

    public function addNotify(Request $request){
        $data = $request->all();
        $content = $data['content'];
        DB::table('notify')->insertGetId(['content' => $content]);
    }

    public function orderAproval(Request $request){
        $data = $request->all();
        DB::table('orders')->where('idorder',$data['idorder'])->update(['state'=> $data['state']]);
    }

}

?>