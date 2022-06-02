<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class IndexC extends Controller
{
    public function indexManager(){
        return view('director/IndexManager');
    }
}

?>