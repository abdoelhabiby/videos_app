<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{


    public function page(Page $page)
    {

        $title = $page->name;
        return view('front.pages.index',compact('page', 'title'));

    }
}
