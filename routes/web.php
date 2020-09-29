<?php

use Illuminate\Support\Facades\Route;

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

define('FRONT_PAGINATE', 10);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::group(['namespace' => 'Front'], function () {

    Route::get('/playlists', "PlaylistController@index")->name('front.playlist.index');
    Route::get('/playlists/{playlist}', "PlaylistController@show")->name('front.playlist.show');

    Route::get('/video/{video}', "PlaylistController@videoShow")->name('front.playlist.videos.show');

    Route::get('/tags/{tag}', "PlaylistController@tags")->name('front.tags.show');

    Route::get('/skills/{skill}', "PlaylistController@skills")->name('front.skills.show');

    Route::get('/category/{category}', "PlaylistController@category")->name('front.category.show');



    Route::group(['middleware' => ['auth', 'merge.user_id']], function () {
        Route::post('video/comment', 'VideoCommentController@store')->name('video.comment.store');
    });


    Route::put('video/comment/{comment}/update', 'VideoCommentController@update')->name('video.comment.update');
    Route::delete('video/comment/{comment}', 'VideoCommentController@destroy')->name('video.comment.destroy');


});






Auth::routes();
