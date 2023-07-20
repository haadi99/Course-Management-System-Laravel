<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    private $student;

    public function login(Request $request)
    {
        $this->student = Student::where('email', $request->email)->first();

        if ($this->student)
        {
            if (password_verify($request->password, $this->student->password))
            {
                Session::put('student_id', $this->student->id);
                Session::put('student_name', $this->student->name);

                return redirect('/my-dashboard');
            }

            else
            {
                return back()->with('message', 'Sorry......password is invalid.');
            }
        }

        else
        {
            return back()->with('message', 'Sorry......email address is invalid.');
        }
    }

    public function register(Request $request)
    {
        try {
            $this->student = Student::newStudent($request);
            if (isset($this->student))
            {
                Session::put('student_id', $this->student->id);
                Session::put('student_name', $this->student->name);
                return redirect('/my-dashboard')->with('message', 'Account Created Successfully');
            }
        }
        catch (\Exception $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function dashboard()
    {
        return view('website.student.dashboard');
    }

    public function profile()
    {
        return view('website.student.profile');
    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');

        return redirect('/');
    }
}
