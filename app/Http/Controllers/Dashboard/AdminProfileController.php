<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\AdminProfileRequest;

class AdminProfileController extends Controller
{

    public function index()
    {
        return view('dashboard.admin_profile.index');
    }


    public function update(AdminProfileRequest $request)
    {
        try {

            $validated = $request->validated();

            if ($request->password && $request->password != '' && !empty(trim($request->password))) {

                $validated["password"] = Hash::make($request->password);
            } else {

                unset($validated['password']);
            }



           Admin::where('id', admin()->id)->update($validated);


            return redirect()->back()->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }
}
