<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = Classroom::query()->get();
        $subjects = Subject::query()->get();

        if ($classrooms->isEmpty() || $subjects->isEmpty()) {
            return;
        }

        $this->ensureTeachers();
        $this->ensureStudents($classrooms);

        $assignments = $this->syncClassroomSubjectAssignments($classrooms, $subjects);

        foreach ($classrooms as $classroom) {
            $classroomStudents = Student::query()
                ->where('classroom_id', $classroom->id)
                ->get();

            $classroomSubjectIds = $assignments[$classroom->id] ?? [];

            foreach ($classroomStudents as $student) {
                foreach ($classroomSubjectIds as $subjectId) {
                    Grade::factory()
                        ->for($student)
                        ->state(['subject_id' => $subjectId])
                        ->create();
                }
            }
        }
    }

    private function ensureTeachers(): void
    {
        $existing = Teacher::query()->count();

        if ($existing < 10) {
            Teacher::factory()->count(10 - $existing)->create();
        }
    }

    private function ensureStudents(Collection $classrooms): void
    {
        foreach ($classrooms as $classroom) {
            $studentsInClassroom = Student::query()
                ->where('classroom_id', $classroom->id)
                ->count();

            if ($studentsInClassroom < 18) {
                Student::factory()
                    ->count(18 - $studentsInClassroom)
                    ->state(['classroom_id' => $classroom->id])
                    ->create();
            }
        }

        Student::query()
            ->whereNull('classroom_id')
            ->get()
            ->each(function (Student $student, int $index) use ($classrooms) {
                $classroom = $classrooms[$index % $classrooms->count()];
                $student->update(['classroom_id' => $classroom->id]);
            });
    }

    /**
     * @return array<int, array<int>>
     */
    private function syncClassroomSubjectAssignments(Collection $classrooms, Collection $subjects): array
    {
        $teacherIds = Teacher::query()->pluck('id')->all();
        $assignments = [];

        foreach ($classrooms as $classroom) {
            $subjectIds = $subjects
                ->shuffle()
                ->take(fake()->numberBetween(7, 10))
                ->pluck('id')
                ->all();

            $assignments[$classroom->id] = $subjectIds;

            foreach ($subjectIds as $subjectId) {
                DB::table('classroom_subjects')->updateOrInsert(
                    [
                        'classroom_id' => $classroom->id,
                        'subject_id' => $subjectId,
                    ],
                    [
                        'teacher_id' => fake()->randomElement($teacherIds),
                    ],
                );
            }
        }

        return $assignments;
    }
}
