<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\User;
use App\Models\Video;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    //-------------------------------------------

    public function page(Page $page)
    {

        $title = $page->name;
        return view('front.pages.index', compact('page', 'title'));
    }


    //-------------------------------------------

    public function search(Request $request)
    {
        try {

            if ($request->search && $request->search != '') {
                 $playlists = Playlist::where('name', 'like', '%' . $request->search . "%")->get();
                 $videos = Video::where('name', 'like', '%' . $request->search . "%")->get();
                 $title = 'result search ' . $request->search;

                 return view('front.search.index',compact(['playlists', 'videos', 'title']));
            }


            return redirect()->route('welcome');

        } catch (\Throwable $th) {

          return redirect()->route('welcome');
        }
    }



}
