<?php

namespace App\Http\Controllers\Front;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{

    function index()
    {
        $rows = Playlist::orderBy('id', 'desc')->paginate(FRONT_PAGINATE);
        $title = 'playlists';

        return view('front.playlists.index', compact('rows', 'title'));
    }


    public function show($id)
    {
        $playlist = Playlist::with([
            'category',
            'videos' => function ($q) {
                return $q->published()->order();
            },
            'skills',
            'tags'
        ])->findOrFail($id);

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



    public function videoShow($id)
    {


        $video = Video::published()->where('id', $id)->with(['playlist', 'comments.user', 'admin' => function ($q) {
            return $q->select('name', 'id');
        }])->first();

        if (!$video) {
            abort(404);
        }

        if (user()) {
            $notify_id = request()->noti_id ?? '';

            if ($notify_id != '') {
                $noification = DB::table('notifications')->where('id', $notify_id)->first();

                if ($noification) {
                    user()->notifications->where('id', $notify_id)->markAsRead();
                }
            }
        }





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
