<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Client;
use App\Models\Site;
use App\Models\Software;
use App\Models\License;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Create a Test User for LMS & Store
        $user = User::firstOrCreate(
            ['email' => 'client@test.com'],
            [
                'name' => 'Client Test',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        
        $this->command->info('Test User created: client@test.com / password');

        // 2. Create Freelance Data (Client, Site, Software, License)
        $client = Client::create([
            'name' => 'Entreprise Demo SARL',
            'email' => 'contact@demo.com',
            'contact_person' => 'Jean Dupont',
            'address' => '123 Rue de la Tech, Paris'
        ]);

        $site = Site::create([
            'client_id' => $client->id,
            'name' => 'Siège Social',
            'address' => '123 Rue de la Tech, Paris'
        ]);

        $software = Software::create([
            'name' => 'WinDev Expert Pro',
            'version' => '2025.1'
        ]);

        $license = License::create([
            'client_id' => $client->id,
            'software_id' => $software->id,
            'license_key' => 'TEST-KEY-1234-5678', // Fixed key for easy testing
            'max_activations' => 5,
            'activations_count' => 0,
            'is_active' => true,
            'expires_at' => now()->addYear(),
        ]);

        $this->command->info('License created: TEST-KEY-1234-5678');

        // 3. Create LMS Data (Course, Modules, Lessons)
        $course = Course::create([
            'title' => 'Maîtriser WinDev en 30 jours',
            'slug' => 'maitriser-windev',
            'description' => 'Une formation complète pour devenir expert WinDev.',
            'is_published' => true,
            'price' => 99.00,
            'image_path' => 'https://via.placeholder.com/640x480.png?text=Formation+WinDev'
        ]);

        $module1 = Module::create([
            'course_id' => $course->id,
            'title' => 'Introduction et Installation',
            'order' => 1
        ]);

        Lesson::create([
            'module_id' => $module1->id,
            'title' => 'Installation de l\'environnement',
            'slug' => 'installation-environnement',
            'description' => 'Comment installer WinDev correctement.',
            'video_url' => 'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4', // Demo video
            'duration_seconds' => 120,
            'order' => 1,
            'is_free_preview' => true
        ]);

        Lesson::create([
            'module_id' => $module1->id,
            'title' => 'Découverte de l\'interface',
            'slug' => 'decouverte-interface',
            'description' => 'Tour d\'horizon de l\'IDE.',
            'video_url' => 'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4',
            'duration_seconds' => 300,
            'order' => 2,
            'is_free_preview' => false
        ]);

        $this->command->info('LMS Data created: Course "Maîtriser WinDev"');

        $this->call(AdditionalCoursesSeeder::class);
    }
}
