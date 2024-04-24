<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('student.index', [
            'student' => Student::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('student.index')
                ->withSuccess('New student is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student) : View
    {
        return view('student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student) : View
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
                ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) : RedirectResponse
    {
        $student->delete();
        return redirect()->route('student.index')
                ->withSuccess('Student is deleted successfully.');
    }

    public function getAssists($id){
        $student = Student::find($id);
        $cant=$student->assists;
        return $cant;
    }
}

// Illuminate\Database\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'assists.student_id' in 'where clause' (Connection: mysql, SQL: select * from `assists` where `assists`.`student_id` = 1 and `assists`.`student_id` is not null) in file C:\laragon\www\Laravel-CRUD-Janusa\vendor\laravel\framework\src\Illuminate\Database\Connection.php on line 801