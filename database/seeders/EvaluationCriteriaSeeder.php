<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evaluation_criterias')->insert([
            [
                'quiz_id' => 1,
                'min_score_range' => 0,
                'max_score_range' => 40,
                'category' => 'sangat_rendah',
                'description' => 'Efikasi karier sangat rendah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quiz_id' => 1,
                'min_score_range' => 41,
                'max_score_range' => 60,
                'category' => 'rendah',
                'description' => 'Efikasi karier rendah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quiz_id' => 1,
                'min_score_range' => 61,
                'max_score_range' => 90,
                'category' => 'sedang',
                'description' => 'Efikasi karier sedang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quiz_id' => 1,
                'min_score_range' => 91,
                'max_score_range' => 110,
                'category' => 'tinggi',
                'description' => 'Efikasi karier tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quiz_id' => 1,
                'min_score_range' => 111,
                'max_score_range' => 125,
                'category' => 'sangat_tinggi',
                'description' => 'Efikasi karier sangat tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
