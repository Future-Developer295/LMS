<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\ClassTiming;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $timing1 = ClassTiming::where('class_timing', '08:00 AM - 10:00 AM')->firstOrFail();
        $timing2 = ClassTiming::where('class_timing', '10:00 AM - 12:00 PM')->firstOrFail();
        $timing3 = ClassTiming::where('class_timing', '12:00 PM - 02:00 PM')->firstOrFail();
        $timing4 = ClassTiming::where('class_timing', '02:00 PM - 04:00 PM')->firstOrFail();

        $classes = [
            'Web Development'     => ClassModel::where('class_name', 'Web Development')->firstOrFail(),
            'Graphic Designing'   => ClassModel::where('class_name', 'Graphic Designing')->firstOrFail(),
            'Laravel Development' => ClassModel::where('class_name', 'Laravel Development')->firstOrFail(),
            'Frontend Development'=> ClassModel::where('class_name', 'Frontend Development')->firstOrFail(),
            'Backend Development' => ClassModel::where('class_name', 'Backend Development')->firstOrFail(),
            'UI/UX Designing'     => ClassModel::where('class_name', 'UI/UX Designing')->firstOrFail(),
            'PHP & MySQL'         => ClassModel::where('class_name', 'PHP & MySQL')->firstOrFail(),
        ];

        $topic = function (string $className, string $topicName) use ($classes) {
            return Topic::where('class_id', $classes[$className]->id)
                ->where('topic_name', $topicName)
                ->firstOrFail();
        };

        // -------------------------------------------------------------
        // Web Development
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('Web Development', 'PHP')->id,
            'assignment_title' => 'PHP Image CRUD with Foreign Key (Category & Product Management)',
            'assignment_instruction' =>
                '<p>Create a table with the following fields:</p>' .
                '<ul><li>ID (Primary Key)</li><li>Category_Name</li></ul>' .
                '<p>Create a table with the following fields:</p>' .
                '<ul><li>ID (Primary Key)</li><li>CategoryID_FK (Foreign Key)</li>' .
                '<li>Product_Name</li><li>Product_Code</li><li>Product_Brand</li></ul>',
            'resource_label' => 'Dashboard Theme Downloaded from',
            'resource_link' => 'https://themewagon.com',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-28',
            'assignment_due_date' => '2026-06-30',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Web Development', 'AdvanceJS')->id,
            'assignment_title' => 'HTML & CSS Landing Page',
            'assignment_instruction' =>
                '<p>Build a responsive landing page using semantic HTML and CSS, including a hero section, features grid, and footer.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-18',
            'assignment_due_date' => '2026-05-26',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Web Development', 'AdvanceJS')->id,
            'assignment_title' => 'Implement (AddToCart) functionality in Ecommerce Site',
            'assignment_instruction' =>
                '<p>Implement AddToCart functionality using session/cart logic for the Ecommerce site.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-11',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Web Development', 'AdvanceJS')->id,
            'assignment_title' => 'JavaScript Problem Solving Question',
            'assignment_instruction' =>
                '<p>Solve the assigned JavaScript logic-building problem set.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-15',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'topic_id' => $topic('Web Development', 'XML & Json')->id,
            'assignment_title' => 'Create a JSON Format for a University Management System and Insert Data',
            'assignment_instruction' =>
                '<p>Create JSON structures representing University entities and insert sample data accordingly.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-02-14',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'topic_id' => $topic('Web Development', 'Bootstrap')->id,
            'assignment_title' => 'Bootstrap Grid Layout Practice',
            'assignment_instruction' =>
                '<p>Practice building responsive layouts using the Bootstrap grid system.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-01-20',
            'assignment_marks' => 10,
        ]);

        // -------------------------------------------------------------
        // Graphic Designing
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Graphic Designing', 'Bootstrap')->id,
            'assignment_title' => 'Graphic Design Poster',
            'assignment_instruction' =>
                '<p>Design an A3 promotional poster for a fictional event, applying layout, color theory, and typography principles.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-10',
            'assignment_due_date' => '2026-06-18',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Graphic Designing', 'PHP')->id,
            'assignment_title' => 'Logo & Brand Identity Design',
            'assignment_instruction' =>
                '<p>Design a logo, colour palette, and simple brand guideline sheet for a fictional startup of your choice.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-02',
            'assignment_due_date' => '2026-05-12',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Graphic Designing', 'AdvanceJS')->id,
            'assignment_title' => 'Social Media Post Templates',
            'assignment_instruction' =>
                '<p>Create 3 Instagram post templates (1080x1080) for a bakery brand, keeping consistent typography and colours.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-04-01',
            'assignment_due_date' => '2026-04-10',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('Graphic Designing', 'XML & Json')->id,
            'assignment_title' => 'Photo Manipulation Exercise',
            'assignment_instruction' =>
                '<p>Combine at least 3 stock images into a single composite scene using layer masks and colour grading.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-05',
            'assignment_marks' => 10,
        ]);

        // -------------------------------------------------------------
        // Laravel Development
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'topic_id' => $topic('Laravel Development', 'PHP')->id,
            'assignment_title' => 'Laravel CRUD Application',
            'assignment_instruction' =>
                '<p>Build a full CRUD application in Laravel for managing a resource of your choice, including validation and migrations.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-07-01',
            'assignment_due_date' => '2026-07-10',
            'assignment_marks' => 25,
        ]);

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'topic_id' => $topic('Laravel Development', 'AdvanceJS')->id,
            'assignment_title' => 'Eloquent Relationships Practice',
            'assignment_instruction' =>
                '<p>Model one-to-many and many-to-many relationships (e.g. Authors/Books/Tags) using Eloquent and demonstrate eager loading.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-05',
            'assignment_due_date' => '2026-06-14',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'topic_id' => $topic('Laravel Development', 'XML & Json')->id,
            'assignment_title' => 'Build a REST API with Laravel',
            'assignment_instruction' =>
                '<p>Expose CRUD endpoints for a resource using Laravel API resources and return JSON responses with proper status codes.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-05-20',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing3->id,
            'topic_id' => $topic('Laravel Development', 'Bootstrap')->id,
            'assignment_title' => 'Authentication & Middleware Task',
            'assignment_instruction' =>
                '<p>Implement custom middleware to restrict a route to authenticated users only, and add role-based access checks.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-22',
            'assignment_marks' => 15,
        ]);

        // -------------------------------------------------------------
        // Frontend Development
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'topic_id' => $topic('Frontend Development', 'PHP')->id,
            'assignment_title' => 'Responsive Portfolio Page',
            'assignment_instruction' =>
                '<p>Build a single-page personal portfolio site using HTML, CSS, and Flexbox/Grid that adapts to mobile, tablet, and desktop.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-15',
            'assignment_due_date' => '2026-06-25',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'topic_id' => $topic('Frontend Development', 'AdvanceJS')->id,
            'assignment_title' => 'Interactive To-Do List with Vanilla JS',
            'assignment_instruction' =>
                '<p>Create a to-do list app with add, complete, and delete functionality, persisting state in localStorage.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-10',
            'assignment_due_date' => '2026-05-20',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'topic_id' => $topic('Frontend Development', 'XML & Json')->id,
            'assignment_title' => 'Consume a Public API and Render Data',
            'assignment_instruction' =>
                '<p>Fetch data from a public JSON API and render it dynamically into a searchable, filterable card grid.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-18',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing4->id,
            'topic_id' => $topic('Frontend Development', 'Bootstrap')->id,
            'assignment_title' => 'Bootstrap Multi-Page Website',
            'assignment_instruction' =>
                '<p>Build a 3-page marketing site (Home, About, Contact) using the Bootstrap component library and a shared navbar/footer.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-28',
            'assignment_marks' => 15,
        ]);

        // -------------------------------------------------------------
        // Backend Development
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('Backend Development', 'PHP')->id,
            'assignment_title' => 'Design a Normalised Database Schema',
            'assignment_instruction' =>
                '<p>Design a 3NF-normalised schema for a library management system, including an ER diagram and SQL create statements.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-20',
            'assignment_due_date' => '2026-06-30',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('Backend Development', 'AdvanceJS')->id,
            'assignment_title' => 'Build a CRUD REST API (Node/Express or Laravel)',
            'assignment_instruction' =>
                '<p>Implement full CRUD endpoints for a resource with input validation and appropriate HTTP status codes.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-15',
            'assignment_due_date' => '2026-05-25',
            'assignment_marks' => 25,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('Backend Development', 'XML & Json')->id,
            'assignment_title' => 'JWT Authentication Implementation',
            'assignment_instruction' =>
                '<p>Add token-based authentication to an existing API, including login, protected routes, and token refresh.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-14',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('Backend Development', 'Bootstrap')->id,
            'assignment_title' => 'Database Indexing & Query Optimization',
            'assignment_instruction' =>
                '<p>Given a slow query on a large table, add appropriate indexes and document the before/after query performance.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-10',
            'assignment_marks' => 15,
        ]);

        // -------------------------------------------------------------
        // UI/UX Designing
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('UI/UX Designing', 'PHP')->id,
            'assignment_title' => 'User Persona & Journey Map',
            'assignment_instruction' =>
                '<p>Create a user persona and a journey map for a mobile grocery-delivery app, identifying key pain points.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-08',
            'assignment_due_date' => '2026-06-16',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('UI/UX Designing', 'AdvanceJS')->id,
            'assignment_title' => 'Wireframe a Mobile App Flow',
            'assignment_instruction' =>
                '<p>Produce low-fidelity wireframes for a 5-screen onboarding + login flow for a fitness tracking app.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-04',
            'assignment_due_date' => '2026-05-14',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('UI/UX Designing', 'XML & Json')->id,
            'assignment_title' => 'High-Fidelity Prototype in Figma',
            'assignment_instruction' =>
                '<p>Convert your wireframes into a clickable high-fidelity prototype with a defined design system (colours, type scale, components).</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-20',
            'assignment_marks' => 25,
        ]);

        Assignment::create([
            'class_timing_id' => $timing2->id,
            'topic_id' => $topic('UI/UX Designing', 'Bootstrap')->id,
            'assignment_title' => 'Usability Testing Report',
            'assignment_instruction' =>
                '<p>Run a 5-user usability test on your prototype and summarise findings, pain points, and proposed fixes.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-18',
            'assignment_marks' => 15,
        ]);

        // -------------------------------------------------------------
        // PHP & MySQL
        // -------------------------------------------------------------

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('PHP & MySQL', 'PHP')->id,
            'assignment_title' => 'Student Result Management System (CRUD)',
            'assignment_instruction' =>
                '<p>Build a PHP + MySQL app to add, edit, view, and delete student results with server-side validation.</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-06-22',
            'assignment_due_date' => '2026-07-02',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('PHP & MySQL', 'AdvanceJS')->id,
            'assignment_title' => 'Login System with Sessions',
            'assignment_instruction' =>
                '<p>Implement a secure login/logout flow in PHP using sessions and password hashing (password_hash/password_verify).</p>',
            'assignment_status' => 'active',
            'posted_at' => '2026-05-25',
            'assignment_due_date' => '2026-06-04',
            'assignment_marks' => 15,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('PHP & MySQL', 'XML & Json')->id,
            'assignment_title' => 'Write Complex MySQL Queries',
            'assignment_instruction' =>
                '<p>Given a sample e-commerce schema, write JOIN, GROUP BY, and subquery statements to answer 8 provided business questions.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-04-28',
            'assignment_marks' => 20,
        ]);

        Assignment::create([
            'class_timing_id' => $timing1->id,
            'topic_id' => $topic('PHP & MySQL', 'Bootstrap')->id,
            'assignment_title' => 'File Upload with Validation',
            'assignment_instruction' =>
                '<p>Build a PHP form that uploads an image, validates file type/size, and stores the file path in MySQL.</p>',
            'assignment_status' => 'active',
            'assignment_due_date' => '2026-03-30',
            'assignment_marks' => 10,
        ]);
    }
}