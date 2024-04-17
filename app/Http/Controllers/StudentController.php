<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index() : View
    {
        return view('student.index', [
            'student' => Student::latest()->paginate(3)
        ]);
    }

    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('student.index')
                ->withSuccess('New student is added successfully.');
    }


}
