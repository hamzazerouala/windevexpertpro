<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique - SGI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg mb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="font-bold text-xl text-blue-600">SGI Store</span>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900">Mon Compte</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Connexion</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Inscription</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Nos Offres
            </h2>
            <p class="mt-4 text-xl text-gray-500">
                Choisissez le plan qui correspond à vos besoins.
            </p>
        </div>

        <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-2">
            @foreach($products as $product)
            <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200 bg-white">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">{{ $product['name'] }}</h2>
                    <p class="mt-4">
                        <span class="text-4xl font-extrabold text-gray-900">{{ $product['price'] }}€</span>
                        <span class="text-base font-medium text-gray-500">/mois</span>
                    </p>
                    <p class="mt-4 text-sm text-gray-500">{{ $product['description'] }}</p>
                    <a href="{{ route('store.checkout', $product['id']) }}" class="mt-8 block w-full bg-blue-600 border border-transparent rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-blue-700">
                        S'abonner
                    </a>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">Inclus</h3>
                    <ul class="mt-6 space-y-4">
                        @foreach($product['features'] as $feature)
                        <li class="flex space-x-3">
                            <!-- Heroicon name: solid/check -->
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-500">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
