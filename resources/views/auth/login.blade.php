<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - WindevExpert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: radial-gradient(circle at top right, #f0f9ff 0%, #e0f2fe 50%, #f8fafc 100%);
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen hero-gradient flex flex-col justify-center py-12 sm:px-6 lg:px-8 text-slate-900">
    
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8 text-center">
        <a href="/" class="inline-flex items-center space-x-2 mb-6">
            <div class="bg-blue-600 p-2 rounded-lg">
                <i data-lucide="code-2" class="text-white w-6 h-6"></i>
            </div>
            <span class="text-2xl font-bold tracking-tight text-blue-900">Windev<span class="text-blue-600">Expert</span></span>
        </a>
        <h2 class="text-3xl font-black text-slate-900">
            Bon retour parmi nous
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Accédez à votre espace formation et vos licences
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-10 px-4 shadow-2xl shadow-blue-900/5 sm:rounded-[2rem] sm:px-10 border border-slate-100">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">
                        Adresse Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="h-5 w-5 text-slate-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="appearance-none block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-blue-600 sm:text-sm transition-all"
                            placeholder="vous@exemple.com">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-bold text-slate-700">
                            Mot de passe
                        </label>
                        @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Mot de passe oublié ?
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="h-5 w-5 text-slate-400"></i>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="appearance-none block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-blue-600 sm:text-sm transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-slate-600">
                        Se souvenir de moi
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all hover:shadow-blue-200 hover:-translate-y-0.5">
                        Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-slate-500">
                            Pas encore de compte ?
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('register') }}" class="w-full flex justify-center py-3 px-4 border border-slate-200 rounded-xl shadow-sm text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-200 transition-all">
                        Créer un nouveau compte
                    </a>
                </div>
            </div>
        </div>
        
        <p class="mt-8 text-center text-xs text-slate-400">
            &copy; 2025 WindevExpert. Tous droits réservés.
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
