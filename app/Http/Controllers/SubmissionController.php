<?php

namespace App\Http\Controllers;

use App\Models\AssignmentHasSubmit;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = AssignmentHasSubmit::with([
            'assignment',
            'student'
        ])
        ->latest('id')
        ->get();

        return view(
            'backend_theme.submission.submissions',
            compact('submissions')
        );
    }

    public function show(string $id)
    {
        $submission = AssignmentHasSubmit::with([
            'assignment',
            'student'
        ])->findOrFail($id);

        return view(
            'backend_theme.submission.submission-show',
            compact('submission')
        );
    }

    public function grade(string $id)
    {
        $submission = AssignmentHasSubmit::with([
            'assignment',
            'student'
        ])->findOrFail($id);

        return view(
            'backend_theme.submission.submission-grade',
            compact('submission')
        );
    }

public function saveGrade(Request $request, string $id)
{
    $submission = AssignmentHasSubmit::findOrFail($id);

    $validated = $request->validate([
        'grade' => 'required|numeric|min:0|max:100',
        'assignment_remark' => 'nullable|string',
        'assignment_remarks_comments' => 'nullable|string',
    ]);

    $submission->update($validated);

    return redirect()
        ->route('submission')
        ->with('success', 'Grade saved successfully.');
}
public function publishGrades()
{
    AssignmentHasSubmit::whereNotNull('grade')
        ->update([
            'published' => true,
        ]);

    return redirect()
        ->route('submission')
        ->with('success', 'Grades published successfully.');
}

public function exportCsv()
{
    $submissions = AssignmentHasSubmit::with([
        'assignment',
        'student'
    ])->get();

    $filename = 'submissions.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($submissions) {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'Student Name',
            'Assignment',
            'Submission Date',
            'Status',
            'Grade',
            'Remarks',
        ]);

        foreach ($submissions as $submission) {

            $studentName =
                ($submission->student->full_name ?? 'N/A') . ' ' .
                ($submission->student->last_name ?? '');

            fputcsv($file, [
                trim($studentName),
                $submission->assignment->assignment_title ?? 'N/A',
                $submission->created_at
                    ? $submission->created_at->format('d M Y - h:i A')
                    : 'N/A',
                $submission->assignment_file
                    ? 'Submitted'
                    : 'Not Submitted',
                !is_null($submission->grade)
                    ? $submission->grade
                    : '',
                $submission->assignment_remark ?? '',
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}