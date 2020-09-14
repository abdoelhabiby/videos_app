<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\PageRequest;

class PageController extends DashboardController
{
    protected $module_name = 'pages';

    public function  __construct(Page $model)
    {
        parent::__construct($model);
    }



    public function store(PageRequest $request)

    {


        try {





             Page::create($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }




    public function update(PageRequest $request, Page $page)
    {
        try {

          ;


            $page->update($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



}
