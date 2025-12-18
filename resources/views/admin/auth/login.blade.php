<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - WindevExpert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .admin-gradient {
            background: radial-gradient(circle at top right, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%);
        }
    </style>
</head>
<body class="bg-slate-200 min-h-screen admin-gradient flex flex-col justify-center py-12 sm:px-6 lg:px-8 text-slate-900">
    
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8 text-center">
        <div class="inline-flex items-center space-x-2 mb-6">
            <div class="bg-slate-800 p-2 rounded-lg">
                <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
            </div>
            <span class="text-2xl font-bold tracking-tight text-slate-900">Windev<span class="text-slate-600">Expert</span></span>
        </div>
        <h2 class="text-3xl font-black text-slate-900">
            Administration
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Accès sécurisé réservé aux administrateurs
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-10 px-4 shadow-2xl shadow-slate-900/10 sm:rounded-[2rem] sm:px-10 border border-slate-200">
            
            @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm flex items-center gap-2" role="alert">
                <i data-lucide="alert-circle" class="w-5 h-5"></i>
                <span class="font-medium">{{ $errors->first() }}</span>
            </div>
            @endif

            <form class="space-y-6" action="{{ route('admin.login') }}" method="POST">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">
                        Email Administrateur
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="h-5 w-5 text-slate-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required autofocus
                            class="appearance-none block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-slate-100 focus:border-slate-500 sm:text-sm transition-all"
                            placeholder="admin@windevexpert.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="h-5 w-5 text-slate-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-slate-100 focus:border-slate-500 sm:text-sm transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-slate-800 hover:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all hover:shadow-slate-400 hover:-translate-y-0.5">
                        Connexion Administration
                    </button>
                </div>
            </form>
        </div>
        
        <p class="mt-8 text-center text-xs text-slate-500">
            &copy; 2025 WindevExpert. Système de gestion interne.
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
