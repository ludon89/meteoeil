# Météœil

Une application web réalisée avec Laravel qui permet aux utilisateurs de poster et partager des photos et observations météo.

Ceci est le "projet de fin d'étude" de ma formation de développeur web et web mobile dispensée par [Simplon.co](https://simplon.co/). J'ai présenté ce projet devant un jury pour l'obtention de mon titre professionnel le 04/09/2023.

## Lancer ce projet Laravel en local

- Créez une base de données
- Clonez ce repo
- Renommez `.env.example` en `.env` et remplissez les informations relatives à votre base de données (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.)
- Ouvrez une fenêtre de terminal à la racine de votre projet
- Entrez `composer install`
- Entrez `npm install`
- Entrez `php artisan key:generate`
- Entrez `php artisan storage:link` pour créer le lien symbolique vers le dossier contenant les images uploadées par l'utilisateur
- Entrez `php artisan migrate` pour créer les tables de données
- Entrez `php artisan db:seed` pour lancer les seeders
- Entrez `php artisan serve`
- Entrez `npm run dev`
