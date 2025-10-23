<?php

namespace Database\Seeders;

use App\Models\Intelligence;
use App\Models\JobIntelligence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntelligenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intelligences = [
            [
                'name' => 'Linguistic',
                'description' => 'Cerdas dengan kata-kata, mudah menulis dan berbicara.',
                'jobs' => ['Penulis', 'Editor', 'Jurnalis', 'Guru Bahasa']
            ],
            [
                'name' => 'Logical-Mathematical',
                'description' => 'Kuat dalam logika, perhitungan, dan pemecahan masalah.',
                'jobs' => ['Programmer', 'Akuntan', 'Data Analyst', 'Insinyur']
            ],
            [
                'name' => 'Spatial',
                'description' => 'Memiliki pemikiran visual yang kuat dan imajinasi tinggi.',
                'jobs' => ['Desainer Grafis', 'Arsitek', 'Animator', 'Fotografer']
            ],
            [
                'name' => 'Musical',
                'description' => 'Peka terhadap ritme, suara, dan musik.',
                'jobs' => ['Musisi', 'Komposer', 'Sound Engineer']
            ],
            [
                'name' => 'Bodily-Kinesthetic',
                'description' => 'Pandai menggunakan tubuh dalam ekspresi atau aktivitas fisik.',
                'jobs' => ['Atlet', 'Penari', 'Fisioterapis']
            ],
            [
                'name' => 'Interpersonal',
                'description' => 'Mampu memahami orang lain dan bekerja sama dengan baik.',
                'jobs' => ['Guru', 'Psikolog', 'HRD', 'Konselor']
            ],
            [
                'name' => 'Intrapersonal',
                'description' => 'Memiliki kesadaran diri yang tinggi, reflektif dan mandiri.',
                'jobs' => ['Penulis', 'Filsuf', 'Life Coach']
            ],
            [
                'name' => 'Naturalist',
                'description' => 'Tertarik pada alam dan lingkungan sekitar.',
                'jobs' => ['Ahli Biologi', 'Petani', 'Dokter Hewan', 'Konservasionis']
            ],
        ];

        foreach ($intelligences as $intel) {
            $created = Intelligence::create([
                'name' => $intel['name'],
                'description' => $intel['description']
            ]);

            foreach ($intel['jobs'] as $job) {
                JobIntelligence::create([
                    'intelligence_id' => $created->id,
                    'name' => $job
                ]);
            }
        }
    }
}
