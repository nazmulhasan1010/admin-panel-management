<?php

use App\Http\Controllers\homeControl;
use App\Http\Controllers\loginControl;
use App\Http\Controllers\memBerControl;
use App\Http\Controllers\postaControl;
use App\Http\Controllers\raf;
use App\Http\Controllers\signinControl;
use App\Http\Controllers\testmonialControl;
use App\Http\Controllers\visitorControl;
use App\Http\Controllers\workControll;
use Illuminate\Support\Facades\Route;


Route::get('/', [loginControl::class, 'login']);
Route::post('signout',[loginControl::class,'signout']);
Route::get('raf', [raf::class, 'getsession']);
Route::post('temp', [loginControl::class, 'temp']);
Route::get('home', [homeControl::class, 'home'])->name('home')->middleware('logvalid');
Route::post('workup', [postaControl::class, 'workspost']);
Route::post('logIn',[loginControl::class,'logInfoCheck']);
Route::get('signIn',[signinControl::class,'signIn']);
Route::post('signUp',[signinControl::class,'signUp']);
Route::post('exesTingCheck',[signinControl::class,'exesTingCheck']);


//work posts
Route::get('works', [workControll::class, 'work'])->middleware('logvalid');
Route::get('postget', [workControll::class, 'posts']);
Route::post('postdelete', [workControll::class, 'postdelete']);
Route::post('editinfoget', [workControll::class, 'editinfoget']);
Route::post('workupdate', [workControll::class, 'workupdate']);

//visitors
Route::get('visitor', [visitorControl::class, 'visitor'])->middleware('logvalid');
Route::get('visitorsinfo', [visitorControl::class, 'visitorsInfo']);
Route::post('visitordelete', [visitorControl::class, 'visitorsDelete']);
Route::get('newvisitor', [visitorControl::class, 'newvisitorMonitor']);

//team members
Route::get('team', [memBerControl::class, 'team'])->middleware('logvalid');
Route::post('memberadd', [memBerControl::class, 'memberadd']);
Route::get('memberdataget', [memBerControl::class, 'memberdataget']);
Route::post('membereditinfoget', [memBerControl::class, 'membereditinfoget']);
Route::post('memberinfoupdate', [memBerControl::class, 'memberinfoupdate']);
Route::post('memberinfodelete', [memBerControl::class, 'memberinfodelete']);

//testminal
Route::get('testminal', [testmonialControl::class, 'testMonial'])->middleware('logvalid');
Route::get('testimonialspostget', [testmonialControl::class, 'testimonialspostget']);
Route::post('testimonialspost', [postaControl::class, 'testimonialspost']);
Route::post('testimonialseditinfoget', [testmonialControl::class, 'testimonialseditinfoget']);
Route::post('testimonialsdelete', [testmonialControl::class, 'testimonialsdelete']);
Route::post('authorinfoup', [testmonialControl::class, 'authorinfoup']);


