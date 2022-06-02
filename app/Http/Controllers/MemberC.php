<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberC extends Controller
{
    public function getFoodsByIdRes($idres){
        $foods = DB::table('foods')->where('idres',$idres)->orderBy('idfood','desc')->get();
        if(DB::table('reslikes')->where([['idres',$idres],['iduser',Session::get('iduser')]])->exists()) $flag = -1;
        else $flag = 1;
        $res = DB::table('resmanagers')->where('idres',$idres)->get();
        $res = $res[0];
        $foods = array(
            'foods' => $foods,
            'res' => $res,
            'idres' => $idres,
            'flag'=> $flag
        );
        return view('customer/RestaurantFood',compact('foods'));
    }

    public function information(){
        return view('director/Information');
    }

    public function memberManager(){
        return view('director/MemberManager');
    }

    public function memberAddForm(){
        return view('director/AddMember');
    }

    public function foodEditForm(Request $request){
        $data = $request->all();
        $idfood = $data['idfood'];
        $food = DB::table('foods')->where('idfood', $idfood)->get();
        $food = $food[0];
        return view('restaurant/EditFood',compact('food'));
    }

    public function foodAdd(Request $request){
        $request->validate([
            'avatar' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required'],
        ]);
        $data = $request->all();
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $str_rd = Str::random(20);
            $image->move(public_path("/images"),$str_rd.'.jpg');
            $str_rd = "/images/".$str_rd ;
            $data = array(
                'idres' => Session::get('idres'),
                'name' => $data['name'],
                'avatar' => $str_rd.'.jpg',
                'price' => $data['price'],
            );

            DB::table('foods')->insertGetId($data);
            return redirect('/FoodManager');
        }

    }

    public function foodEdit(Request $request){
        $request->validate([
            'avatar' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required'],
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
                'price' => $data['price'],
            );

            DB::table('foods')->where('idfood', $data['idfood'])->update($update);
            return redirect('/FoodManager');
        }
    }
}

?>