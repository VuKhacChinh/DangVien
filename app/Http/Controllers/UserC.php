<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserC extends Controller
{
    public function changePass(){
        return view('customer/ChangePass');
    }

    public function checkChangePass(Request $request){
        $data = $request->all();
        $newpass = $data['new_pass'];
        DB::table('users')->where('username',Session::get('username'))->update([
            'password' => md5($newpass)
        ]);
        Session::flush();
        Session::put('login_mess',"Thay đổi mật khẩu thành công");
        return redirect('/SignIn');
    }

    public function changeInfo(){
        return view('customer/ChangeInfo');
    }

    public function checkChangeInfo(Request $request){
        $request->validate([
            'avatar' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'name' => ['required', 'min:5', 'max:100'],
            'address' => ['required', 'min:1', 'max: 200'],
        ]);
        $data = $request->all();
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $str_rd = Str::random(20);
            $image->move(public_path("/images"),$str_rd.'.jpg');
            $str_rd = "/images/".$str_rd ;
            $update = array(
                'name' => $data['name'],
                'avatar' => $str_rd.'.jpg',
                'address' => $data['address'],
            );
            DB::table('users')->where('iduser', Session::get('iduser'))->update($update);
            Session::put('name', $update['name']);
            Session::put('avatar', $update['avatar']);
            Session::put('address', $update['address']);
            return redirect('/Home');
        }
    }

    public function signOut(){
        Session::flush();
        return redirect('/SignIn');
    }
}

?>