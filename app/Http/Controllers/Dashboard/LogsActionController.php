<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\DataTables\LogsActionsDataTable;

class LogsActionController extends Controller
{

    //--------------------------start method index ----------------------------
    public function index(LogsActionsDataTable $datatable)
    {
        return $datatable->render('dashboard.logs.actions');
    }
    //--------------------------end method index ----------------------------

    //--------------------------start method show --------------------------
    public function show($id)
    {
         $activity = Activity::findOrFail( $id);

         /*
          ** propertise column has :
          *** attributes form record create or delete
          ***
          *** attributes and old for update column
          */

        $properties = json_decode($activity->properties, true);


         return view('dashboard.logs.show',compact('activity', 'properties'));

    }
    //--------------------------end method show ----------------------------

    //--------------------------start method destroy ----------------------------

    public function destroy($id)
    {
        if (request()->ajax()) {
            $activity = Activity::where('id', $id)->first();

            if (!$activity) {
                return response()->json('not found', 404);
            }

            $activity->delete();

            return response()->json(['success' => 'deleted'], 200);
        }

        return response()->json('not found', 404);
    }
    //--------------------------end method destroy ----------------------------




}
