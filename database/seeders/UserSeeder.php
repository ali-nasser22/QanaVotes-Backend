<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name'=>'Ali Nasser',
            'ssn'=>'3',
            'login_id'=>'ABC123',
            'password' => Hash::make('12345678'),
        ]);
    }
}
