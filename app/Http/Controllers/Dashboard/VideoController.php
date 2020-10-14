<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\Dashboard\VideoRequest;

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

            if($validated['order'] == null ){
                $validated['order'] = 0;
            }

            Video::create($validated);

            return redirect()->back()->with(['success' => "success create"]);

        } catch (\Throwable $th) {

            return $th->getMessage();
            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    public function edit($id)
    {



        $row = $this->model->findOrFail($id);


        $notify_id = request()->noti_id ?? '';

        if ($notify_id != '') {
            $noification = DB::table('notifications')->where('id', $notify_id)->first();

            if ($noification) {
                admin()->notifications->where('id', $notify_id)->markAsRead();
            }
        }


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


            return redirect()->back()->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->back()->with(['error' => "some errors happend pleas try again later"]);
        }
    }



    public function destroy($id)
    {

        try {

            $row = $this->model->findOrFail($id);


            $row->delete();

            return redirect()->back()->with(['success' => "success delete"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }

}
