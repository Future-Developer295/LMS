<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\ClassTiming;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Assignment::with('classTiming')
            ->withCount('submissions')
            ->latest('id');

        if ($request->filled('status')) {
            $query->where('assignment_status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('assignment_title', 'LIKE', "%{$search}%")
                    ->orWhereHas('classTiming', function ($timingQuery) use ($search) {
                        $timingQuery->where('class_timing', 'LIKE', "%{$search}%");
                    });
            });
        }

        $assignments = $query->get();

        $activeAssignmentsCount = Assignment::where('assignment_status', 'active')->count();
        $totalSubmissionsCount = Assignment::withCount('submissions')->get()->sum('submissions_count');
        $totalAssignmentsCount = Assignment::count();

        return view(
            'backend_theme.assignment.assignments',
            compact('assignments', 'activeAssignmentsCount', 'totalSubmissionsCount', 'totalAssignmentsCount')
        );
    }

    
        public function create()
{
    $classTimings = ClassTiming::all();

    return view(
        'backend_theme.assignment.assignment-add',
        compact('classTimings')
    );
}
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_timing_id' => ['required', 'exists:class_timing,id'],
            'assignment_title' => ['required', 'string', 'max:255'],
            'assignment_instruction' => ['nullable', 'string'],
            'assignment_status' => ['required', 'in:pending,active,completed,closed'],
            'assignment_due_date' => ['required', 'date'],
            'assignment_marks' => ['required', 'integer', 'min:0'],
        ]);

        Assignment::create($validated);

        return redirect()
            ->route('assignment')
            ->with('success', 'Assignment created successfully.');
    }

    public function show(string $id)
    {
        $assignment = Assignment::with('classTiming')
            ->withCount('submissions')
            ->findOrFail($id);

        return view(
            'backend_theme.assignment.assignment-show',
            compact('assignment')
        );
    }

    public function edit(string $id)
    {
        $assignment = Assignment::findOrFail($id);

        return view(
            'backend_theme.assignment.assignment-edit',
            compact('assignment')
        );
    }

    public function update(Request $request, string $id)
    {
        $assignment = Assignment::findOrFail($id);

        $validated = $request->validate([
            'class_timing_id' => ['required', 'exists:class_timing,id'],
            'assignment_title' => ['required', 'string', 'max:255'],
            'assignment_instruction' => ['nullable', 'string'],
            'assignment_status' => ['required', 'in:pending,active,completed,closed'],
            'assignment_due_date' => ['required', 'date'],
            'assignment_marks' => ['required', 'integer', 'min:0'],
        ]);

        $assignment->update($validated);

        return redirect()
            ->route('assignment')
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy(string $id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->delete();

        return redirect()
            ->route('assignment')
            ->with('success', 'Assignment deleted successfully.');
    }
}