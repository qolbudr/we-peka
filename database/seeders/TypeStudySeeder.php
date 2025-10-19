<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('type_study_details')->truncate();
        DB::table('type_studies')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $typeStudies = [
            [
                'id' => 1,
                'name' => 'Akademik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Vokasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Profesi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('type_studies')->insert($typeStudies);

        $typeStudyDetails = [
            [
                'type_study_id' => 1,
                'science_specialization' => 'Ilmu Pengetahuan Alam (IPA)',
                'level' => 's1',
                'purpose' => 'Menguasai dan mengembangkan ilmu pengetahuan alam untuk penelitian dan pengembangan akademis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 1,
                'science_specialization' => 'Ilmu Pengetahuan Sosial (IPS)',
                'level' => 's1',
                'purpose' => 'Menguasai dan mengembangkan ilmu sosial, humaniora, dan seni untuk penelitian akademis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 1,
                'science_specialization' => 'Teknik dan Teknologi',
                'level' => 's1',
                'purpose' => 'Menguasai dan mengembangkan ilmu teknik dan teknologi untuk inovasi dan riset',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 1,
                'science_specialization' => null,
                'level' => 's2',
                'purpose' => 'Mengembangkan kemampuan penelitian dan analisis mendalam dalam bidang ilmu tertentu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 1,
                'science_specialization' => null,
                'level' => 's3',
                'purpose' => 'Menghasilkan peneliti dan akademisi yang mampu mengembangkan ilmu pengetahuan baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 2,
                'science_specialization' => 'Teknik dan Industri',
                'level' => 'd3',
                'purpose' => 'Menyiapkan tenaga ahli madya yang siap kerja dengan keterampilan praktis di bidang teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 2,
                'science_specialization' => 'Kesehatan',
                'level' => 'd3',
                'purpose' => 'Menyiapkan tenaga kesehatan tingkat madya dengan keterampilan teknis medis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 2,
                'science_specialization' => 'Bisnis dan Manajemen',
                'level' => 'd3',
                'purpose' => 'Menyiapkan tenaga praktisi bisnis dengan keterampilan manajerial dan operasional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 2,
                'science_specialization' => null,
                'level' => 'd4',
                'purpose' => 'Menyiapkan tenaga ahli profesional dengan keahlian terapan tingkat lanjut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 3,
                'science_specialization' => 'Kedokteran',
                'level' => 'profesi',
                'purpose' => 'Menyiapkan dokter profesional yang kompeten dalam praktik medis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 3,
                'science_specialization' => 'Hukum',
                'level' => 'profesi',
                'purpose' => 'Menyiapkan advokat dan praktisi hukum yang profesional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 3,
                'science_specialization' => 'Akuntansi',
                'level' => 'profesi',
                'purpose' => 'Menyiapkan akuntan profesional yang tersertifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_study_id' => 3,
                'science_specialization' => 'Guru',
                'level' => 'profesi',
                'purpose' => 'Menyiapkan pendidik profesional yang kompeten dalam mengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('type_study_details')->insert($typeStudyDetails);
    }
}
