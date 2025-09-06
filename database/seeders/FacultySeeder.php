<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\FacultyLeader;
use App\Models\Ormawa;
use App\Models\Student;
use App\Models\StudyProgram;
use App\Models\User;
use App\Repositories\StudentRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $data = file_get_contents(database_path('seeders/data/faculties.json'));
        Faculty::truncate();
        StudyProgram::truncate();
        Student::truncate();
        foreach (json_decode($data, true) as $item) {
            Faculty::updateOrCreate([
                'name' => $item['fakultas'],
            ], [])->programs()->createMany(array_map(fn($program) => ['name' => $program], $item['program_studi']));
        }
        $students = file_get_contents(database_path('seeders/data/students.json'));
        $students = json_decode($students, true);
        $statuses = array_keys((new StudentRepository)->getStatus());
        $pass = bcrypt('123456');
        User::withoutRole([
            'superadmin',
            'admin',
            'banker',
            'user',
            'admin pendidikan'
        ])->delete();

        $studyPrograms = StudyProgram::all();
        $studyProgramIds = $studyPrograms->pluck('id')->toArray();
        foreach ($students as $student) {
            try {
                $user = User::create([
                    'name'         => $student['nama'],
                    'email'        => strtolower(str_replace(' ', '.', $student['nama'])) . '@univ.ac.id',
                    'phone_number' => fake('id_ID')->phoneNumber(),
                    'password'     => $pass,
                    'address'      => fake('id_ID')->address(),
                    'birth_date'   => fake()->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
                ]);
                $user->assignRole('mahasiswa');
                Student::create([
                    'name'             => $student['nama'],
                    'nim'              => $student['nim'],
                    'photo'            => fake()->imageUrl(400, 400, 'people', true),
                    'user_id'          => $user->id,
                    'class_year'       => $year = ($user->birth_date ? (int)date('Y', strtotime($user->birth_date)) + 18 : null),
                    'student_status'   => $status = Arr::random($statuses),
                    'graduation_year'  => in_array($status, ['lulus']) ? $year + 4 : null,
                    'study_program_id' => Arr::random($studyProgramIds),
                ]);
            } catch (\Exception $e) {
                \Log::error("Error creating student : {$e->getMessage()}");
            }
        }

        FacultyLeader::truncate();
        foreach (range(1, 100) as $index) {
            $user = User::create([
                'name'         => fake()->name(),
                'email'        => fake()->unique()->safeEmail(),
                'phone_number' => fake('id_ID')->phoneNumber(),
                'password'     => $pass,
                'address'      => fake('id_ID')->address(),
                'birth_date'   => fake()->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
            ]);
            $user->assignRole('pimpinan fakultas');
            FacultyLeader::create([
                'user_id' => $user->id,
                'faculty_id' => rand(1, 10),
            ]);
        }

        $ormawa = file_get_contents(database_path('seeders/data/ormawa.json'));
        $data = collect(json_decode($ormawa, true))
            ->map(fn($item) => [
                'id' => $item['id'],
                'name' => $item['name'],
            ])->toArray();
        // dd($data);
        Ormawa::truncate();
        Ormawa::insert($data);
        // dd(1);
    }
}
