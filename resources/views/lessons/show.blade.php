<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }} - {{ $course->title }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Plyr CSS for Video Player -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>
<body class="bg-gray-900 text-white h-screen flex flex-col">
    <nav class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('courses.show', $course->slug) }}" class="text-gray-400 hover:text-white mr-4">
                        &larr; Retour au cours
                    </a>
                    <span class="font-bold text-lg truncate">{{ $course->title }} / {{ $lesson->title }}</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex-1 flex overflow-hidden">
        <!-- Main Content (Video) -->
        <div class="flex-1 bg-black flex items-center justify-center relative">
            <div class="w-full max-w-4xl">
                <!-- Video Player -->
                <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                    <source src="{{ $videoUrl }}" type="video/mp4" />
                    <!-- Captions are optional -->
                </video>
            </div>
        </div>

        <!-- Sidebar (Playlist) -->
        <div class="w-80 bg-gray-800 border-l border-gray-700 overflow-y-auto hidden md:block">
            <div class="p-4 border-b border-gray-700">
                <h3 class="font-semibold text-gray-300">Contenu du cours</h3>
            </div>
            @foreach($course->modules as $module)
            <div class="mb-4">
                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    {{ $module->title }}
                </div>
                <ul>
                    @foreach($module->lessons as $l)
                    <li>
                        <a href="{{ route('courses.watch', ['course' => $course->slug, 'lesson' => $l->slug]) }}" 
                           class="block px-4 py-2 text-sm {{ $l->id === $lesson->id ? 'bg-blue-900 text-white border-l-4 border-blue-500' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                            {{ $l->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player');
    </script>
</body>
</html>
