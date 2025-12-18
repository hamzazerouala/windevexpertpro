<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // Mock products for now. In a real app, these would come from the database or Stripe.
        $products = [
            [
                'id' => 'prod_freelance_monthly',
                'name' => 'Abonnement Freelance (Mensuel)',
                'price' => 29.99,
                'description' => 'Accès complet aux outils de gestion freelance.',
                'features' => ['Gestion Clients', 'Facturation Illimitée', 'Support Prioritaire']
            ],
            [
                'id' => 'prod_freelance_yearly',
                'name' => 'Abonnement Freelance (Annuel)',
                'price' => 299.99,
                'description' => 'Accès complet avec 2 mois offerts.',
                'features' => ['Gestion Clients', 'Facturation Illimitée', 'Support Prioritaire', '2 Mois offerts']
            ]
        ];

        return view('store.index', compact('products'));
    }

    public function checkout($priceId)
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Create a checkout session (simplified for now)
        return $user->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('store.index'),
            ]);
    }
}
