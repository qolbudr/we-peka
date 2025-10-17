<?php

namespace Database\Seeders;

use App\Enums\QuizCategory;
use App\Models\Intelligence;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $jenisTesEK = Quiz::where('category', QuizCategory::EFIKASIKARIR)->first(); // Efikasi Karier
        $jenisTesMI = Quiz::where('category', QuizCategory::MULTIPLEINTELLIGENCE)->first(); // Multiple Intelligence
        $jenisKecerdasan = Intelligence::all();

        if ($users->isEmpty() || !$jenisTesEK || !$jenisTesMI) {
            $this->command->warn('Data user atau jenis tes belum ada.');
            return;
        }

        $hasilTesData = [];

        foreach ($users->take(5) as $index => $user) {

            $hasilTesData[] = [
                'user_id' => $user->id,
                'quiz_id' => $jenisTesEK->id,
                'score' => 95,
                'category' => 'sedang',
                'intelligence_id' => null,
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now()->subDays(rand(1, 30)),
            ];

            $randomKecerdasan = $jenisKecerdasan->random();

            $hasilTesData[] = [
                'user_id' => $user->id,
                'quiz_id' => $jenisTesMI->id,
                'score' => rand(150, 240),
                'category' => 'rendah',
                'intelligence_id' => $randomKecerdasan->id,
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now()->subDays(rand(1, 30)),
            ];
        }

        // Insert data
        DB::table('results')->insert($hasilTesData);

        $this->command->info('Seeder results berhasil bos!');
    }
}
