<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Assist;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreAssistRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('student.index', [
            'students' => Student::latest()->paginate(10)
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
        $date = Carbon::now();
        $añoNaciemiento = Carbon::parse($request->fecha_nac);
        $años=$date->diffInYears($añoNaciemiento);
        if($años>=17){
            Student::create($request->all());
            return redirect()->route('student.index')
                ->withSuccess('New student is added successfully.');
        }
        else
            return redirect()->route('student.create')->withErrors('The student must be over 16 years old');
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
        $cant = $student->assists()->count();
        $assists = $student->assists; 
        $clases=Lesson::first();
        if($clases){
            $lessons=$clases->lessons;
            $regular=$clases->regular;
            $promocion=$clases->promocion;
            $condicion="";
            $asist = Assist::where('id_student', $id)->count();
            $cant = ($asist / $lessons) * 100;
            if($cant<$regular){
                $condicion="LIBRE";
            }elseif ($cant>$regular && $cant<$promocion) {
                $condicion="REGULAR";
            }else {
                $condicion="PROMOCIONADO";
            }
        }else{
            $condicion="no hay clases registradas";
        }
        return view('student.assists', [
            'student' => $student,
            'cant' => $cant,
            'assists' => $assists,
            'condicion'=>$condicion
        ]);
    }


    public function viewSearch() : View
    {
        return view('student.search');
    }


public function addAssists($id){
        $student = Student::find($id);
        $exist = Assist::where('alumn_id',$student->alumn_DNI)
            ->whereDate('created_at',Carbon::today())
            ->exists();
            if($exist){
                return redirect()->route('student.index')
            ->withErrors('An attendance has already been recorded for today');
            }
        $assist= new Assist();
        $assist->id_student=$student->id;
        $assist->alumn_id=$student->alumn_DNI;
        $assist->save();
        return redirect()->route('student.index')
        ->withSuccess('Assist added with successfully.');
    }


/*public function addAssists(Request $request){
    $student = Student::find($request->alumn_DNI);
    if($student){
        $assist= new Assist();
        $assist->id_student=$student->id;
        $assist->alumn_id=$student->alumn_DNI;
        $assist->save();
    }
    return view('student.assistsView');
}

    public function findStudent(Request $request)
    {
        $student=Student::find($request->alumn_DNI);
        return redirect()->route('student.index');
    }

*/

    public function showSearch(Request $request)
        
    {
        
        $student=Student::where('alumn_DNI', '=',$request->alumn_DNI)->first();
        if ($student){
            return view('student.showAddAssist', [
                'student' => $student
        
            ]);
        }else 
        return redirect()->route('student.viewSearch')
                ->withErrors("Student not found.");
    }


    public function addAssistsView() : View
    {
        return view('student.assistsView');
    }
}

// Illuminate\Database\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'assists.student_id' in 'where clause' (Connection: mysql, SQL: select * from `assists` where `assists`.`student_id` = 1 and `assists`.`student_id` is not null) in file C:\laragon\www\Laravel-CRUD-Janusa\vendor\laravel\framework\src\Illuminate\Database\Connection.php on line 801


/***
 * Cuando se termine de hacer esto en el Readme
 * 
 * una descripcion del trabajo.
 * 
 * desrcribir paso a paso desde la clonacion hasta el deploy.
 * 
 */