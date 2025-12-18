<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_published', true)->get();
        return view('courses.index', compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->with(['modules.lessons'])
            ->firstOrFail();

        return view('courses.show', compact('course'));
    }

    public function watch($courseSlug, $lessonSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        
        // Basic Access Control
        // In real app: Check if user purchased the course or has active subscription
        // For now, allow all logged in users
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Generate Signed URL for Video (Mock implementation)
        // In production, this would sign a URL for CDN or local protected route
        $videoUrl = $lesson->video_url; 
        // If it's a local file, we would use:
        // $videoUrl = URL::signedRoute('video.stream', ['lesson' => $lesson->id]);

        return view('lessons.show', compact('course', 'lesson', 'videoUrl'));
    }
}
