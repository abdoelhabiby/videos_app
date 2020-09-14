<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Dashboard\VideoRequest;

class VideoController extends DashboardController
{
    protected $module_name = 'videos';

    public function  __construct(Video $model)
    {
        $this->middleware(['merge.user_id'])->only(['store', 'update']);
        parent::__construct($model);
    }



    public function index()
    {

        $model = $this->model;

        $model = $this->filter($model);


        $rows = $model->with(
            [
                'category' => function ($query) {

                    $query->select('name', 'id');
                }, 'user' => function ($us) {

                    $us->select('name', 'id');

                }
            ]
        )->orderBy('id', 'desc')->paginate(PAGINATE_COUNT);

        return view('dashboard.' . $this->getClassNameModel() . '.index', compact(['rows']));
    }


    public function create()
    {
        $skills = Skill::get();
        $tags = Tag::get();

        return view('dashboard.' . $this->getClassNameModel() . '.create', compact('skills', 'tags'));
    }

    public function store(VideoRequest $request)

    {



        try {

            $skills = [];
            $tags = [];

            DB::beginTransaction();

            $validated = $request->validated();

            $image = $request->file('image');

            $path = imageUpload($image, 'videos');

            $validated['image'] = $path;



            if (isset($validated['skills']) && !empty($validated['skills'])) {
                $skills =  $validated['skills'];
                unset($validated['skills']);
            }

            if (isset($validated['tags']) && !empty($validated['tags'])) {
                $tags =  $validated['tags'];
                unset($validated['tags']);
            }




            $video =  Video::create($validated);

            if (count($skills) > 0) {
                $video->skills()->sync($skills);
            }

            if (count($tags) > 0) {
                $video->tags()->sync($tags);
            }


            DB::commit();

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);

        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->route('dashboard.' . $this->module_name . '.create')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    public function edit($id)
    {
        $row = $this->model->findOrFail($id);
        $skills = Skill::get();
        $tags = Tag::get();
        $video_skills = $row->skills()->pluck('skill_id')->toArray();
        $video_tags = $row->tags()->pluck('tag_id')->toArray();
        $comments = $row->comments()->with('user')->orderBy('id','desc')->get();


        return view('dashboard.' . $this->getClassNameModel() . '.edit', compact([
            'row', 'skills', 'video_skills','tags', 'video_tags','comments'
            ]));

    }



    public function update(VideoRequest $request, Video $video)
    {

        $skills = [];
        $tags = [];


        try {

            DB::beginTransaction();

            $validated = $request->validated();

            if ($request->hasFile('image') && $request->image != null) {

                $image = $request->file('image');

                $path = imageUpload($image, 'videos');

                $validated['image'] = $path;

                deleteFile($video->image);
            }



            if (isset($validated['skills']) && !empty($validated['skills'])) {
                $skills =  $validated['skills'];
                unset($validated['skills']);
            }

            if (isset($validated['tags']) && !empty($validated['tags'])) {
                $tags =  $validated['tags'];
                unset($validated['tags']);
            }


            if (count($skills) > 0) {
                $video->skills()->sync($skills);
            } else {
                $video->skills()->detach();
            }


            if (count($tags) > 0) {
                $video->tags()->sync($tags);
            } else {
                $video->tags()->detach();
            }



            $video->update($validated);

            DB::commit();

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {

            DB::rollback();
            return redirect()->back()->with(['error' => "some errors happend pleas try again later"]);
        }
    }




}
