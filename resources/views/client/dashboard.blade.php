<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - WindevExpert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; font-style: normal; }
        * { font-style: normal !important; }
        .sidebar-link.active {
            background-color: #f1f5f9;
            color: #2563eb;
            border-right: 4px solid #2563eb;
        }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .progress-bar { transition: width 1s ease-in-out; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex relative">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-slate-200 hidden lg:flex flex-col sticky top-0 h-screen z-40">
        <div class="p-8">
            <div class="flex items-center space-x-2 mb-10">
                <div class="bg-blue-600 p-1.5 rounded-lg">
                    <i data-lucide="code-2" class="text-white w-5 h-5"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-blue-900">Windev<span class="text-blue-600">Expert</span></span>
            </div>

            <nav class="space-y-1">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4 mb-2">Principal</p>
                <button onclick="switchTab('overview')" class="sidebar-link active w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all group">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Vue d'ensemble
                </button>
                <button onclick="switchTab('formations')" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="play-circle" class="w-5 h-5"></i> Mes Formations
                </button>
                <button onclick="switchTab('projets')" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="briefcase" class="w-5 h-5"></i> Projets Dev
                </button>

                <div class="pt-6 pb-2">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4 mb-2">Boutique & Ressources</p>
                </div>
                <a href="{{ route('marketplace.index') }}" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i> Marketplace
                </a>
                <a href="{{ route('courses.index') }}" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="search" class="w-5 h-5"></i> Catalogue Cours
                </a>

                <div class="pt-6 pb-2">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4 mb-2">Paramètres</p>
                </div>
                <button onclick="switchTab('billing')" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="credit-card" class="w-5 h-5"></i> Abonnements
                </button>
                <button onclick="switchTab('profile')" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="user" class="w-5 h-5"></i> Mon Profil
                </button>
                <button onclick="switchTab('support')" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all group">
                    <i data-lucide="life-buoy" class="w-5 h-5"></i> Assistance
                </button>
            </nav>
        </div>

        <div class="mt-auto p-8 border-t border-slate-100">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-slate-400 font-medium uppercase tracking-tighter">Client Premium</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-xs font-bold text-rose-500 hover:text-rose-600 transition-colors uppercase tracking-widest w-full text-left">
                    <i data-lucide="log-out" class="w-4 h-4"></i> Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col min-h-screen z-10 relative lg:ml-64">
        
        <!-- Header -->
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-30">
            <h2 id="current-tab-title" class="text-lg font-black uppercase tracking-widest text-slate-400">Vue d'ensemble</h2>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-400 hover:text-blue-600 transition-colors relative">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                </button>
                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                <a href="{{ route('courses.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-100 flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i> Nouveau Cours
                </a>
            </div>
        </header>

        <!-- Dashboard Body -->
        <div class="p-8 max-w-7xl mx-auto w-full">
            
            <!-- SECTION : OVERVIEW -->
            <section id="overview" class="tab-content active space-y-8">
                <!-- Stats Grid -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-6">
                        <div class="bg-blue-100 p-4 rounded-2xl text-blue-600"><i data-lucide="book-open"></i></div>
                        <div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Formations Actives</p>
                            <p class="text-2xl font-black">03</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-6">
                        <div class="bg-indigo-100 p-4 rounded-2xl text-indigo-600"><i data-lucide="refresh-cw"></i></div>
                        <div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Projets en cours</p>
                            <p class="text-2xl font-black">01</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-6">
                        <div class="bg-emerald-100 p-4 rounded-2xl text-emerald-600"><i data-lucide="calendar"></i></div>
                        <div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Prochain Prélèvement</p>
                            <p class="text-2xl font-black">15 Janv.</p>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Derniers Cours -->
                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="p-8 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-black text-lg">Reprendre la formation</h3>
                            <button onclick="switchTab('formations')" class="text-blue-600 text-xs font-bold uppercase hover:underline">Voir tout</button>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-12 bg-slate-100 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=200" class="w-full h-full object-cover grayscale">
                                </div>
                                <div class="flex-grow">
                                    <p class="text-sm font-bold mb-1">Architecture ERP Multi-sites</p>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-blue-600 h-full progress-bar" style="width: 65%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-slate-400">65%</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-12 bg-slate-100 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&q=80&w=200" class="w-full h-full object-cover grayscale">
                                </div>
                                <div class="flex-grow">
                                    <p class="text-sm font-bold mb-1">Maîtrise du WLangage POO</p>
                                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-blue-600 h-full progress-bar" style="width: 20%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-slate-400">20%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Suivi de Projet -->
                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                        <div class="p-8 border-b border-slate-100">
                            <h3 class="font-black text-lg">Statut du Projet de Développement</h3>
                        </div>
                        <div class="p-8">
                            <div class="bg-blue-50 border border-blue-100 p-6 rounded-2xl mb-6">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm font-black text-blue-800 uppercase">Logiciel Gestion Immobilière</span>
                                    <span class="bg-blue-200 text-blue-800 text-[10px] px-2 py-0.5 rounded font-black uppercase">En Phase Test</span>
                                </div>
                                <p class="text-sm text-blue-600 font-medium mb-4 leading-relaxed">Nous finalisons la réplication HFSQL pour vos 5 agences. La livraison Beta est prévue pour lundi.</p>
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-600 border-2 border-white"></div>
                                    <div class="w-8 h-8 rounded-full bg-slate-300 border-2 border-white flex items-center justify-center text-[10px] font-bold">+2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION : FORMATIONS -->
            <section id="formations" class="tab-content space-y-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-black">Mes Formations en cours</h3>
                    <a href="{{ route('courses.index') }}" class="flex items-center gap-2 text-blue-600 font-bold text-sm hover:underline">
                        Explorer le catalogue complet <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card Formation 1 -->
                    <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden group hover:shadow-xl transition-all">
                        <div class="aspect-video bg-slate-100 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0">
                            <div class="absolute inset-0 bg-blue-900/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="bg-white p-3 rounded-full text-blue-600 shadow-xl"><i data-lucide="play" class="fill-current"></i></div>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-[10px] font-black text-blue-600 uppercase mb-2">Expert Windev</p>
                            <h4 class="font-black text-lg mb-4">Architecture ERP Multi-sites</h4>
                            <div class="flex justify-between items-center text-xs text-slate-400 font-bold">
                                <span>24 / 58 leçons</span>
                                <span>65%</span>
                            </div>
                            <div class="w-full bg-slate-100 h-2 rounded-full mt-2 overflow-hidden">
                                <div class="bg-blue-600 h-full" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION : PROJETS -->
            <section id="projets" class="tab-content space-y-6">
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 border-b border-slate-100">
                            <tr>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Nom du Projet</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Date Début</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Statut</th>
                                <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr>
                                <td class="px-8 py-6 font-bold">Logiciel Gestion Immobilière</td>
                                <td class="px-8 py-6 text-sm text-slate-500 font-medium">12/11/2024</td>
                                <td class="px-8 py-6">
                                    <span class="bg-indigo-100 text-indigo-700 text-[10px] px-3 py-1 rounded-full font-black uppercase">Phase Test</span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <button class="text-blue-600 font-bold text-sm hover:underline">Détails</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- SECTION : PROFILE (Gestion de Profil) -->
            <section id="profile" class="tab-content space-y-8">
                <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm p-8 md:p-12">
                    <div class="flex flex-col md:flex-row gap-12">
                        <div class="md:w-1/3 flex flex-col items-center space-y-6">
                            <div class="relative group">
                                <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-4xl font-black border-4 border-white shadow-xl">
                                    {{ substr(Auth::user()->name, 0, 2) }}
                                </div>
                                <button class="absolute bottom-0 right-0 bg-slate-900 text-white p-2 rounded-full shadow-lg hover:bg-blue-600 transition-all">
                                    <i data-lucide="camera" class="w-4 h-4"></i>
                                </button>
                            </div>
                            <div class="text-center">
                                <h4 class="text-xl font-black">{{ Auth::user()->name }}</h4>
                                <p class="text-sm text-slate-400 font-medium">Membre depuis {{ Auth::user()->created_at->format('F Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="md:w-2/3 space-y-8">
                            <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Nom complet</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Adresse Email</label>
                                    <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Téléphone</label>
                                    <input type="text" value="+33 6 12 34 56 78" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Pays</label>
                                    <input type="text" value="France" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                </div>
                                <div class="md:col-span-2 pt-4">
                                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-black hover:bg-blue-700 transition-all shadow-lg shadow-blue-100">
                                        Sauvegarder les modifications
                                    </button>
                                </div>
                            </form>

                            <div class="pt-8 border-t border-slate-100">
                                <h5 class="text-lg font-black mb-6">Sécurité</h5>
                                <form class="space-y-6 max-w-md">
                                    <div class="space-y-2">
                                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Ancien mot de passe</label>
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Nouveau mot de passe</label>
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all font-medium">
                                    </div>
                                    <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-xl font-black hover:bg-slate-800 transition-all">
                                        Mettre à jour le mot de passe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION : BILLING -->
            <section id="billing" class="tab-content space-y-8">
                <div class="bg-blue-600 rounded-[2.5rem] p-10 text-white shadow-2xl shadow-blue-200 flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="space-y-2">
                        <p class="text-blue-200 text-xs font-black uppercase tracking-widest">Votre Abonnement Actuel</p>
                        <h3 class="text-3xl font-black">Formule Expert - 49€ / mois</h3>
                        <p class="text-blue-100 font-medium opacity-80">Accès total à toutes les formations Windev, WebDev et Mobile.</p>
                    </div>
                    <button class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-black hover:bg-slate-100 transition-all whitespace-nowrap">Gérer via Stripe</button>
                </div>

                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">
                    <div class="p-8 border-b border-slate-100"><h3 class="font-black">Historique des Paiements</h3></div>
                    <div class="p-8 space-y-4">
                        <div class="flex justify-between items-center py-4 border-b border-slate-50">
                            <div class="flex items-center gap-4">
                                <div class="bg-slate-100 p-2 rounded-lg text-slate-400"><i data-lucide="file-text"></i></div>
                                <div class="flex flex-col">
                                    <span class="font-bold">Facture #WDX-9921</span>
                                    <span class="text-xs text-slate-400 font-medium">15 Décembre 2024</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <span class="font-black">49,00 €</span>
                                <button class="text-blue-600"><i data-lucide="download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION : SUPPORT -->
            <section id="support" class="tab-content space-y-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 space-y-6">
                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h3 class="font-black text-xl mb-6">Ouvrir un ticket d'assistance</h3>
                            <form class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Type</label>
                                        <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all">
                                            <option>Assistance Pédagogique (Cours)</option>
                                            <option>Support Technique (Projet Dev)</option>
                                            <option>Problème de Facturation</option>
                                        </select>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Priorité</label>
                                        <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all">
                                            <option>Normal</option>
                                            <option>Urgent</option>
                                            <option>Critique</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Sujet</label>
                                    <input type="text" placeholder="Résumé de votre demande" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all">
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-black text-slate-400 uppercase ml-1">Message</label>
                                    <textarea rows="4" placeholder="Décrivez votre problématique en détail..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-600 outline-none transition-all"></textarea>
                                </div>
                                <button class="w-full bg-slate-900 text-white py-4 rounded-xl font-black hover:bg-slate-800 transition-all shadow-lg">Envoyer le ticket</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                            <h4 class="font-black text-lg mb-4">Tickets récents</h4>
                            <div class="space-y-4">
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-[10px] font-black text-blue-600 uppercase">Support Dev</span>
                                        <span class="text-[10px] font-black text-emerald-600 uppercase tracking-tighter">Répondu</span>
                                    </div>
                                    <p class="text-sm font-bold truncate">Question sur la réplication...</p>
                                    <p class="text-[10px] text-slate-400 mt-2 font-medium">Il y a 2 jours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        lucide.createIcons();

        function switchTab(tabId) {
            // Update Tab Content
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            const targetTab = document.getElementById(tabId);
            if(targetTab) targetTab.classList.add('active');

            // Update Sidebar UI
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active', 'bg-slate-100', 'text-blue-600');
                link.classList.add('text-slate-500');
            });
            
            // Find the clicked button and set active
            const clickedBtn = Array.from(document.querySelectorAll('.sidebar-link')).find(btn => 
                btn.getAttribute('onclick').includes(tabId)
            );
            if (clickedBtn) {
                clickedBtn.classList.add('active');
            }

            // Update Header Title
            const titles = {
                'overview': "Vue d'ensemble",
                'formations': "Mes Formations",
                'projets': "Suivi de Projets",
                'billing': "Abonnements & Paiements",
                'support': "Assistance & Support",
                'profile': "Mon Profil"
            };
            document.getElementById('current-tab-title').innerText = titles[tabId] || "Espace Client";
        }
    </script>
</body>
</html>