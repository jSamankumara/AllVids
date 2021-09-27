<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommonController;

Route::get('/',[VideoController::class,'getVideolist']);

Route::get('/upload', function(){
    return view('upload');
});

Route::get('/getvideo/{foldername}/{filename}',[CommonController::class,'getVideoFile']);

Route::post('signupuser',[UserController::class, 'userSignup']);

Route::post('loginuser',[UserController::class,'userLogin']);

Route::post('uploadvideo',[VideoController::class,'saveVideo']);
