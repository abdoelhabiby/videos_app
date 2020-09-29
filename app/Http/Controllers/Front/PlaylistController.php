<?php

namespace App\Http\Controllers\Front;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{

    function index()
    {
        $rows = Playlist::orderBy('id', 'desc')->paginate(FRONT_PAGINATE);
        $title = 'playlists';

        return view('front.playlists.index', compact('rows', 'title'));
    }


    public function show(Playlist $playlist)
    {
        $row = $playlist;
        $title = $row->name;


        return view('front.playlists.show', compact('row', 'title'));
    }



    public function skills(Skill $skill)
    {
        $rows = $skill->playlists()->orderBy('id', 'desc')->paginate(FRONT_PAGINATE);

        $title = $skill->name;

        return view('front.playlists.index', compact('rows', 'title'));
    }

    public function tags(Tag $tag)
    {
        $rows = $tag->playlists()->orderBy('id', 'desc')->paginate(FRONT_PAGINATE);

        $title = $tag->name;

        return view('front.playlists.index', compact('rows', 'title'));
    }

    public function category(Category $category)
    {
        $rows = $category->playlists()->orderBy('id', 'desc')->paginate(FRONT_PAGINATE);

        $title = $category->name;

        return view('front.playlists.index', compact('rows', 'title'));
    }



    public function videoShow(Video $video)
    {


       $video = $video->with(['playlist','comments.user', 'admin' => function($q){
             return $q->select('name','id');
        }])->first();



        $playlist = $video->playlist;

        $next = null;
        $prev = null;

        $get_prev = $playlist->videos()->where('id', '<', $video->id)->orderBy('id', 'desc')->select('id', 'name')->first();
        $get_next = $playlist->videos()->where('id', '>', $video->id)->orderBy('id', 'asc')->select('id', 'name')->first();

        $prev = $get_prev ?? null;

        $next = $get_next ?? null;

        $title = $video->name;


        return view("front.video.index", compact(['title', 'video', 'next', 'prev']));
    }
}
