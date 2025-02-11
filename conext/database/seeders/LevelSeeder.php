<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de niveles con su experiencia requerida
        $levels = [
            ['level' => 1, 'experience_required' => 100],
            ['level' => 2, 'experience_required' => 200],
            ['level' => 3, 'experience_required' => 400],
            ['level' => 4, 'experience_required' => 800],
            ['level' => 5, 'experience_required' => 1600],
            ['level' => 6, 'experience_required' => 3200],
            ['level' => 7, 'experience_required' => 6400],
            ['level' => 8, 'experience_required' => 12800],
            ['level' => 9, 'experience_required' => 25600],
            ['level' => 10, 'experience_required' => 51200],
        ];

        // Insertar cada nivel en la base de datos
        foreach ($levels as $level) {
            DB::table('levels')->insert([
                'level' => $level['level'],
                'experience_required' => $level['experience_required'],
            ]);
        }
    }
}
