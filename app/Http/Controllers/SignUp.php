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
    
}

?>