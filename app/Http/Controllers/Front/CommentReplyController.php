<?php

namespace App\Http\Controllers\Front;

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


            alert()->success('Success', 'success add reply');


            return redirect()->route('front.playlist.videos.show', [$comment->video->id, '#comments']);
         } catch (\Throwable $th) {

            alert()->error('Error', 'somw errors happend pleas try again later');

             return redirect()->back();
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
