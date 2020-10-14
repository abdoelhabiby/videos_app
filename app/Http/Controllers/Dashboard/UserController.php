<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Controllers\Dashboard\DashboardController;

class UserController extends DashboardController
{

    public function __construct()
    {
        parent::__construct(new User);
    }


    /*
      * this method filter override the main method in class DashboardController

      * to get data by filter
      * hala madrid

    */

    protected function filter($model)

    {
        if(request()->has('search') && request()->search != ''){
            return $model->where('name','like','%' . request()->search .'%');
        }

        return $model;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {



        try {

            $validated = $request->validated();

            $validated['password'] = Hash::make($validated['password']);

            User::create($validated);

            return redirect()->route('dashboard.users.index')->with(['success' => "success create"]);

        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.users.index')->with(['error' => "somw errors happend pleas try again later"]);

        }

    }







    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {







        try {

            $validated = $request->validated();

            if ($request->password && $request->password != '' && !empty(trim($request->password))) {

                $validated["password"] = bcrypt($request->password);
            } else {

                unset($validated['password']);
            }



            $user->update($validated);


            return redirect()->route('dashboard.users.index')->with(['success' => "success update"]);

        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.users.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }






}
