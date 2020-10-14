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

    //-------------------------------------------------------------

    public function update(VideoComment $comment, VideoCommentRequest $request)
    {
        try {



            $comment->update(['comment' => $request->comment]);

            return redirect()->route('dashboard.videos.edit',[$comment->video_id, '#comments'])->with(['success' => "success update"]);

        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    //-------------------------------------------------------------
    //-------------------------------------------------------------

    public function destroy(VideoComment $comment)
    {
        try {
            $comment->delete();
            return redirect()->route('dashboard.videos.edit', [$comment->video_id, '#comments'])->with(['success' => "success delete"]);
        } catch (\Throwable $th) {

            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }
}
