<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// five api per minute
Route::group([ 'middleware' => 'throttle:5,1' ], function () {
    Route::get('/test', function () {
        return 'test route';
    });
});

Route::post('upload', function (Request $request)
{
    $file = request()->file('image');
    $ext = $file->extension();
    $path = $file->storeAs('images', 'cam.'.$ext);
});
