<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SignUp extends Controller
{
    public function signUp(){
        return view('together/SignUp');
    }
    public function checkSignUp(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'username'=>['required','max:30','min:5','without_spaces'],
            'password'=>['required','max:30','min:5','without_spaces'],
            'name'=>['required','min:5','max: 30'],
            'address'=>['required','max:200']
            ]);
        $data = $request->all();
        $record = array(
            'username' => $data['username'],
            'password' => md5($data['password']),
            'name' => $data['name'],
            'address' => $data['address']
        );
        DB::table('users')->insertGetId($record);
        return view('together/SignIn');
    }
}

?>