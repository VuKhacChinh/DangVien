<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax;
use App\Http\Controllers\SignIn;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\MemberC;
use App\Http\Controllers\UserC;
use App\Http\Controllers\IndexC;
use App\Http\Controllers\TeamC;
use App\Http\Controllers\PromotionC;
use App\Http\Controllers\OrderC;
use App\Http\Controllers\AddressC;
use App\Http\Controllers\DataC;
use App\Http\Controllers\PostC;
use App\Http\Controllers\Home;
use App\Http\Controllers\ResManager;

use App\Http\Controllers\AdminC;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Home',[Home::class,'home']);

Route::get('/SignIn',[SignIn::class,'signIn']);

Route::get('/SignUp',[SignUp::class,'signUp']);

Route::get('/SignOut',[UserC::class,'signOut']);

Route::post('/checkSignUp',[SignUp::class,'checkSignUp']);

Route::post('/checkPassword',[SignIn::class,'checkPassword']);

Route::get('/Notification', [PromotionC::class,'getPromotions']);

Route::get('/Restaurant',[ResManager::class,'getAllResTaurant']);

Route::get('/NearRestaurant',[ResManager::class,'getNearRes']);

Route::get('/FavoriteRestaurant', [ResManager::class,'getFavoriteRes']);

Route::get('/GoodFood', function(){
    return view('GoodFood');
});

Route::get('/FavoriteFood', function(){
    return view('FavoriteFood');
});

Route::get('/SearchRestaurant',[ResManager::class,'searchRes']);

Route::get('/RestaurantDetail/{idres}',[ResManager::class,'getResById']);

Route::get('/RestaurantFood/{idres}',[FoodC::class,'getFoodsByIdRes']);

Route::get('/RestaurantPromotion/{idres}',[PromotionC::class,'getPromotionsByIdRes']);

Route::get('/Review/{idres}',[ReviewC::class,'getReviewsByIdRes']);

Route::get('/Review/{idres}/{numstar}',[ReviewC::class,'filterReviews']);

Route::get('/Messenger/{idteam}',[TeamC::class, 'getTeamById']);

Route::get('/Ajax/joinTeam',[Ajax::class,'joinTeam']);
Route::get('/Ajax/getLastTeam',[Ajax::class,'getLastTeam']);
Route::get('/Ajax/makeOrder',[Ajax::class,'makeOrder']);
Route::get('/Ajax/addMember',[Ajax::class,'addMember']);
Route::get('/Ajax/outTeam',[Ajax::class,'outTeam']);
Route::get('/Ajax/sendReview',[Ajax::class,'sendReview']);
Route::get('/Ajax/likeRes',[Ajax::class,'likeRes']);
Route::get('/Ajax/Chat',[Ajax::class,'chat']);

Route::get('/ChangePass',[UserC::class, 'changePass']);
Route::post('/ChangePass',[UserC::class, 'checkChangePass']);

Route::get('/ChangeInfo',[UserC::class, 'changeInfo']);
Route::post('/ChangeInfo',[UserC::class, 'checkChangeInfo']);

Route::get('/UserManager',[AdminC::class, 'userManager']);
Route::get('/ResManager',[AdminC::class, 'resManager']);
Route::get('/AdminManager',[AdminC::class, 'adminManager']);
Route::get('/Ajax/ClockFunc',[Ajax::class, 'clockFunc']);

Route::post('/AddAdmin',[AdminC::class, 'addAdmin']);
Route::post('/AddRes',[ResManager::class, 'addRes']);


Route::get('/MemberManager',[MemberC::class, 'memberManager']);
Route::get('/BranchManager',[PromotionC::class, 'proManager']);
Route::get('/FeatureManager',[ReviewC::class,'featureManager']);
Route::get('/Information',[MemberC::class, 'information']);
Route::get('/CarTypeManager',[PostC::class, 'postManager']);
Route::get('/AddressManager',[AddressC::class, 'addressManager']);
Route::get('/DataManager',[DataC::class, 'dataManager']);

Route::get('/Ajax/FoodDelete',[Ajax::class, 'foodDelete']);
Route::get('/AddMember',[MemberC::class, 'memberAddForm']);
Route::get('/IndexManager',[IndexC::class, 'indexManager']);