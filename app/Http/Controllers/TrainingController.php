<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Session;

class TrainingController extends Controller
{
    private $trainings, $training, $categories;

    public function index()
    {
        $this->categories = Category::all();
        return view('teacher.training.index', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'starting_date' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        Training::newTraining($request);
        return back()->with('message', 'Training Module Created Successfully');
    }

    public function manage()
    {
        $this->trainings = Training::where('teacher_id', Session::get('teacher_id'))->get();
        return view('teacher.training.manage', ['trainings' => $this->trainings]);
    }

    public function detail($id)
    {
        $this->training = Training::find($id);
        return view('teacher.training.detail', ['training' => $this->training]);
    }

    public function edit($id)
    {
        $this->categories = Category::all();
        $this->training = Training::find($id);
        return view('teacher.training.edit', ['training' => $this->training, 'categories' => $this->categories]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }
        Training::updateTraining($request, $id);
        return redirect('/training/manage')->with('message', 'Training Module Updated Successfully');
    }

    public function delete($id)
    {
        Training::deleteTraining($id);
        return back()->with('message', 'Training Module Deleted Successfully');
    }
}
