<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des Formations - WindevExpert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }
        .course-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .filter-btn.active {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }
        .star-rating {
            color: #fbbf24;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-2">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="bg-blue-600 p-2 rounded-lg">
                            <i data-lucide="code-2" class="text-white w-6 h-6"></i>
                        </div>
                        <span class="text-2xl font-bold tracking-tight text-blue-900">Windev<span class="text-blue-600">Expert</span></span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-slate-600 hover:text-blue-600 font-medium transition-colors flex items-center gap-2"><i data-lucide="home" class="w-4 h-4"></i> Accueil</a>
                    <a href="{{ route('solutions') }}" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Solutions</a>
                    <a href="{{ route('courses.index') }}" class="text-blue-600 font-bold transition-colors">Formations</a>
                    <a href="{{ route('marketplace.index') }}" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Marketplace</a>
                    <div class="h-6 w-px bg-slate-200"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-full font-semibold hover:bg-blue-700 transition-all shadow-md">
                            Mon Espace
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Connexion</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-full font-semibold hover:bg-blue-700 transition-all shadow-md">
                            Espace Client
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="pt-32 pb-12 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="space-y-4">
                    <nav class="flex text-sm text-slate-500 gap-2 mb-4">
                        <a href="{{ url('/') }}" class="hover:text-blue-600">Accueil</a>
                        <span>/</span>
                        <span class="text-slate-900 font-medium">Catalogue PC Soft</span>
                    </nav>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-900">Catalogue <span class="text-blue-600">PC Soft</span></h1>
                    <p class="text-lg text-slate-600 max-w-2xl">
                        Devenez un expert du WLangage. Nos formations sont 100% dédiées à la maîtrise de WinDev, WebDev et WinDev Mobile.
                    </p>
                </div>
                <div class="flex items-center gap-4 bg-slate-100 p-1.5 rounded-2xl border border-slate-200">
                    <div class="px-4 py-2 bg-white rounded-xl shadow-sm border border-slate-200 flex items-center gap-2">
                        <i data-lucide="video" class="w-4 h-4 text-blue-600"></i>
                        <span class="text-sm font-bold text-slate-700">180+ Vidéos</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Filters & Search -->
    <section class="sticky top-20 z-40 bg-slate-50/80 backdrop-blur-md border-b border-slate-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6 justify-between items-center">
            <div class="flex flex-wrap items-center gap-2">
                <button class="filter-btn active px-5 py-2 rounded-xl border border-slate-200 font-bold text-sm transition-all">Tout voir</button>
                <button class="filter-btn px-5 py-2 rounded-xl bg-white border border-slate-200 font-bold text-sm text-slate-600 hover:border-blue-600 hover:text-blue-600 transition-all">WinDev</button>
                <button class="filter-btn px-5 py-2 rounded-xl bg-white border border-slate-200 font-bold text-sm text-slate-600 hover:border-blue-600 hover:text-blue-600 transition-all">WebDev</button>
                <button class="filter-btn px-5 py-2 rounded-xl bg-white border border-slate-200 font-bold text-sm text-slate-600 hover:border-blue-600 hover:text-blue-600 transition-all">Mobile</button>
                <button class="filter-btn px-5 py-2 rounded-xl bg-white border border-slate-200 font-bold text-sm text-slate-600 hover:border-blue-600 hover:text-blue-600 transition-all">HFSQL</button>
            </div>
            <div class="relative w-full lg:w-96">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 w-5 h-5"></i>
                <input type="text" placeholder="Rechercher une technologie..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 outline-none transition-all">
            </div>
        </div>
    </section>

    <!-- Course Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($courses as $course)
            <div class="course-card bg-white rounded-[2rem] border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                <div class="relative aspect-video">
                    <img src="{{ $course->image_path ?? 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-black uppercase px-3 py-1 rounded-full shadow-lg">Formation</div>
                </div>
                <div class="p-8 space-y-4">
                    <div class="flex items-center gap-1 star-rating">
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <span class="text-slate-400 text-xs font-bold ml-1">5.0</span>
                    </div>
                    <h3 class="text-2xl font-black leading-tight group-hover:text-blue-600 transition-colors">{{ $course->title }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed line-clamp-2">{{ $course->description }}</p>
                    <div class="flex items-center gap-4 py-2 border-y border-slate-50">
                        <div class="flex items-center gap-1.5 text-xs font-bold text-slate-500">
                            <i data-lucide="clock" class="w-4 h-4 text-blue-600"></i> --h --m
                        </div>
                        <div class="flex items-center gap-1.5 text-xs font-bold text-slate-500">
                            <i data-lucide="play-circle" class="w-4 h-4 text-blue-600"></i> -- Leçons
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-2">
                        <span class="text-xs font-black text-blue-600 uppercase tracking-widest">Inclus dans l'abonnement</span>
                        <a href="{{ route('courses.show', $course->slug) }}" class="p-2 bg-slate-100 rounded-full hover:bg-blue-600 hover:text-white transition-all">
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-slate-500 text-lg">Aucune formation disponible pour le moment.</p>
            </div>
            @endforelse

        </div>
    </main>

    <!-- Bottom CTA -->
    <section class="bg-blue-600 py-20">
        <div class="max-w-4xl mx-auto px-4 text-center space-y-8">
            <h2 class="text-3xl md:text-5xl font-black text-white">Maîtrisez l'écosystème PC Soft</h2>
            <p class="text-blue-100 text-lg">Choisissez votre formule d'abonnement et accédez à l'intégralité du contenu vidéo spécialisé.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/#offres') }}" class="bg-white text-blue-600 px-10 py-4 rounded-2xl font-black hover:bg-slate-100 transition-all shadow-xl">Voir les tarifs</a>
                <a href="{{ route('register') }}" class="bg-blue-700 text-white px-10 py-4 rounded-2xl font-black hover:bg-blue-800 transition-all border border-blue-500">Créer mon compte</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-16 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12 text-center md:text-left">
                <div class="col-span-1 md:col-span-2 space-y-6">
                    <div class="flex justify-center md:justify-start items-center space-x-2">
                        <div class="bg-blue-600 p-1.5 rounded-lg text-white"><i data-lucide="code-2" class="w-5 h-5"></i></div>
                        <span class="text-xl font-bold text-white">WindevExpert</span>
                    </div>
                    <p class="max-w-sm mx-auto md:mx-0">Apprenez à développer des solutions haute performance avec WinDev, WebDev et WinDev Mobile.</p>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Formations</h5>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#" class="hover:text-blue-400">WinDev</a></li>
                        <li><a href="#" class="hover:text-blue-400">WebDev</a></li>
                        <li><a href="#" class="hover:text-blue-400">HFSQL</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Navigation</h5>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="{{ url('/') }}" class="hover:text-blue-400">Accueil</a></li>
                        <li><a href="{{ route('solutions') }}" class="hover:text-blue-400">Solutions</a></li>
                        <li><a href="{{ url('/#offres') }}" class="hover:text-blue-400">Abonnements</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-12 border-t border-white/5 text-center text-xs">
                <p>&copy; 2025 WindevExpert. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        // Filter button logic
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active', 'bg-blue-600', 'text-white'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>