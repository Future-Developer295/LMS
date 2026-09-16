<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $topicNames = [
            'PHP',
            'AdvanceJS',
            'XML & Json',
            'Bootstrap',
            'Laravel',
            'ReactJS',
            'NodeJS',
            'ExpressJS',
            'MongoDB',
            'MySQL',    
            'web development',
            'Data Structures',
            'Algorithms',
            'Operating Systems',
            'Database Management Systems',
            'Computer Networks',
            'Software Engineering', 
            'Artificial Intelligence',
            'Machine Learning',
            'Deep Learning',
            'Natural Language Processing',
            'Computer Vision',
            'Cybersecurity',
            'Cloud Computing',
            'Internet of Things',
            'Mobile App Development',
            'Game Development',
            'Web Design',
            'User Experience (UX) Design',
            'User Interface (UI) Design',
            'Digital Marketing',
            'Search Engine Optimization (SEO)',
            'Social Media Marketing',
            'Content Marketing',
            'Email Marketing',
            'E-commerce',
            'Project Management',
            'Agile Methodology',
            'Scrum Framework',
            'DevOps',
            'Version Control (Git)',
            'Continuous Integration/Continuous Deployment (CI/CD)',
            'Software Testing',
            'Quality Assurance (QA)',
            'Data Analysis',
            'Data Visualization',
            'Big Data',
            'Data Mining',
            'Business Intelligence',
            'Cloud Storage',
            'Virtualization',
            'Blockchain Technology', 
            'graphic design',
            'video editing',
            'animation',
            'photography',
            'music production',     
                  
        ];

        $classes = ClassModel::all();

        foreach ($classes as $class) {
            foreach ($topicNames as $index => $topicName) {
                Topic::firstOrCreate(
                    [
                        'class_id'   => $class->id,
                        'topic_name' => $topicName,
                    ],
                    [
                        'order' => $index + 1,
                    ]
                );
            }
        }
    }
}