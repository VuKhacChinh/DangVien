<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax;
use App\Http\Controllers\MemberC;
use App\Http\Controllers\UserC;
use App\Http\Controllers\IndexC;
use App\Http\Controllers\NotifyC;
use App\Http\Controllers\MessageC;

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

//director

Route::get('/MemberManager',[MemberC::class, 'memberManager']);
Route::get('/Information/{iduser}',[MemberC::class, 'information']);

Route::get('/AddMember',[MemberC::class, 'memberAddForm']);
Route::post('/AddMember',[MemberC::class, 'addMember']);
Route::get('/EditMember',[MemberC::class, 'memberEditForm']);
Route::post('/EditMember',[MemberC::class, 'editMember']);
Route::get('/IndexManager/{type}',[IndexC::class, 'indexManager']);
Route::get('/NotifyManager',[NotifyC::class, 'notifyManager']);
Route::get('/ListChat',[MessageC::class, 'listChat']);

Route::get('/Ajax/DeleteIndex',[Ajax::class, 'deleteIndex']);
Route::get('/Ajax/AddIndex',[Ajax::class, 'addIndex']);
Route::get('/Ajax/EditIndex',[Ajax::class, 'editIndex']);

Route::get('/Ajax/DeleteNotify',[Ajax::class, 'deleteNotify']);
Route::get('/Ajax/AddNotify',[Ajax::class, 'addNotify']);
Route::get('/Ajax/EditNotify',[Ajax::class, 'editNotify']);

Route::get('/DirectorMessenger/{iduser}',[MessageC::class, 'directorMessenger']);

// user
Route::get('/Home',[UserC::class,'home']);
Route::get('/Notify',[NotifyC::class,'notify']);
Route::get('/UserMessenger',[MessageC::class, 'userMessenger']);

//together

Route::get('/SignIn',[UserC::class,'signIn']);
Route::get('/SignOut',[UserC::class,'signOut']);
Route::post('/CheckSignIn',[UserC::class,'checkSignIn']);
Route::get('/ChangePass',[UserC::class, 'changePassForm']);
Route::post('/ChangePass',[UserC::class, 'changePass']);
Route::get('/Ajax/Chat',[Ajax::class,'chat']);