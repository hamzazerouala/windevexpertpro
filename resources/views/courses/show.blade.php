<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - WindevExpert</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg mb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('courses.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                        &larr; Retour
                    </a>
                    <span class="font-bold text-xl text-blue-600">{{ $course->title }}</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 mb-8">
            <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
            <p class="text-gray-700 mb-6">{{ $course->description }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold">Contenu du cours</h2>
            </div>
            <div class="divide-y divide-gray-200">
                @foreach($course->modules as $module)
                <div class="p-6 bg-gray-50">
                    <h3 class="font-medium text-lg text-gray-900 mb-4">{{ $module->title }}</h3>
                    <ul class="space-y-3">
                        @foreach($module->lessons as $lesson)
                        <li class="flex items-center justify-between bg-white p-3 rounded shadow-sm">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $lesson->title }}</span>
                            </div>
                            <a href="{{ route('courses.watch', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Regarder
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
