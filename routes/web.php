<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;

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

Route::group(['middleware'=>"web"], function(){
	Route::get("/",[RestoController::class,'index']);
	Route::get("/list",[RestoController::class,'list']);
	Route::view("/add",'add');
	Route::post("/add",[RestoController::class,'add']);
	Route::get("/delete/{id}",[RestoController::class,'delete']);
	Route::get("/edit/{id}",[RestoController::class,'edit']);
	Route::post("/edit",[RestoController::class,'update']);
	Route::view("register",'register');
	Route::post("register",[RestoController::class,'register']);
	Route::view("login",'login');
	Route::post("login",[RestoController::class,'login']);
	Route::get("/logout",[RestoController::class,'logout']);
});
