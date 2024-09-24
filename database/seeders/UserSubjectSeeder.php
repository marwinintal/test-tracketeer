<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        // Get all subjects
        $subjects = Subject::all();
        $generated_subjects = [];

        // Attach subjects to users
        foreach ($users as $user) {
            // Randomly attach between 1 to 3 subjects to each user
            $random_subjects = $subjects->random(rand(1, 6))->pluck('id')->toArray();
            foreach ($random_subjects as $random_subject) {
                $generated_subjects[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $user->id,
                    'subject_id' => $random_subject
                ];
            }
        }

        DB::table('subject_user')->insert($generated_subjects);
    }
}
