<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{

    protected $model;

    public function  __construct(Model $model)
    {
        $this->model = $model;
    }



    public function index()
    {

        $model = $this->model;

        $model = $this->filter($model);

        $rows = $model->orderBy('id', 'desc')->paginate(PAGINATE_COUNT);

        return view('dashboard.'. $this->getClassNameModel() .'.index', compact('rows'));
    }


    protected function filter($model)

    {
       return $model;
    }


    public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        return view('dashboard.' . $this->getClassNameModel() . '.edit', compact('row'));


    }





    public function create()
    {
        return view('dashboard.' . $this->getClassNameModel() . '.create');
    }




    public function destroy($id)
    {

        try {

            $row = $this->model->findOrFail($id);


            $row->delete();

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['success' => "success delete"]);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::alert($th);

            return redirect()->route('dashboard.' . $this->getClassNameModel() . '.index')->with(['error' => "somw errors happend pleas try again later"]);
        }
    }







    public function getClassNameModel()
    {

        $base_class_name = strtolower(class_basename($this->model));
        $base_class_name =  Str::plural($base_class_name);

        return $base_class_name;
    }


}
