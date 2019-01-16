<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/courses','CourseController');
Route::group(['prefix'=>'courses'],function(){
	Route::apiResource('/{course}/reviews','ReviewController');
});
