<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MemberC extends Controller
{

    public function information($iduser){
        $user = DB::table('user')->where('role',0)->where('iduser', $iduser)
        ->join('class','class.idclass','=','user.idclass')
        ->join('major','major.idmajor','=','user.idmajor')
        ->first();
        return view('director/Information', compact('user'));
    }

    public function memberManager(){
        $users = DB::table('user')->where('role',0)->orderBy('iduser','desc')
        ->join('class','class.idclass','=','user.idclass')
        ->join('major','major.idmajor','=','user.idmajor')
        ->get();
        return view('director/MemberManager',compact('users'));
    }

    public function memberAddForm(){
        $classes = DB::table('class')->get();
        $majors = DB::table('major')->get();
        $data = array(
            'classes' => $classes,
            'majors' => $majors
        );
        return view('director/AddMember', compact('data'));
    }

    public function addMember(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'username'=>['required','max:30','min:1','without_spaces','unique:user,username'],
            'password'=>['required','max:30','min:1','without_spaces', 'confirmed']
            ]);
        $data = $request->all();
        $record = array(
            'username' => $data['username'],
            'password' => md5($data['password']),
            'name' => $data['name'],
            'address' => $data['address'],
            'address2' => $data['address2'],
            'birthday' => $data['birthday'],
            'job' => $data['job'],
            'ethnic' => $data['ethnic'],
            'religion' => $data['religion'],
            'idclass' => $data['idclass'],
            'sex' => $data['sex'],
            'idmajor' => $data['idmajor'],
            'IT' => $data['IT'],
            'Eng' => $data['Eng'],
            'phylo' => $data['phylo']
        );
        DB::table('user')->insertGetId($record);
        return redirect('/MemberManager');
    }

    public function memberEditForm(Request $request){
        $data = $request->all();
        $iduser = $data['iduser'];
        $classes = DB::table('class')->get();
        $majors = DB::table('major')->get();
        $user = DB::table('user')->where('role',0)->where('iduser', $iduser)
        ->join('class','class.idclass','=','user.idclass')
        ->join('major','major.idmajor','=','user.idmajor')
        ->first();
        $data = array(
            'classes' => $classes,
            'majors' => $majors,
            'user' => $user
        );
        return view('director/EditMember', compact('data'));
    }

    public function editMember(Request $request){
        $data = $request->all();
        $record = array(
            'name' => $data['name'],
            'address' => $data['address'],
            'address2' => $data['address2'],
            'birthday' => $data['birthday'],
            'job' => $data['job'],
            'ethnic' => $data['ethnic'],
            'religion' => $data['religion'],
            'idclass' => $data['idclass'],
            'sex' => $data['sex'],
            'idmajor' => $data['idmajor'],
            'IT' => $data['IT'],
            'Eng' => $data['Eng'],
            'phylo' => $data['phylo'],
            'state' => $data['state']
        );
        DB::table('user')->where('iduser',$data['iduser'])->update($record);
        return redirect('/MemberManager');
    }

}

?>