<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class EnrollController extends Controller
{
    private $student;

    public function newEnroll(Request $request, $id)
    {
        if (!Session::has('student_id'))
        {
            $this->validate($request, [
                'name' => 'required|regex:/(^([a-zA-Z-. ]+)(\d+)?$)/u|min:2|max:20',
                'email' => 'required|email:rfc,dnse',
                'mobile' => 'required|regex:/^(?:\+?88)?01[13-9]\d{8}$/',
            ]);

            $this->student = Student::newStudent($request);

            Session::put('student_id', $this->student->id);
            Session::put('student_name', $this->student->name);
        }

        Enroll::newEnroll($id, Session::get('student_id'));

        return redirect('/complete-enroll')->with('message', 'Your Enroll is submitted successfully. Please wait we will contact you soon.');
    }

    public function completeEnroll()
    {
        return view('website.training.complete-enroll');
    }
}
