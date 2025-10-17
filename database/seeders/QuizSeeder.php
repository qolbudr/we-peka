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
        Quiz::create([
            'name' => 'Tes Efikasi Karier',
            'description' => 'Tes untuk mengukur tingkat keyakinan diri peserta didik dalam merencanakan dan mengembangkan karier mereka',
            'category' => QuizCategory::EFIKASIKARIR,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
