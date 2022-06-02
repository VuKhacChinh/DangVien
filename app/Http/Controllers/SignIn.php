<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SignIn extends Controller
{
    public function signIn(){
        return view('together/SignIn');
    }

    public function checkPassword(Request $request){
        $data = $request->all();
        $type = $data['type'];
        if($type=="admin"){
            $newdata = DB::table('admins')->select('*')->where([
                ['username',$data['username']],
                ['password',md5($data['password'])]
            ])->get();
        }
        else {
            if($type=="user"){
                $newdata = DB::table('users')->select('*')->where([
                    ['username',$data['username']],
                    ['password',md5($data['password'])]
                ])->get();
            }
            else{
                $newdata = DB::table('resmanagers')->select('*')->where([
                    ['username',$data['username']],
                    ['password',md5($data['password'])]
                ])->get();
            }
        }
        

        if($newdata->count()!=0) {
            if($newdata[0]->active==0) {
                Session::put('login_mess',"Tài khoản đang bị khóa");
                return redirect('/SignIn');
            }
            Session::put('name',$newdata[0]->name);
            if($type=="res"){
                Session::put('idres',$newdata[0]->idres);
            }
            else Session::put('iduser',$newdata[0]->iduser);
            Session::put('username',$newdata[0]->username);
            Session::put('password',$newdata[0]->password);
            if($type=="admin") return redirect('UserManager');
            else{
                Session::put('address',$newdata[0]->address);
                Session::put('avatar',$newdata[0]->avatar);
                if($type=="res") return redirect('/FoodManager');
                else return redirect('/Home');
            } 
        }
        else {
            Session::put('login_mess',"Thông tin tài khoản hoặc mật khẩu không chính xác");
            return redirect('/SignIn');
        }
    }
}
?>