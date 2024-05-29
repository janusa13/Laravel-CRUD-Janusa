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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentExport;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        if($request!=null){
            return view('student.index', [
                'students' => Student::latest()->paginate(10),
            ]);
        }else if($request->año=="primero"){
            $student = Student::where('año',$request->año);
            return view ('student.index',[
                'student'=>$student
            ])
        }
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
        $existingStudent= Student::where('alumn_DNI',$request->alumn_DNI)->first();
        if ($existingStudent){
            return redirect()->route('student.create')->withErrors('A student with this DNI alredy exists.');
        }
        if($años>=17){
            Student::create($request->all());
            return redirect()->route('student.index')
                ->withSuccess('New student is added successfully.');
        }
        else
            return redirect()->route('student.create')->withErrors('The student must be over 16 years old.');
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
        $date = Carbon::now();
        $añoNaciemiento = Carbon::parse($request->fecha_nac);
        $años=$date->diffInYears($añoNaciemiento);
        if($años>=17){
            $student->update($request->all());
            return redirect()->back()
                ->withSuccess('Student is updated successfully.');
        }else
            return redirect()->route('student.index')->withErrors('The student must be over 16 years old.');
        
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
            if($lessons==0){
                $condicion="no hay clases registradas";
                $asist = Assist::where('id_student', $id)->count();
                return view('student.assists', [
                'student' => $student,
                'cant' => $cant,
                'asist' =>$asist,
                'assists' => $assists,
                'condicion'=>$condicion
            ]);
            }
            $regular=$clases->regular;
            $promocion=$clases->promocion;
            $condicion="";
            $asist = Assist::where('id_student', $id)->count();
            $cant = ($asist / $lessons) * 100;
            if($cant<$regular){
                $condicion="LIBRE";
            }elseif ($cant>=$regular && $cant<$promocion) {
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
            'asist' =>$asist,
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


    public function exportDataInExcel(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "student-".date('d-m-Y').".".$fileExt;
        return Excel::download(new StudentExport, $filename, $exportFormat);
    }
}




/***
 * Cuando se termine de hacer esto en el Readme
 * 
 * una descripcion del trabajo.
 * 
 * desrcribir paso a paso desde la clonacion hasta el deploy.
 * 
 * 
 * PARA LA EXPORTACION A EXCEL DNI, APELLIDO, NOMBRE, CANTIDAD DE ASISTENCIA Y CONDICION.
 * https://www.fundaofwebit.com/post/how-to-export-data-to-excel-file-with-different-format-in-laravel-10
 * 
 */