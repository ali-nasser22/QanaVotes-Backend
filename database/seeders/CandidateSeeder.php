<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::create([
            'full_name' => 'Hassan Al Sayed',
            'bio' => 'Focused on youth empowerment and education.',
            'photo_url' => null,
        ]);

        Candidate::create([
            'full_name' => 'Mohammad Kresht',
            'bio' => 'Passionate about public services and sustainability.',
            'photo_url' => null,
        ]);
    }
}
