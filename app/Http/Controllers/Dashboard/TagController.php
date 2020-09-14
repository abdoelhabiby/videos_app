<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\TagRequest;

class TagController extends DashboardController
{
    protected $module_name = 'tags';

    public function __construct(Tag $model)
    {

        parent::__construct($model);
    }


    public function store(TagRequest $request)

    {


        try {

            Tag::create($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }




    public function update(TagRequest $request, Tag $tag)
    {


        try {

            $tag->update($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }

}
