<?php
// Permet de recevoir les requêtes JS (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// On récupère l'URL demandée (ex: /backend/auth/login.php)
$request = $_SERVER['REQUEST_URI'];

// On retire les paramètres de requêtes (?t=12345...) pour ne garder que le chemin du fichier
$path = parse_url($request, PHP_URL_PATH);

// Sécurité : On vérifie que la requête demande bien quelque chose dans le dossier backend
if (strpos($path, '/backend/') === 0) {
    // On calcule le chemin réel du fichier sur le serveur Azure
    $file = __DIR__ . $path;

    if (file_exists($file)) {
        include_once $file;
        exit;
    }
}

// Si on arrive ici, c'est que ce n'est pas du PHP, on laisse Azure gérer le HTML statique
return false;