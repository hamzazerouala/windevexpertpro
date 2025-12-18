<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;

class AdditionalCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 30 random courses
        Course::factory(30)->create()->each(function ($course) {
            Module::factory(rand(3, 8))->create(['course_id' => $course->id])->each(function ($module) {
                Lesson::factory(rand(3, 10))->create(['module_id' => $module->id]);
            });
        });

        $this->command->info('30 Additional Random Courses created with Modules and Lessons');
    }
}
