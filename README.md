# Météœil

<sup>(English below)</sup>

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

---

Météœil/Weathereye is a web app that allows users to post and share weather observations and pictures.

This is the "graduation project" for a web development training program I followed at [Simplon.co](https://simplon.co/). I presented this project in front a jury to obtain my professional certificate on Sep 4 2023.

## Run this Laravel project locally

- Create a database
- Clone this repo
- Rename `.env.example` to `.env` and fill in your database information (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.)
- Open a terminal window at the root of your project
- Run `composer install`
- Run `npm install`
- Run `php artisan key:generate`
- Run `php artisan storage:link` to create a symbolic link to the directory where user uploaded pictures are stored
- Run `php artisan migrate` to create tables
- Run `php artisan db:seed` to run seeders
- Run `php artisan serve`
- Run `npm run dev`
