<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\ResManager;
use Illuminate\Support\Facades\DB;
use Validator;

class AdminC extends Controller
{
    public function userManager(){
        $users = User::all();
        return view('admin/UserManager',compact('users'));
    }

    function resManager(){
        $restaurants = DB::table('resmanagers')->get();
        return view('admin/ResManager',compact('restaurants'));
    }

    function adminManager(){
        $admins = DB::table('admins')->get();
        return view('admin/AdminManager',compact('admins'));
    }

    public function addAdmin(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'username'=>['required','max:30','min:5','without_spaces'],
            'password'=>['required','max:30','min:5','without_spaces'],
            'password_confirmation' => ['required'],
            'name'=>['required','max: 30']
            ]);
        $data = $request->all();
        if(DB::table('admins')->where('username',$data['username'])->exists()){
            Session::put('add_err',"Tài khoản đã tồn tại");
        }
        else{
            $record = array(
                'username' => $data['username'],
                'password' => md5($data['password']),
                'name' => $data['name']
            );
            DB::table('admins')->insertGetId($record);
        }
        return redirect('/AdminManager');
    }
}

?>