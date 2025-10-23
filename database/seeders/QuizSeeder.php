<?php

namespace Database\Seeders;

use App\Enums\QuizCategory;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizzes = [
            [
                'name' => 'Tes Efikasi Karier',
                'description' => 'Tes Multiple Intelligence',
                'category' => QuizCategory::EFIKASIKARIR,
            ],
            [
                'name' => 'Logical-Mathematical',
                'description' => 'Kuat dalam logika, perhitungan, dan pemecahan masalah.',
                'category' => QuizCategory::MULTIPLEINTELLIGENCE,
            ],
        ];

        foreach ($quizzes as $quiz) {
            Quiz::create([
                'name' => $quiz['name'],
                'description' => $quiz['description'],
                'category' => $quiz['category'],
            ]);
        }
    }
}
