<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Dashboard\VideoRequest;
use App\Models\Playlist;

class VideoController extends DashboardController
{
    protected $module_name = 'videos';

    public function  __construct(Video $model)
    {
        parent::__construct($model);
    }



    public function index()
    {

         $model = $this->model;

        $model = $this->filter($model);


        $rows = $model->with(
            [
                'admin' => function ($us) {

                    $us->select('name', 'id');

                },
                'playlist' => function ($playlist) {

                    $playlist->select('name', 'id');

                }

            ]
        )->orderBy('id', 'desc')->paginate(PAGINATE_COUNT);


        return view('dashboard.' . $this->getClassNameModel() . '.index', compact(['rows']));
    }


    public function create()
    {
         $playlists = Playlist::select('id','name')->get();

        return view('dashboard.' . $this->getClassNameModel() . '.create', compact(['playlists']));

    }



    public function store(VideoRequest $request)

    {



        try {



            $validated = $request->validated();

            $validated['admin_id'] = auth('admin')->user()->id;

            Video::create($validated);


            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);

        } catch (\Throwable $th) {

        //    return $th->getMessage();
            return redirect()->route('dashboard.' . $this->module_name . '.create')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    public function edit($id)
    {
        $row = $this->model->findOrFail($id);
        $playlists = Playlist::select('id', 'name')->get();

        $comments = $row->comments()->with(['user', 'replies'])->get();

        return view('dashboard.' . $this->getClassNameModel() . '.edit', compact([
            'row','comments', 'playlists'
            ]));

    }



    public function update(VideoRequest $request, Video $video)
    {


        try {


            $validated = $request->validated();
            $video->update($validated);


            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {

            return redirect()->back()->with(['error' => "some errors happend pleas try again later"]);
        }
    }




}
