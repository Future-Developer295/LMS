<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Assignment;
use App\Models\AssignmentHasSubmit;
use Illuminate\Database\Seeder;

class AssignmentHasSubmitSeeder extends Seeder
{
    public function run(): void
    {
        $hamza = Student::where(
            'email_address',
            'hamza@lms.com'
        )->firstOrFail();

        $sara = Student::where(
            'email_address',
            'sara@lms.com'
        )->firstOrFail();

        $ahmed = Student::where(
            'email_address',
            'ahmed@lms.com'
        )->firstOrFail();

        $bilal = Student::where(
            'email_address',
            'bilal@lms.com'
        )->firstOrFail();

        $webAssignment = Assignment::where(
            'assignment_title',
            'HTML & CSS Landing Page'
        )->firstOrFail();

        $graphicAssignment = Assignment::where(
            'assignment_title',
            'Graphic Design Poster'
        )->firstOrFail();

        $laravelAssignment = Assignment::where(
            'assignment_title',
            'Laravel CRUD Application'
        )->firstOrFail();

        AssignmentHasSubmit::create([
            'assignment_id' => $webAssignment->id,
            'student_id' => $hamza->id,
            'assignment_file' => 'assignments/hamza-landing-page.zip',
            'assignment_remark' => 'Assignment submitted successfully.',
            'assignment_remarks_comments' => 'Good design and responsive layout.',
        ]);

        AssignmentHasSubmit::create([
            'assignment_id' => $webAssignment->id,
            'student_id' => $sara->id,
            'assignment_file' => 'assignments/sara-landing-page.zip',
            'assignment_remark' => 'Assignment submitted successfully.',
            'assignment_remarks_comments' => 'Good work.',
        ]);

        AssignmentHasSubmit::create([
            'assignment_id' => $graphicAssignment->id,
            'student_id' => $ahmed->id,
            'assignment_file' => 'assignments/ahmed-poster.zip',
            'assignment_remark' => 'Graphic design assignment submitted.',
            'assignment_remarks_comments' => 'Creative design and good composition.',
        ]);

        AssignmentHasSubmit::create([
            'assignment_id' => $laravelAssignment->id,
            'student_id' => $bilal->id,
            'assignment_file' => 'assignments/bilal-crud.zip',
            'assignment_remark' => 'Laravel CRUD assignment submitted.',
            'assignment_remarks_comments' => 'CRUD functionality is working properly.',
        ]);
    }
}