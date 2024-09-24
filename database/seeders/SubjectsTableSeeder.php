<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['id' => Str::uuid()->toString(), 'name' => 'Math'],
            ['id' => Str::uuid()->toString(), 'name' => 'Science'],
            ['id' => Str::uuid()->toString(), 'name' => 'English'],
            ['id' => Str::uuid()->toString(), 'name' => 'Physics'],
            ['id' => Str::uuid()->toString(), 'name' => 'Chemistry'],
            ['id' => Str::uuid()->toString(), 'name' => 'Biology'],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
