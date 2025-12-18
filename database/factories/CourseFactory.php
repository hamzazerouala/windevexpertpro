<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $topics = [
            'WinDev', 'WebDev', 'WinDev Mobile', 'HFSQL', 'WLangage', 
            'POO', 'Client/Serveur', 'API REST', 'SaaS', 'Android', 'iOS'
        ];
        
        $levels = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert', 'Intégral'];
        
        $topic = $this->faker->randomElement($topics);
        $level = $this->faker->randomElement($levels);
        
        $title = "$topic : Niveau $level";
        // Sometimes make more complex titles
        if ($this->faker->boolean(40)) {
            $title = "Maîtriser $topic de A à Z";
        } elseif ($this->faker->boolean(40)) {
            $title = "Créer un ERP avec $topic";
        }

        $slug = Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 1000);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(3),
            'image_path' => $this->faker->randomElement([
                'https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=800'
            ]),
            'is_published' => $this->faker->boolean(90), // Most are published
            'price' => $this->faker->randomFloat(2, 49, 999),
            'stripe_product_id' => null,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
