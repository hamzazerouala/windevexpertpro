<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition()
    {
        $title = $this->faker->sentence(5);
        return [
            'module_id' => Module::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'video_url' => 'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4',
            'duration_seconds' => $this->faker->numberBetween(300, 3600),
            'order' => $this->faker->numberBetween(1, 10),
            'is_free_preview' => $this->faker->boolean(20),
        ];
    }
}
