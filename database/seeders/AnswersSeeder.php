<?php

namespace Database\Seeders;

use App\Models\QuizQuestion;
use App\Models\Result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $results = Result::with('quiz')->get();

        if ($results->isEmpty()) {
            $this->command->warn('Tidak ada data results. Jalankan ResultSeeder terlebih dahulu.');
            return;
        }

        foreach ($results as $result) {
            $questions = QuizQuestion::where('quiz_id', $result->quiz_id)
                ->get();

            if ($questions->isEmpty()) {
                $this->command->warn("Tidak ada soal untuk quiz ID: {$result->quiz_id}");
                continue;
            }

            $totalScore = 0;

            foreach ($questions as $question) {
                $answerValue = rand(1, 5);
                $totalScore += $answerValue;

                DB::table('answers')->insert([
                    'result_id' => $result->id,
                    'question_id' => $question->id,
                    'answer_value' => $answerValue,
                    'created_at' => $result->created_at,
                    'updated_at' => $result->created_at,
                ]);
            }

            $result->update(['score' => $totalScore]);
        }

        $this->command->info('Seeder answers berhasil bos!');
    }
}
