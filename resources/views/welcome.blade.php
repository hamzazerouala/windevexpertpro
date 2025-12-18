<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WindevExpert - Solutions ALMOHAMI, SAASCOM & YoussiManager</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.98);
            border-bottom: 1px solid rgba(229, 231, 235, 1);
        }
        .hero-gradient {
            background: radial-gradient(circle at top right, #f0f9ff 0%, #e0f2fe 40%, #f8fafc 100%);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            transition: all 0.3s ease-out;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .badge-ai {
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            color: white;
        }
        /* Enhanced readability radius */
        .rounded-3xl-custom { border-radius: 1.5rem; }
        .rounded-2xl-custom { border-radius: 1rem; }
        .rounded-xl-custom { border-radius: 0.75rem; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-nav shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-700 p-2.5 rounded-xl shadow-md">
                        <i data-lucide="code-2" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-slate-900">Windev<span class="text-blue-700">Expert</span></span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-slate-700 hover:text-blue-700 font-semibold text-base transition-colors flex items-center gap-2"><i data-lucide="home" class="w-4 h-4"></i> Accueil</a>
                    <a href="{{ route('solutions') }}" class="text-slate-700 hover:text-blue-700 font-semibold text-base transition-colors">Solutions</a>
                    <a href="{{ route('courses.index') }}" class="text-slate-700 hover:text-blue-700 font-semibold text-base transition-colors">Formations</a>
                    <a href="{{ route('marketplace.index') }}" class="text-slate-700 hover:text-blue-700 font-semibold text-base transition-colors">Marketplace</a>
                    <div class="h-8 w-px bg-slate-200"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-slate-700 hover:text-blue-700 font-bold text-base transition-colors">Mon Espace</a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-blue-700 font-bold text-base transition-colors">Connexion</a>
                        <a href="{{ route('register') }}" class="bg-blue-700 text-white px-6 py-3 rounded-full font-bold text-base hover:bg-blue-800 transition-all shadow-lg hover:shadow-blue-700/30">
                            Espace Client
                        </a>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button class="p-2 text-slate-700 hover:bg-slate-100 rounded-lg"><i data-lucide="menu" class="w-7 h-7"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="pt-32 pb-24 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-10 text-center lg:text-left">
                    <div class="inline-flex items-center space-x-3 bg-white text-blue-800 px-5 py-2.5 rounded-full text-sm font-bold border border-blue-100 shadow-sm">
                        <span class="flex h-3 w-3 rounded-full bg-blue-600 animate-pulse"></span>
                        <span>Solutions Métiers & Vidéos à la demande</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 leading-[1.1] tracking-tight">
                        L'Expertise <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-indigo-600">WinDev</span> au service de votre performance.
                    </h1>
                    <p class="text-xl text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-medium">
                        Découvrez nos solutions phares <strong>ALMOHAMI</strong>, <strong>SAASCOM</strong> et <strong>YoussiManager</strong>, et accédez à nos programmes de formation vidéo exclusifs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start pt-6">
                        <a href="#offres" class="bg-blue-700 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-800 transition-all shadow-xl hover:shadow-blue-700/30 flex items-center justify-center gap-3 transform hover:-translate-y-1">
                            S'abonner aux cours
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                        <a href="#logiciels" class="bg-white text-slate-800 border-2 border-slate-200 px-8 py-4 rounded-xl font-bold text-lg hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-3">
                            Nos Logiciels
                        </a>
                    </div>
                </div>
                
                <div class="relative lg:block">
                    <div class="relative bg-white p-3 rounded-3xl-custom shadow-2xl border border-slate-200 overflow-hidden transform rotate-1 hover:rotate-0 transition-transform duration-500">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1200" alt="Dashboard WindevExpert" class="rounded-2xl-custom shadow-inner w-full">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-xs px-4">
                            <div class="bg-white/95 backdrop-blur-md p-6 rounded-2xl-custom shadow-2xl border border-blue-100 flex items-center gap-5 transform hover:scale-105 transition-transform cursor-pointer">
                                <div class="bg-indigo-600 p-4 rounded-xl shadow-lg shadow-indigo-200"><i data-lucide="play" class="text-white fill-current w-6 h-6"></i></div>
                                <div>
                                    <p class="text-xs font-extrabold text-indigo-600 uppercase tracking-widest mb-1">WindevExpert TV</p>
                                    <p class="text-base font-bold text-slate-800">Accès illimité aux vidéos...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative blob -->
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-blue-400/10 blur-3xl rounded-full"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Logiciels Phares -->
    <section id="logiciels" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 space-y-6">
                <h2 class="text-blue-700 font-extrabold tracking-widest uppercase text-sm bg-blue-50 inline-block px-4 py-1.5 rounded-full">Notre Catalogue Premium</h2>
                <p class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">Des solutions adaptées à votre métier</p>
                <p class="text-xl text-slate-500 max-w-3xl mx-auto leading-relaxed">Logiciels desktop haute performance avec réplication cloud et gestion multi-postes.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-10">
                <!-- ALMOHAMI -->
                <div class="bg-white border border-slate-200 rounded-3xl-custom p-8 card-hover relative flex flex-col group shadow-lg">
                    <div class="absolute -top-4 left-8 badge-ai px-4 py-2 rounded-full text-xs font-extrabold shadow-lg uppercase tracking-wide">Assistant IA Intégré</div>
                    <div class="bg-indigo-600 w-16 h-16 rounded-2xl-custom flex items-center justify-center mb-8 shadow-xl shadow-indigo-200">
                        <i data-lucide="gavel" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold mb-3 text-slate-900">ALMOHAMI</h3>
                    <p class="text-indigo-600 font-bold text-sm mb-6 uppercase tracking-wider">Cabinet d'Avocats</p>
                    <p class="text-slate-600 mb-8 flex-grow leading-relaxed text-base font-medium">Logiciel Desktop ultra-complet avec assistance IA juridique. Gérez vos dossiers et audiences en toute souveraineté.</p>
                    <ul class="space-y-4 mb-10 text-sm text-slate-600 font-semibold">
                        <li class="flex items-center gap-3"><i data-lucide="cpu" class="text-indigo-600 w-5 h-5 flex-shrink-0"></i> IA Juridique & Analyse</li>
                        <li class="flex items-center gap-3"><i data-lucide="globe" class="text-indigo-600 w-5 h-5 flex-shrink-0"></i> Accès clients via portail Web</li>
                        <li class="flex items-center gap-3"><i data-lucide="cloud-lightning" class="text-indigo-600 w-5 h-5 flex-shrink-0"></i> Réplication Cloud</li>
                        <li class="flex items-center gap-3"><i data-lucide="shield-check" class="text-indigo-600 w-5 h-5 flex-shrink-0"></i> Hébergement souverain</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="w-full text-center py-4 bg-slate-900 text-white rounded-xl-custom font-bold text-lg hover:bg-indigo-700 transition-all shadow-lg hover:shadow-indigo-500/25">Demander une démo</a>
                </div>

                <!-- SAASCOM -->
                <div class="bg-white border border-slate-200 rounded-3xl-custom p-8 card-hover relative flex flex-col group shadow-lg">
                    <div class="bg-blue-600 w-16 h-16 rounded-2xl-custom flex items-center justify-center mb-8 shadow-xl shadow-blue-200">
                        <i data-lucide="shopping-cart" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold mb-3 text-slate-900">SAASCOM</h3>
                    <p class="text-blue-600 font-bold text-sm mb-6 uppercase tracking-wider">Gestion Commerciale</p>
                    <p class="text-slate-600 mb-8 flex-grow leading-relaxed text-base font-medium">Solution multi-sites pour piloter votre activité commerciale sur tous les supports (Web, Desktop, Mobile).</p>
                    <ul class="space-y-4 mb-10 text-sm text-slate-600 font-semibold">
                        <li class="flex items-center gap-3"><i data-lucide="layout-grid" class="text-blue-600 w-5 h-5 flex-shrink-0"></i> Architecture Multi-sites</li>
                        <li class="flex items-center gap-3"><i data-lucide="monitor" class="text-blue-600 w-5 h-5 flex-shrink-0"></i> Logiciel Desktop (Windev)</li>
                        <li class="flex items-center gap-3"><i data-lucide="smartphone" class="text-blue-600 w-5 h-5 flex-shrink-0"></i> App Mobile (Android/iOS)</li>
                        <li class="flex items-center gap-3"><i data-lucide="file-text" class="text-blue-600 w-5 h-5 flex-shrink-0"></i> Facturation temps réel</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="w-full text-center py-4 bg-blue-600 text-white rounded-xl-custom font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-blue-500/25">Voir les tarifs</a>
                </div>

                <!-- YoussiManager -->
                <div class="bg-white border border-slate-200 rounded-3xl-custom p-8 card-hover relative flex flex-col group shadow-lg">
                    <div class="bg-rose-500 w-16 h-16 rounded-2xl-custom flex items-center justify-center mb-8 shadow-xl shadow-rose-200">
                        <i data-lucide="sparkles" class="text-white w-8 h-8"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold mb-3 text-slate-900">YoussiManager</h3>
                    <p class="text-rose-600 font-bold text-sm mb-6 uppercase tracking-wider">Beauté & Instituts</p>
                    <p class="text-slate-600 mb-8 flex-grow leading-relaxed text-base font-medium">Simplifiez la gestion de votre institut : planning intelligent, fidélité clients et suivi des ventes optimisé.</p>
                    <ul class="space-y-4 mb-10 text-sm text-slate-600 font-semibold">
                        <li class="flex items-center gap-3"><i data-lucide="calendar-days" class="text-rose-500 w-5 h-5 flex-shrink-0"></i> Planning interactif & RDV</li>
                        <li class="flex items-center gap-3"><i data-lucide="heart" class="text-rose-500 w-5 h-5 flex-shrink-0"></i> Fidélité & CRM Client</li>
                        <li class="flex items-center gap-3"><i data-lucide="bar-chart-3" class="text-rose-500 w-5 h-5 flex-shrink-0"></i> Analyse des revenus</li>
                        <li class="flex items-center gap-3"><i data-lucide="tablet" class="text-rose-500 w-5 h-5 flex-shrink-0"></i> Interface tactile intuitive</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="w-full text-center py-4 border-2 border-slate-800 text-slate-800 rounded-xl-custom font-bold text-lg hover:bg-slate-800 hover:text-white transition-all">En savoir plus</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Expertise Technique -->
    <section id="services" class="py-24 bg-slate-900 text-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-10">
                    <div class="inline-block px-4 py-1.5 bg-blue-500/20 rounded-full border border-blue-500/30 text-blue-400 text-xs font-extrabold uppercase tracking-widest">Pourquoi WindevExpert ?</div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight tracking-tight">La technologie au service de <span class="text-blue-500">votre métier</span></h2>
                    <p class="text-slate-300 text-xl leading-relaxed font-medium">Nous développons des écosystèmes complets où le Desktop, le Web et le Mobile communiquent parfaitement pour une efficacité maximale.</p>
                    
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="p-6 bg-white/5 rounded-2xl-custom border border-white/10 hover:bg-white/10 transition-colors">
                            <i data-lucide="repeat" class="text-blue-400 mb-4 w-8 h-8"></i>
                            <h4 class="font-bold mb-2 text-xl">Réplication Cloud</h4>
                            <p class="text-sm text-slate-400 font-medium">Synchronisation HFSQL ultra-rapide entre vos sites distants.</p>
                        </div>
                        <div class="p-6 bg-white/5 rounded-2xl-custom border border-white/10 hover:bg-white/10 transition-colors">
                            <i data-lucide="lock" class="text-blue-400 mb-4 w-8 h-8"></i>
                            <h4 class="font-bold mb-2 text-xl">Souveraineté</h4>
                            <p class="text-sm text-slate-400 font-medium">Vos données sont hébergées selon les normes de sécurité les plus strictes.</p>
                        </div>
                    </div>
                </div>
                <div class="relative mt-12 lg:mt-0">
                    <div class="absolute -inset-4 bg-blue-600/30 blur-3xl-custom rounded-full"></div>
                    <div class="bg-slate-800 p-8 md:p-10 rounded-3xl-custom border border-white/10 shadow-2xl relative">
                        <h3 class="text-2xl font-bold mb-8 flex items-center gap-4 text-white"><i data-lucide="terminal" class="text-green-400 w-8 h-8"></i> Code Qualité</h3>
                        <div class="space-y-5 font-mono text-base md:text-lg">
                            <div class="flex gap-4 p-4 bg-slate-900/80 rounded-xl border border-white/5"><span class="text-slate-500 select-none">01</span><span class="text-blue-400 font-bold">SI</span> <span class="text-white">gUtiliseIA</span> <span class="text-blue-400 font-bold">ALORS</span></div>
                            <div class="flex gap-4 p-4 bg-slate-900/80 rounded-xl border border-white/5"><span class="text-slate-500 select-none">02</span> &nbsp;&nbsp;<span class="text-green-400">AI_AnalyseJuridique</span>(<span class="text-orange-400">DossierID</span>)</div>
                            <div class="flex gap-4 p-4 bg-slate-900/80 rounded-xl border border-white/5"><span class="text-slate-500 select-none">03</span><span class="text-blue-400 font-bold">FIN</span></div>
                            <div class="flex gap-4 p-4 bg-slate-900/80 rounded-xl border border-white/5"><span class="text-slate-500 select-none">04</span><span class="text-blue-400 font-bold">RETOUR</span> <span class="text-white">Réplication_Instant_Cloud</span>()</div>
                        </div>
                        <div class="mt-10 pt-8 border-t border-white/10 flex items-center justify-end">
                            <div class="flex -space-x-4">
                                <div class="w-12 h-12 rounded-full bg-blue-600 border-4 border-slate-800"></div>
                                <div class="w-12 h-12 rounded-full bg-indigo-600 border-4 border-slate-800"></div>
                                <div class="w-12 h-12 rounded-full bg-rose-500 border-4 border-slate-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Formations (LMS par Abonnement) -->
    <section id="formations" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 space-y-6">
                <h2 class="text-blue-700 font-extrabold uppercase tracking-widest text-sm bg-blue-50 inline-block px-4 py-1.5 rounded-full">Formation en ligne</h2>
                <p class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">Apprenez à votre rythme en vidéo</p>
                <p class="text-xl text-slate-500 max-w-2xl mx-auto font-medium">Accédez à l'intégralité de nos programmes via nos formules d'abonnement flexibles.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-10 mb-24">
                <!-- Formation ALMOHAMI -->
                <div class="group flex flex-col lg:flex-row bg-white rounded-2xl-custom overflow-hidden border border-slate-200 hover:shadow-2xl transition-all shadow-md">
                    <div class="lg:w-2/5 relative h-64 lg:h-auto overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80&w=800" alt="Cours ALMOHAMI" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-indigo-900/20 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    <div class="p-8 lg:w-3/5 space-y-5">
                        <span class="px-3 py-1.5 bg-indigo-100 text-indigo-700 rounded-lg text-xs font-extrabold uppercase border border-indigo-200 inline-block">Cours Vidéo</span>
                        <h4 class="text-2xl font-extrabold leading-tight text-slate-900">Digitalisation de Cabinet avec ALMOHAMI</h4>
                        <p class="text-slate-600 font-medium leading-relaxed">Maîtrisez l'IA juridique et l'organisation numérique de vos dossiers en 10 heures de contenu vidéo.</p>
                        <div class="flex items-center gap-6 text-sm font-bold text-slate-500 pt-2">
                            <span class="flex items-center gap-2"><i data-lucide="play-circle" class="w-5 h-5 text-blue-600"></i> 10h de contenu</span>
                            <span class="flex items-center gap-2"><i data-lucide="list" class="w-5 h-5 text-blue-600"></i> 24 chapitres</span>
                        </div>
                    </div>
                </div>

                <!-- Formation Windev -->
                <div class="group flex flex-col lg:flex-row bg-white rounded-2xl-custom overflow-hidden border border-slate-200 hover:shadow-2xl transition-all shadow-md">
                    <div class="lg:w-2/5 relative h-64 lg:h-auto overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=800" alt="Cours ERP" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    <div class="p-8 lg:w-3/5 space-y-5">
                        <span class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg text-xs font-extrabold uppercase border border-blue-200 inline-block">Cours Vidéo</span>
                        <h4 class="text-2xl font-extrabold leading-tight text-slate-900">Développer un ERP Multi-sites complet</h4>
                        <p class="text-slate-600 font-medium leading-relaxed">Apprenez les coulisses de la création de SAASCOM : architecture HFSQL, Mobile et WebDev.</p>
                        <div class="flex items-center gap-6 text-sm font-bold text-slate-500 pt-2">
                            <span class="flex items-center gap-2"><i data-lucide="play-circle" class="w-5 h-5 text-blue-600"></i> 25h de contenu</span>
                            <span class="flex items-center gap-2"><i data-lucide="list" class="w-5 h-5 text-blue-600"></i> 58 chapitres</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing / Abonnements -->
            <div id="offres" class="grid lg:grid-cols-3 gap-8 items-start">
                <!-- Plan Mensuel -->
                <div class="bg-white rounded-3xl-custom p-8 text-slate-900 border border-slate-200 flex flex-col shadow-lg">
                    <h5 class="text-2xl font-bold mb-4">Abonnement Mensuel</h5>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-5xl font-black tracking-tight">49€</span>
                        <span class="text-slate-500 font-bold text-lg">/ mois</span>
                    </div>
                    <ul class="space-y-5 mb-10 text-base font-medium flex-grow text-slate-700">
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-green-600 w-6 h-6 flex-shrink-0"></i> Accès à tous les cours</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-green-600 w-6 h-6 flex-shrink-0"></i> Vidéos HD en illimité</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-green-600 w-6 h-6 flex-shrink-0"></i> Nouvelles vidéos mensuelles</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-green-600 w-6 h-6 flex-shrink-0"></i> Sans engagement</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="block text-center py-4 border-2 border-slate-900 rounded-xl-custom font-bold text-lg hover:bg-slate-900 hover:text-white transition-all">S'abonner</a>
                </div>

                <!-- Plan Annuel -->
                <div class="bg-blue-700 rounded-3xl-custom p-8 text-white shadow-2xl shadow-blue-900/20 relative lg:-mt-4 lg:mb-4 lg:py-12 flex flex-col z-10">
                    <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-white text-blue-700 px-6 py-2 rounded-full text-xs font-black uppercase shadow-lg tracking-widest border border-blue-100">Le Meilleur Choix</div>
                    <h5 class="text-2xl font-bold mb-4">Abonnement Annuel</h5>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-6xl font-black tracking-tight">400€</span>
                        <span class="text-blue-200 font-bold text-lg">/ an</span>
                    </div>
                    <ul class="space-y-5 mb-12 text-base font-medium flex-grow">
                        <li class="flex items-center gap-3"><div class="bg-white/20 p-1 rounded-full"><i data-lucide="check" class="text-white w-4 h-4"></i></div> Économisez 188€ par an</li>
                        <li class="flex items-center gap-3"><div class="bg-white/20 p-1 rounded-full"><i data-lucide="check" class="text-white w-4 h-4"></i></div> Accès total illimité</li>
                        <li class="flex items-center gap-3"><div class="bg-white/20 p-1 rounded-full"><i data-lucide="check" class="text-white w-4 h-4"></i></div> Support par ticket prioritaire</li>
                        <li class="flex items-center gap-3"><div class="bg-white/20 p-1 rounded-full"><i data-lucide="check" class="text-white w-4 h-4"></i></div> Accès forum privé</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="block text-center py-5 bg-white text-blue-700 rounded-xl-custom font-black text-lg hover:bg-blue-50 transition-all shadow-xl">Choisir l'annuel</a>
                </div>

                <!-- Plan VIP Lifetime -->
                <div class="bg-slate-900 rounded-3xl-custom p-8 text-white flex flex-col shadow-lg">
                    <h5 class="text-2xl font-bold mb-4 text-blue-400">Accès VIP Lifetime</h5>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-5xl font-black tracking-tight">900€</span>
                        <span class="text-slate-400 font-bold text-lg">/ à vie</span>
                    </div>
                    <ul class="space-y-5 mb-10 text-base font-medium flex-grow text-slate-300">
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-blue-400 w-6 h-6 flex-shrink-0"></i> Paiement unique définitif</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-blue-400 w-6 h-6 flex-shrink-0"></i> Tous les cours actuels & futurs</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-blue-400 w-6 h-6 flex-shrink-0"></i> Mises à jour logicielles prioritaires</li>
                        <li class="flex items-center gap-3"><i data-lucide="check" class="text-blue-400 w-6 h-6 flex-shrink-0"></i> Ligne de support directe</li>
                    </ul>
                    <a href="{{ route('store.index') }}" class="block text-center py-4 bg-blue-600 text-white rounded-xl-custom font-bold text-lg hover:bg-blue-500 transition-all shadow-lg shadow-blue-900/50">Devenir VIP</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="space-y-6 col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-700 p-2 rounded-lg text-white"><i data-lucide="code-2" class="w-6 h-6"></i></div>
                        <span class="text-2xl font-extrabold text-white tracking-tight">Windev<span class="text-blue-500">Expert</span></span>
                    </div>
                    <p class="text-lg max-w-md leading-relaxed text-slate-400">Éditeur de logiciels métiers spécialisés (ALMOHAMI, SAASCOM, YoussiManager) et plateforme de formation en ligne spécialisée en écosystème PC Soft.</p>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6 text-lg tracking-wide">Nos Solutions</h5>
                    <ul class="space-y-4 text-base font-medium">
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">ALMOHAMI Juridique</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">SAASCOM Gestion</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">YoussiManager Beauté</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6 text-lg tracking-wide">Formation</h5>
                    <ul class="space-y-4 text-base font-medium">
                        <li><a href="#offres" class="hover:text-white hover:translate-x-1 transition-all inline-block">Formules d'abonnement</a></li>
                        <li><a href="{{ route('courses.index') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Catalogue Vidéos</a></li>
                        <li><a href="{{ route('courses.index') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Espace Étudiant</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-12 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-6 text-sm font-medium">
                <p>&copy; 2025 WindevExpert. Tous droits réservés.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white transition-colors">Mentions Légales</a>
                    <a href="#" class="hover:text-white transition-colors">CGV / Licensing</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 20) { nav.classList.add('shadow-md', 'bg-white/95'); } 
            else { nav.classList.remove('shadow-md', 'bg-white/95'); }
        });
    </script>
</body>
</html>
