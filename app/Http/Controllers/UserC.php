<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserC extends Controller
{

    public function home(){
        $iduser = Session::get('iduser');
        $user = DB::table('user')->where('role',0)->where('iduser', $iduser)
        ->join('class','class.idclass','=','user.idclass')
        ->join('major','major.idmajor','=','user.idmajor')
        ->first();
        return view('user/Home', compact('user'));
    }

    public function signIn(){
        return view('together/SignIn');
    }

    public function checkSignIn(Request $request){
        $data = $request->all();
        $newdata = DB::table('user')->where([
            ['username',$data['username']],
            ['password',md5($data['password'])]
        ])->get();
        

        if($newdata->count()!=0) {
            if($newdata[0]->active==0) {
                Session::put('login_mess',"Tài khoản đang bị khóa");
                return redirect('/SignIn');
            }
            Session::put('iduser',$newdata[0]->iduser);
            Session::put('username',$newdata[0]->username);
            Session::put('password',$newdata[0]->password);
            Session::put('role',$newdata[0]->role);
            if($newdata[0]->role==0) return redirect('/Home');
            else{
                if($newdata[0]->role==1) return redirect('/MemberManager');
                else return redirect('/UserManager');
            } 
        }
        else {
            Session::put('login_mess',"Thông tin tài khoản hoặc mật khẩu không chính xác");
            return redirect('/SignIn');
        }
    }

    public function changePassForm(){
        return view('together/ChangePass');
    }

    public function changePass(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'new_pass'=>['required','max:30','min:5','without_spaces']
        ]);
        $data = $request->all();
        $newpass = $data['new_pass'];
        DB::table('user')->where('iduser',Session::get('iduser'))->update([
            'password' => md5($newpass)
        ]);
        Session::flush();
        Session::put('login_mess',"Thay đổi mật khẩu thành công");
        return redirect('/SignIn');
    }

    public function signOut(){
        Session::flush();
        return redirect('/SignIn');
    }

}

?>