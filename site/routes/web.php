<?php

use App\Http\Controllers\homeControl;
use App\Http\Controllers\main;
use Illuminate\Support\Facades\Route;


Route::get('/',[homeControl::class,'home']);
Route::get('/about',[main::class,'about']);
Route::get('/demos',[main::class,'demo']);
Route::get('/service',[main::class,'service']);
