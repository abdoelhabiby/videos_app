<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PlaylistRequest;
use App\Http\Controllers\Dashboard\DashboardController;

class PlaylistController extends DashboardController
{

    public function __construct(Playlist $model)
    {
        parent::__construct($model);
    }

//-----------------------------------------------------

public function show(Playlist $playlist)
{
     $videos = Video::where('playlist_id',$playlist->id)->paginate(PAGINATE_COUNT);

    return view('dashboard.playlists.show',compact('playlist', 'videos'));
}
//-----------------------------------------------------
    public function create()
    {
        $skills = Skill::select('name', 'id')->get();
        $tags = Tag::select('name', 'id')->get();
        $categories = Category::select('name', 'id')->get();

        return view('dashboard.' . $this->getClassNameModel() . '.create', compact('skills', 'tags', 'categories'));
    }

//-----------------------------------------------------
    public function store(PlaylistRequest $request)
    {


        try {

            $skills = [];
            $tags = [];

            DB::beginTransaction();

            $validated = $request->validated();

            $image = $request->file('image');

            $path = imageUpload($image, 'playlists');

            $validated['image'] = $path;



            if (isset($validated['skills']) && !empty($validated['skills'])) {
                $skills =  $validated['skills'];
                unset($validated['skills']);
            }

            if (isset($validated['tags']) && !empty($validated['tags'])) {
                $tags =  $validated['tags'];
                unset($validated['tags']);
            }




            $playlist =  Playlist::create($validated);

            if (count($skills) > 0) {
                $playlist->skills()->sync($skills);
            }

            if (count($tags) > 0) {
                $playlist->tags()->sync($tags);
            }


            DB::commit();

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            DB::rollback();

            return $th->getMessage();
            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.create')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }
//-----------------------------------------------------


    public function edit($id)
    {
        $row = $this->model->findOrFail($id);
        $skills = Skill::select('name', 'id')->get();
        $tags = Tag::select('name', 'id')->get();
        $categories = Category::select('name', 'id')->get();

        $video_skills = $row->skills()->pluck('skill_id')->toArray();
        $video_tags = $row->tags()->pluck('tag_id')->toArray();


        return view('dashboard.' . $this->getClassNameModel() . '.edit', compact([
            'row', 'skills', 'video_skills', 'tags', 'video_tags', 'categories'
        ]));
    }

//-----------------------------------------------------

    public function update(PlaylistRequest $request, Playlist $playlist)
    {

        $skills = [];
        $tags = [];


        try {

            DB::beginTransaction();

            $validated = $request->validated();

            if ($request->hasFile('image') && $request->image != null) {

                $image = $request->file('image');

                $path = imageUpload($image, 'playlists');

                $validated['image'] = $path;

                deleteFile($playlist->image);
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
                $playlist->skills()->sync($skills);
            } else {
                $playlist->skills()->detach();
            }


            if (count($tags) > 0) {
                $playlist->tags()->sync($tags);
            } else {
                $playlist->tags()->detach();
            }



            $playlist->update($validated);

            DB::commit();

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {

            return $th->getMessage();

            DB::rollback();
            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.edit',$playlist->id)->with(['error' => "some errors happend pleas try again later"]);

        }
    }

}
