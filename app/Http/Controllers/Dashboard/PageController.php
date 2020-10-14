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

            $validated = $request->validated();

            if ($request->has('image') && $request->image != null) {
                $image = $request->file('image');
                $path = imageUpload($image, 'pages');
                $validated['image'] = $path;
            }




            Page::create($validated);

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success create"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }




    public function update(PageRequest $request, Page $page)
    {
        try {


            $validated = $request->validated();

            if ($request->has('image') && $request->image != null) {
                $image = $request->file('image');
                $path = imageUpload($image, 'pages');
                $validated['image'] = $path;

                if($page->image != null){
                    deleteFile($page->image);
                }

            }


            $page->update($validated);

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.' . $this->module_name . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }


    public function destroy($id)
    {

        try {

            $row = $this->model->findOrFail($id);

            if ($row->image != null) {
                deleteFile($row->image);
            }

            $row->delete();

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['success' => "success delete"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }


}
