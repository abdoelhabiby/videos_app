<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CommentReply;
use App\Models\VideoComment;
use Illuminate\Http\Request;
use App\Events\CommentReplyEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CommentReplyRequest;

class CommentReplyController extends Controller
{


    public function store(CommentReplyRequest $request,VideoComment $comment)
    {

         try {

             $reply = CommentReply::make(['reply' => $request->reply]);

             $reply->admin()->associate(admin());

             $comment->replies()->save($reply);


             event(new CommentReplyEvent($comment));

            return redirect()->route('dashboard.videos.edit', [$comment->video->id, '#comments'])->with(['success' => "success add comment"]);
         } catch (\Throwable $th) {
             return $th->getMessage();
             return redirect()->back()->with(['error' => "error ! pleas tray later"]);
         }

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
