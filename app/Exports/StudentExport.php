<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Lesson;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView
{
    public function view(): View
    {
        $students = Student::all();
        $lessons = Lesson::first();

        $studentsData = $students->map(function ($student) use ($lessons) {
            $assistsCount = $student->assists()->count();
            $condition = $this->calculateCondition($assistsCount, $lessons);
            return [
                'alumn_DNI' => $student->alumn_DNI,
                'apellido' => $student->apellido,
                'nombre' => $student->nombre,
                'año'=>$student->año,
                'assistsCount' => $assistsCount,
                'condition' => $condition,
            ];
        });

        return view('Student.export', [
            'studentsData' => $studentsData,
        ]);
    }

    private function calculateCondition($assistsCount, $lessons)
    {
        if (!$lessons) {
            return 'No classes registered';
        }

        $lessonsCount = $lessons->lessons;
        $regular = $lessons->regular;
        $promocion = $lessons->promocion;

        if ($lessonsCount == 0) {
            return 'No classes registered';
        }

        $porcentaje = ($assistsCount / $lessonsCount) * 100;

        if ($porcentaje < $regular) {
            return 'LIBRE';
        } elseif ($porcentaje >= $regular && $porcentaje < $promocion) {
            return 'REGULAR';
        } else {
            return 'PROMOCIONADO';
        }
    }
}
