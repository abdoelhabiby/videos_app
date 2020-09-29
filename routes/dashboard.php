<?php

use Illuminate\Support\Facades\Route;

define('PAGINATE_COUNT', 3); // make get paginate count from model dynamic hhhhh


Route::group(['middleware' => 'auth:admin'], function () {



    Route::get("/", "HomeController@index")->name('dashboard.home');

    Route::resources([

        'admins' => "AdminController",
        'users' => "UserController",
        'categories' => "CategoryController",
        'skills' => "SkillController",
        'tags' => "TagController",
        'pages' => "PageController",
        'playlists' => "PlaylistController",
        'videos' => "VideoController",

    ], [
        'as' => "dashboard", "except" => "show"
    ]);


    Route::delete('video/comments/{comment}',"VideoCommentController@destroy")->name('dasboard.video.comment.destroy');

    Route::put("video/comments/{comment}", "VideoCommentController@update")->name('dasboard.video.comment.update');


    Route::post('comment/replay', "CommentReplyController@store")->name('dasboard.comment.reply.store');
    Route::put('comment/replay/{reply}/update', "CommentReplyController@update")->name('dasboard.comment.reply.update');
    Route::delete('comment/replay/{reply}', "CommentReplyController@destroy")->name('dasboard.comment.reply.destroy');



    Route::get('logout', 'LoginController@logout')->name('dashboard.logout');

});





Route::get('login','LoginController@showLoginForm')->name('dashboard.login')->middleware('guest:admin');
Route::post('login','LoginController@login')->name('dashboard.login')->middleware('guest:admin');






//     <!-- /resources/views/post/create.blade.php -->

// <h1>Create Post</h1>

// @if ($errors->any())
//     <div class="alert alert-danger">
//         <ul>
//             @foreach ($errors->all() as $key => $error)
//                 <li>{{ $error }}</li>
//             @endforeach
//         </ul>
//     </div>
// @endif

// <!-- Create Post Form -->



















// $array = array('2', '4', '8', '5', '1', '7', '6', '9', '10', '3');

// for ($h = 0; $h < count($array); $h++) {


//     for ($i=0; $i < count($array) - 1; $i++) {

//         if ($array[$i] > $array[$i + 1]) {
//             $temp = $array[$i + 1];
//             $array[$i + 1] =  $array[$i];
//             $array[$i] = $temp;
//         }
//     }


// }

// dd($array) ;
