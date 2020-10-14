<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin;
use App\Models\Video;
use App\Events\MyEvent;
use App\Models\VideoComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserAddComment;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Dashboard\VideoCommentRequest;

class VideoCommentController extends Controller
{

    public function store(VideoCommentRequest $request)
    {

        try {


            $video = Video::findOrFail($request->video_id);
            $comment = VideoComment::make(['comment' => $request->comment]);
            $comment->user()->associate($request->user_id);
            $video->comments()->save($comment);


            $data = [
                "admin_id"=> $video->admin->id,
                "title" => user()->name . " add comment to video " . $video->name,
                "user" => ["id" => user()->id,'image' => user()->image],
                "video_id" => $video->id
            ];


            event(new MyEvent($data));



            alert()->success('Success', 'success add comment');


            return redirect()->route('front.playlist.videos.show', [$video->id, '#comments']);
        } catch (\Throwable $th) {

            \Illuminate\Support\Facades\Log::alert($th);
            alert()->error('Error ', 'sorry tray again later!!');

            return redirect()->back();
        }
    }


    //-------------------- update comment--------------------------
    public function update(VideoCommentRequest $request, VideoComment $comment)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        if ((user() && user()->id == $comment->user_id) || admin()) {

            $comment->update($request->validated());
            return response()->json(['comment' => $comment->comment], 200);
        }

        abort(404);
    }

    //----------------------delete comment-------------------------------

    public function destroy(Request $request, VideoComment $comment)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        if ((user() && user()->id == $comment->user_id) || admin()) {

            $comment->delete();
            return response()->json(['success' => true], 200);
        }

        abort(404);
    }
}
