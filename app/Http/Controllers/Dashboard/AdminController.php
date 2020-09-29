<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\AdminRequest;

class AdminController extends DashboardController
{

    public function __construct()
    {
        parent::__construct(new Admin);

        $this->middleware("super_admin");
    }


    /*
      * this method filter override the main method in class DashboardController

      * to get data by filter
      * hala madrid

    */

    protected function filter($model)

    {
        if (request()->has('search') && request()->search != '') {
            return $model->where('name', 'like', '%' . request()->search . '%');
        }

        return $model->where('group','admin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {



        try {

            $validated = $request->validated();

            $validated['password'] = Hash::make($validated['password']);

            Admin::create($validated);

            return redirect()->route('dashboard.admins.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.admins.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $Admin)
    {


        try {

            $validated = $request->validated();

            if ($request->password && $request->password != '' && !empty(trim($request->password))) {

                $validated["password"] = Hash::make($request->password);
            } else {

                unset($validated['password']);
            }



            $Admin->update($validated);


            return redirect()->route('dashboard.admins.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.admins.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }
}
