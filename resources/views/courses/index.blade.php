<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations - SGI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg mb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="font-bold text-xl text-blue-600">SGI Learning</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900">Tableau de bord</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Nos Formations</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($courses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($course->image_path)
                    <img src="{{ $course->image_path }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Pas d'image</span>
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($course->description, 100) }}</p>
                    <a href="{{ route('courses.show', $course->slug) }}" class="block w-full bg-blue-600 text-white text-center py-2 rounded-md hover:bg-blue-700">
                        Voir le cours
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-500">Aucune formation disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
