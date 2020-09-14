<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\SkillRequest;

class SkillController extends DashboardController
{

    protected $module_name = 'skills';

    public function __construct(Skill $model)
    {

        parent::__construct($model);
    }


    public function store(SkillRequest $request)

    {


        try {

            Skill::create($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }




    public function update(SkillRequest $request, Skill $skill)
    {



        try {

            $skill->update($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



}
