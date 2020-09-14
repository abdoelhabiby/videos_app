<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DashboardController
{

    protected $module_name = 'categories';

    public function  __construct(Category $model)
    {
        parent::__construct($model);
    }



    public function store(CategoryRequest $request)

    {

        try{

           Category::create($request->validated());

          return redirect()->route('dashboard.'. $this->module_name .'.index')->with(['success' => "success create"]);

        } catch (\Throwable $th) {
            return redirect()->route('dashboard.'. $this->module_name .'.index')->with(['error' => "somw errors happend pleas try again later"]);

        }

    }




    public function update(CategoryRequest $request,Category $category)
    {
        try {

            $category->update($request->validated());

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }

    }




}// end of class
