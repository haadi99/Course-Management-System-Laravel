<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teachers, $teacher;

    public function index()
    {
        return view('admin.teacher.index');
    }

//    public function manage()
//    {
//        return view('admin.teacher.manage');
//    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'mobile' => 'required',
            'image' => 'required',
        ]);
        Teacher::newTeacher($request);
        return back()->with('message', 'Teacher Info Created Successfully');
    }

    public function manage()
    {
        $this->teachers = Teacher::all();
        return view('admin.teacher.manage', ['teachers' => $this->teachers]);
    }

    public function edit($id)
    {
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit', ['teacher' => $this->teacher]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }

        Teacher::updateTeacher($request, $id);
        return redirect('/teacher/manage')->with('message', 'Teacher Info Updated Successfully');
    }

    public function delete($id)
    {
        Teacher::deleteTeacher($id);
//        return back()->with('message', 'Teacher Info Deleted Successfully');
        return redirect('/teacher/manage')->with('message', 'Teacher Info Deleted Successfully');
    }
}
