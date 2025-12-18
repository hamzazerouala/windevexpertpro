🚀 SGI - Freelance & Formateur (Système de Gestion Intégrée)
Ce projet est une plateforme "Tout-en-un" conçue pour les développeurs freelances et formateurs. Elle permet de gérer à la fois une activité de prestation logicielle (licensing, clients, projets) et une activité pédagogique (LMS, vidéos sécurisées, abonnements).
🛠 Architecture & Stack Technique
Backend : Laravel 11 (PHP 8.2+)
Frontend : Livewire + Tailwind CSS (Single File Components)
Base de données : MySQL / PostgreSQL
Cache & Queues : Redis
Paiements & Billing : Laravel Cashier (Stripe)
Sécurité Admin : Authentification statique via .env (Zéro admin en base de données)
✨ Fonctionnalités Clés
💻 Gestion Logicielle & Freelance
Multi-sites & Multi-postes : Gestion hiérarchique des clients (Entreprise > Sites physiques > Postes de travail).
Licensing Avancé : Génération de clés UUID signées numériquement. Activation par ID machine unique.
Gestion de Projets : Suivi des tâches et des deadlines pour le développement sur mesure.
Facturation : Commandes et factures PDF automatiques.
🎓 Plateforme de Formation (LMS)
Cours & Vidéos : Gestion de modules, leçons et streaming vidéo sécurisé.
Sécurisation Vidéo : - Protocole HLS (segments cryptés).
Signed URLs (liens temporaires).
Watermarking dynamique (email de l'élève incrusté).
Quiz & Suivi : Évaluation par cours et barre de progression en temps réel.
Abonnements : Accès aux cours via packs individuels ou abonnements mensuels/annuels.
🔒 Sécurité & Accès
Portail Administrateur
L'accès administrateur est totalement dissocié de la table users pour une sécurité maximale :
Authentification : Comparaison via ADMIN_USER et ADMIN_PASS dans le .env.
Protection : Middleware IsSuperAdmin dédié.
IP Whitelisting : Optionnel (configurable via .env).
Portail Client (Dashboard)
Gestion autonome des licences (révocation de postes).
Suivi des cours et historique des paiements.
Système de tickets pour l'assistance technique.
🗺️ Plan d'exécution (Roadmap pour SOLO)
[ ] Phase 1 : Fondations
Configurer le Guard Admin Statique.
Créer les migrations (Clients, Sites, Workstations, Software).
[ ] Phase 2 : Commerce & Vitrine
Intégrer Stripe (Cashier).
Créer le site vitrine et le tunnel d'achat (Checkout).
[ ] Phase 3 : Licensing & API
Développer le service de génération/validation de licences.
Créer l'API sécurisée pour la vérification distante.
[ ] Phase 4 : Système LMS
Implémenter la structure des cours et le lecteur vidéo sécurisé.
Ajouter le système de Quiz et la logique d'abonnement.
[ ] Phase 5 : Dashboard Client & Support
Développer l'interface client Livewire.
Intégrer le système de tickets et l'historique de facturation.
📦 Installation (Développement)
# Cloner le dépôt
git clone https://github.com/hamzazerouala/windevexpertpro.git

# Installer les dépendances
composer install
npm install && npm run build

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Configurer les identifiants Admin dans le .env
ADMIN_USER=votre@email.com
ADMIN_PASS=votre_mot_de_passe_robuste


📄 Licence
Ce projet est privé et propriétaire. Toute reproduction ou distribution sans autorisation est interdite.
