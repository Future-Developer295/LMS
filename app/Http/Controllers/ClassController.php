<?php

namespace App\Http\Controllers;
use App\Models\ClassDay;
use App\Models\ClassModel;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
  public function class(Request $request)
{
    $query = ClassModel::query();

    if ($request->teacher_id) {
        $query->where('teacher_id', $request->teacher_id);
    }

    if ($request->day) {
        $query->where('class_days', $request->day);
    }

    $classes = $query->get();

    $teachers = Teacher::all();
    $classDays = DB::table('class_days')->get();

    foreach ($classes as $class) {

        $teacher = Teacher::find($class->teacher_id);
        $day = DB::table('class_days')->find($class->class_days);
        $timing = DB::table('class_timing')->find($class->class_timing);

        $class->teacher_name = $teacher->full_name ?? '—';
        $class->day_name = $day->class_days ?? '—';
        $class->timing_name = $timing->class_timing ?? '—';
    }

    return view('backend_theme.class.classes', compact(
        'classes',
        'teachers',
        'classDays'
    ));
}

  public function class_add()
{
    $courses = ClassModel::select('id', 'class_name')->get();

    $teachers = Teacher::all();
    $classDays = DB::table('class_days')->get();
    $classTimings = DB::table('class_timing')->get();

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
            'class_name' => 'required',
            'teacher_id' => 'required',
            'class_timing' => 'required',
            'class_days' => 'required',
        ]);

        ClassModel::create([
            'class_name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'class_timing' => $request->class_timing,
            'class_days' => $request->class_days,
        ]);

        return redirect()->route('class')
            ->with('success', 'Class added successfully.');
    }


 public function class_edit($id)
{
    $class = ClassModel::findOrFail($id);

    $courses = ClassModel::select('id', 'class_name')->get();
    $teachers = Teacher::all();
    $classDays = DB::table('class_days')->get();
    $classTimings = DB::table('class_timing')->get();

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
            'class_name' => 'required',
            'teacher_id' => 'required',
            'class_timing' => 'required',
            'class_days' => 'required',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'class_name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'class_timing' => $request->class_timing,
            'class_days' => $request->class_days,
        ]);

        return redirect()->route('class')
            ->with('success', 'Class updated successfully.');
    }


public function destroy($id)
{
    // Pehle class ke students delete karo
    \DB::table('student')->where('class_id', $id)->delete();

    // Phir class delete karo
    \DB::table('class')->where('id', $id)->delete();

    return redirect()->route('class')
        ->with('success', 'Class deleted successfully.');
}

public function view($id)
{
    $class = ClassModel::findOrFail($id);

    $teacher = Teacher::find($class->teacher_id);
    $day = DB::table('class_days')->find($class->class_days);
    $timing = DB::table('class_timing')->find($class->class_timing);

    $class->teacher_name = $teacher->full_name ?? '—';
    $class->day_name = $day->class_days ?? '—';
    $class->timing_name = $timing->class_timing ?? '—';

    return view('backend_theme.class.class-view', compact('class'));
}
}