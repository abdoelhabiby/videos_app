<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VideoCommentRequest;
use App\Models\Video;
use App\Models\VideoComment;

class VideoCommentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['merge.user_id'])->only(['store', 'update']);
    }

    public function store(VideoCommentRequest $request)
    {
        try {

            DB::beginTransaction();

             $video = Video::findOrFail($request->video_id);

             $comment = VideoComment::make(['comment' => $request->comment]);

             $comment->user()->associate($request->user_id);

             $video->comments()->save($comment);

            DB::commit();

            return redirect()->back()->with(['success' => "success create"]);
        } catch (\Throwable $th) {

            DB::rollback();

            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    public function destroy(VideoComment $comment)
    {
        try{
               $comment->delete();
               return redirect()->back()->with(['success' => "success delete"]);
        } catch (\Throwable $th) {


            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }
}
