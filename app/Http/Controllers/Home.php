<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Team;

class Home extends Controller
{
    public function home(){
        $posts = Post::join('resmanagers','posts.idres','=','resmanagers.idres')->get();
        $teams = Team::join('team_user','teams.idteam','=','team_user.idteam')->where('iduser',Session::get('iduser'))->join('resmanagers','teams.idres','=','resmanagers.idres')->get();
        $home = array(
            'posts'=> $posts,
            'teams'=>$teams
        );
        return view('customer/Home',compact('home'));
    }
}

?>