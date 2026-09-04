<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\ClassDay;
use App\Models\ClassTiming;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function class(Request $request)
    {
        $query = ClassModel::with([
            'teacher',
            'day',
            'timing'
        ]);

        if ($request->teacher_id) {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->day) {
            $query->where('class_days', $request->day);
        }

        $classes = $query->get();

        $teachers = Teacher::all();
        $classDays = ClassDay::all();

        return view('backend_theme.class.classes', compact(
            'classes',
            'teachers',
            'classDays'
        ));
    }


  public function class_add()
{
    $courses = ClassModel::select('id', 'class_name')
        ->distinct()
        ->get();

    $teachers = Teacher::all();
    $classDays = ClassDay::all();
    $classTimings = ClassTiming::all();

    return view('backend_theme.class.class-add', compact(
        'courses',
        'teachers',
        'classDays',
        'classTimings'
    ));
}

    public function class_store(Request $request)
    {
        $request->validate([
            'class_name'   => 'required',
            'teacher_id'   => 'required',
            'class_timing' => 'required',
            'class_days'   => 'required',
        ]);

        ClassModel::create([
             'class_code'   => 'CLS-' . strtoupper(uniqid()),
            'class_name'   => $request->class_name,
            'teacher_id'   => $request->teacher_id,
            'class_timing' => $request->class_timing,
            'class_days'   => $request->class_days,
        ]);

        return redirect()
            ->route('class')
            ->with('success', 'Class added successfully.');
    }


   public function class_edit($id)
{
    $class = ClassModel::findOrFail($id);

    $courses = ClassModel::select('id', 'class_name')
        ->distinct()
        ->get();

    $teachers = Teacher::all();
    $classDays = ClassDay::all();
    $classTimings = ClassTiming::all();

    return view('backend_theme.class.class-edit', compact(
        'class',
        'courses',
        'teachers',
        'classDays',
        'classTimings'
    ));
}


    public function class_update(Request $request, $id)
    {
        $request->validate([
            'class_name'   => 'required',
            'teacher_id'   => 'required',
            'class_timing' => 'required',
            'class_days'   => 'required',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'class_name'   => $request->class_name,
            'teacher_id'   => $request->teacher_id,
            'class_timing' => $request->class_timing,
            'class_days'   => $request->class_days,
        ]);

        return redirect()
            ->route('class')
            ->with('success', 'Class updated successfully.');
    }


    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);

        // Class ke students delete
        $class->students()->delete();

        // Class delete
        $class->delete();

        return redirect()
            ->route('class')
            ->with('success', 'Class deleted successfully.');
    }


    public function view($id)
    {
        $class = ClassModel::with([
            'teacher',
            'day',
            'timing'
        ])->findOrFail($id);

        return view(
            'backend_theme.class.class-view',
            compact('class')
        );
    }
}