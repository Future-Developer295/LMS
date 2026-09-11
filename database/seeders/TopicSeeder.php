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