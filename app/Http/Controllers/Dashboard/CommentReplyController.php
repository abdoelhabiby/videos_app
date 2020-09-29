<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CommentReplyRequest;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{


    public function store(VideoCommentRequest $request)
    {

        // try {


        //     $video = Video::findOrFail($request->video_id);
        //     $comment = VideoComment::make(['comment' => $request->comment]);
        //     $comment->user()->associate($request->user_id);
        //     $video->comments()->save($comment);


        //     return redirect()->route('front.playlist.videos.show', [$video->id, '#comments'])->with(['success' => "success add comment"]);
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with(['error' => "error ! pleas tray later"]);
        // }

    }


    //-------------------- update comment--------------------------
    public function update(CommentReplyRequest $request, CommentReply $reply)
    {



        try {

            if (!$request->ajax()) {
                abort(404);
            }

            $reply->update([
                "reply" => $request->reply,
                'admin_id' => admin()->id
            ]);

            return response()->json(['reply' => $reply->reply],200);

        } catch (\Throwable $th) {

            abort(404);
        }

    }

    //----------------------delete comment-------------------------------

    public function destroy(Request $request, CommentReply $reply)
    {



        try {

            if (!$request->ajax()) {
                abort(404);
            }

           $reply->delete();

            return response()->json(['success' => 'success delete'], 200);
        } catch (\Throwable $th) {

            abort(404);
        }

    }

}
