<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{





    public function index()
    {



            $playlists = Playlist::count();
            $videos = Video::count();
            $users = User::count();
            $skills = Skill::count();
            $categories = Category::count();
            $comp = [
                "playlists",
                "videos",
                "users",
                "skills",
                "categories",
            ];

            return view('dashboard.home', compact($comp));


    }
}
