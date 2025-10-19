<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $siswa->assignRole('siswa');

        $guru = User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $guru->assignRole('guru');

        $this->call(QuizSeeder::class);
        $this->call(ResultSeeder::class);
        $this->call(AnswersSeeder::class);
    }
}
