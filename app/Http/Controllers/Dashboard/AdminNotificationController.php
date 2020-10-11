<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{

    //--------------------index-------------------------

    public function index()
    {
        $rows = admin()->notifications()->paginate(PAGINATE_COUNT);

        return  view('dashboard.notifications.index', compact('rows'));
    }




    //----------------get latest notify to nvabar ajax---------------------

    public function latest(Request $request)
    {
        if($request->ajax()){

            $notifications = admin()->notifications()->take(10)->get();

            $notifications_html = view('dashboard.notifications._latest_tonav',compact('notifications'))->render();

            return response()->json([ "lists" => $notifications_html],200);
        }
    }

    //-------------------------------------------------


    public function destroy($id)
    {
        try{

         $notify = admin()->notifications()->where('id',$id)->delete();

         return redirect()->back()->with(['success' => "success create"]);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);

        }

    }






}
