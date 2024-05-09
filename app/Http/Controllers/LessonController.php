<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreLessonRequest;
use App\Models\Lesson;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    
public function store(StoreLessonRequest $request) : RedirectResponse {
    if (Lesson::count() > 0) {
        Lesson::truncate(); 
    }
    Lesson::create($request->all());
    return redirect()->back()
    ->withSuccess('Lesson added successfully');
}

    public function create(Lesson $lesson):View
    {
        $lesson = Lesson::first();
        return view('lessons.create', [
            'lesson'=> $lesson
        ]);
    }

}