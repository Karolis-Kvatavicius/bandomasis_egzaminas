<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use App\Student;
use App\Grade;
use App\Http\Requests\GradeRequest;

class GradeController extends Controller
{
    public function index() {
       $students = Student::orderBy('surname', 'asc')->get();
       $lectures = Lecture::orderBy('name', 'asc')->get();
       $grades = Grade::all();
       return view('setGrades', ['students' => $students, 
                                 'lectures' => $lectures, 
                                 'grades' => $grades]); 
    }

    public function setGrades(GradeRequest $request) {
            $grade = new Grade;
            $grade->lecture_id = $request->input('lecture');
            $grade->student_id = $request->input('student');
            $grade->grade = $request->input('grade');
            $grade->save();
            return redirect()->route('setGrades');
    }
}
