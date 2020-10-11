<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserNotifications extends Controller
{
    //--------------------index-------------------------

    public function index()
    {
        $rows = user()->notifications()->paginate(10);

        return  view('front.notifications.index', compact('rows'));
    }




    //----------------get latest notify to nvabar ajax---------------------

    public function latest(Request $request)
    {
        if ($request->ajax()) {

            $notifications = user()->notifications()->take(3)->get();

            $notifications_html = view('front.notifications._latest_tonav', compact('notifications'))->render();

            return response()->json(["lists" => $notifications_html], 200);
        }
    }

    //-------------------------------------------------


    public function destroy($id)
    {
        try {

            $notify = user()->notifications()->where('id', $id)->delete();

            alert()->success('Success', 'success delete');


            return redirect()->back();
        } catch (\Throwable $th) {

            alert()->success('Error', 'somw errors happend pleas try again later');

            return redirect()->back();
        }

    }
}
