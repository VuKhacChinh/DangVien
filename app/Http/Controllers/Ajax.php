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
    public function sendReview(Request $request){
        $reviewContent = $request->all();
        $record = array(
            'idres' => $reviewContent['idres'],
            'iduser' => $reviewContent['iduser'],
            'content' => $reviewContent['reviewContent'],
            'numstar' => $reviewContent['numstar'],
            'time' => date("Y/m/d")
        );
        DB::table('reviews')->insertGetId($record);
        DB::table('resmanagers')->where('idres',$reviewContent['idres'])->increment('numreview',1);
        DB::table('resmanagers')->where('idres',$reviewContent['idres'])->increment('numstar',$reviewContent['numstar']);
    }

    public function likeRes(Request $request){
        $data = $request->all();
        if($data['addedNumber']==1) DB::table('reslikes')->insert(['idres'=> $data['idres'],'iduser'=> $data['iduser']]);
        else DB::table('reslikes')->where([['idres',$data['idres']],['iduser',$data['iduser']]])->delete();
        DB::table('resmanagers')->where('idres',$data['idres'])->increment('numlike',$data['addedNumber']);
    }

    public function joinTeam(Request $request){
        $data = $request->all();
        $idres = $data['idres'];
        $teamusers = Team::where('idres',$idres)->get();
        $teams = Team::where('idres',$idres)->where('nummember','<',8)->where('lock',1)->orderBy('idteam','desc')->get();
        $flag = Team::where('idres',$idres)->where('nummember','<',8)->where('lock',1)->exists();
        foreach($teamusers as $t){
            if(DB::table('team_user')->where([['idteam',$t->idteam],['iduser',Session::get('iduser')]])->exists()){
                return -1;
            }
        }
        if($flag){
            $team = $teams[0];
            DB::table('team_user')->insert([
                'idteam' => $team->idteam,
                'iduser' => Session::get('iduser')
            ]);
            DB::table('teams')->where('idteam',$team->idteam)->update([
                'nummember' => $team->nummember + 1,
                'lastmess' => date('y-m-d h:i:s')
            ]);
            DB::table('messages')->insertGetId([
                'idteam' => $team->idteam,
                'iduser' => Session::get('iduser'),
                'content' => 'đã vào nhóm',
                'time' => date('y-m-d h:i:s'),
                'type' => 1
            ]);
            return $team->idteam;
        }

        else{
            $idteam = Team::insertGetId(
                [
                    'idres' => $idres,
                    'nummember' => 1,
                    'idleader'=>Session::get('iduser'),
                    'lastmess' => date('y-m-d h:i:s')
                ]
            );
            DB::table('team_user')->insert([
                'idteam' => $idteam,
                'iduser' => Session::get('iduser')
            ]);

            DB::table('messages')->insertGetId([
                'idteam' => $idteam,
                'iduser' => Session::get('iduser'),
                'content' => 'đã vào nhóm',
                'time' => date('y-m-d h:i:s'),
                'type' => 1
            ]);
            return $idteam;
        }
    }

    public function getLastTeam(){
        if(!DB::table('team_user')->where('iduser',Session::get('iduser'))->exists()) return -1;
        $lastTeam = Team::join('team_user','teams.idteam','=','team_user.idteam')->where('iduser', Session::get('iduser'))->orderBy('lastmess','desc')->get();
        return $lastTeam[0]->idteam;
    }

    public function makeOrder(Request $request){
        $data = $request->all();
        $date = date('Y-m-d');
        $hour = $data['hour'];
        $minute = $data['minute'];
        $date = $date." ".$hour.":".$minute.":".date('s');
        $idteam = $data['idteam'];
        $phonenumber = $data['phonenumber'];
        Order::insertGetId([
            'idteam' => $idteam,
            'time' => $date,
            'phonenumber' => $phonenumber,
            'state' => 0
        ]);
    }

    public function addMember(Request $request){
        $data = $request->all();
        $idteam = $data['idteam'];
        $team = DB::table('teams')->where('idteam',$idteam)->get();
        $lock = $team[0]->lock;
        if($lock==0) return "Nhóm đang bị khóa";
        $iduser = $data['iduser'];
        if(User::where('iduser',$iduser)->exists()){
            if(DB::table('team_user')->where('idteam',$idteam)->where('iduser',$iduser)->exists()) return "Người dùng đã ở trong nhóm";
            DB::table('team_user')->insert([
                'idteam' => $idteam,
                'iduser' => $iduser
            ]);
            DB::table('teams')->where('idteam',$idteam)->increment('nummember',1);
            $user = User::where('iduser',$iduser)->get();
            $user = $user[0];
            return "Đã thêm ".$user->name;
        }
        else{
            return "Người dùng không tồn tại";
        }
    }

    public function outTeam(Request $request){
        $data = $request->all();
        $idteam = $data['idteam'];
        $iduser = $data['iduser'];
        DB::table('team_user')->where('idteam',$idteam)->where('iduser',$iduser)->delete();
        DB::table('teams')->where('idteam',$idteam)->increment('nummember',-1);
        $users = DB::table('team_user')->where('idteam',$idteam);
        if(!$users->exists()){
            Message::where('idteam',$idteam)->delete();
            Team::where('idteam',$idteam)->delete();
        }
        else{
            $users = $users->get();
            $user = $users[0];
            DB::table('teams')->where('idteam',$idteam)->update(['idleader'=>$user->iduser]);
        }
        $message = array(
            'idteam' => $idteam,
            'iduser' => $iduser,
            'content' => "Đã rời nhóm",
            'time' => date('y-m-d h:i:s'),
            'type' => 1
        );

        DB::table('messages')->insertGetId($message);
    }

    public function chat(Request $request){
        $data = $request->all();
        $message = array(
            'idteam' => $data['idteam'],
            'iduser' => $data['iduser'],
            'content' => $data['content'],
            'time' => $data['time'],
            'type' => 0
        );

        DB::table('messages')->insertGetId($message);
    }

    public function clockFunc(Request $request){
        $data = $request->all();
        $type = $data['type'];
        if($type==="user") DB::table('users')->where('iduser',$data['iduser'])->update(['active' => $data['active'] ]);
        else{
            if($type==="admin") DB::table('admins')->where('iduser',$data['iduser'])->update(['active' => $data['active'] ]);
            else{
                if($type==="team"){
                    DB::table('teams')->where('idteam',$data['idteam'])->update(['lock' => $data['lock'] ]);
                }
                else DB::table('resmanagers')->where('idres',$data['idres'])->update(['active' => $data['active'] ]);
            }
        }
        
    }

    public function foodDelete(Request $request){
        $data = $request->all();
        $idfood = $data['idfood'];
        DB::table('foods')->where('idfood',$idfood)->delete();
    }

    public function proDelete(Request $request){
        $data = $request->all();
        $idpromotion = $data['idpromotion'];
        DB::table('promotions')->where('idpromotion',$idpromotion)->delete();
    }

    public function postDelete(Request $request){
        $data = $request->all();
        $idpost = $data['idpost'];
        DB::table('posts')->where('idpost',$idpost)->delete();
    }

    public function orderAproval(Request $request){
        $data = $request->all();
        DB::table('orders')->where('idorder',$data['idorder'])->update(['state'=> $data['state']]);
    }

}

?>