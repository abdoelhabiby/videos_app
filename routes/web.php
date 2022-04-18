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


if(!defined('FRONT_PAGINATE')){
define('FRONT_PAGINATE', 9);
    
}

Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'WelcomeController@index')->name('welcome');

    Route::get('/search', 'WelcomeController@search')->name('front.playlist_video.search');

    //---------------------profile -----------------------
    Route::get('/profile/{user}/{name?}', 'ProfileController@index')->name('front.profile');

    Route::group(['middleware' => 'auth'], function () {

        Route::put('/profile', 'ProfileController@update')->name('front.profile.update');
        Route::put('/profile/password', 'ProfileController@cahengePassword')->name('front.profile.password');

    //---------------------profile -----------------------

        //-------------------notifications-------------------
        Route::get('notifications', 'UserNotifications@index')->name('user.notifications.index');
        Route::post('notifications', 'UserNotifications@latest')->name('user.notifications.latest');
        Route::delete('notifications/{id}', 'UserNotifications@destroy')->name('user.notifications.destroy');
    //-------------------notifications-------------------

    });



    //----------------------pages-----------------------


    Route::get("page/{page:name}", 'WelcomeController@page')->name('front.page');



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


    //----------------start reply comment----------------------

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::post('comment/replay/{comment}', "CommentReplyController@store")->name('front.comment.reply.store');
        Route::put('comment/replay/{reply}/update', "CommentReplyController@update")->name('front.comment.reply.update');
        Route::delete('comment/replay/{reply}', "CommentReplyController@destroy")->name('front.comment.reply.destroy');
    });

    //----------------end reply comment----------------------

    //--------------start contact us ---------------------

    Route::post("/conatct-us", "ContactUsController@store")->name('front.contact-us.store');

    //--------------end contact us -----------------------






});






Auth::routes();
