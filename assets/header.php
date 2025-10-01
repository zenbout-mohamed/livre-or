<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Livre d'Or</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-indigo-600">📖 Livre d'Or</h1>
            <nav class="space-x-6">
                <a href="index.php" class="text-gray-700 hover:text-indigo-600 transition">Accueil</a>
                <a href="livre-or.php" class="text-gray-700 hover:text-indigo-600 transition">Livre d’or</a>
                <?php if (isset($_SESSION['login'])): ?>
                    <a href="commentaire.php" class="text-gray-700 hover:text-indigo-600 transition">Ajouter</a>
                    <a href="profil.php" class="text-gray-700 hover:text-indigo-600 transition">Profil</a>
                    <a href="logout.php" class="text-red-500 hover:text-red-700 font-semibold">Déconnexion</a>
                <?php else: ?>
                    <a href="inscription.php" class="bg-indigo-600 text-white px-3 py-1.5 rounded-lg shadow hover:bg-indigo-700 transition">Inscription</a>
                    <a href="connexion.php" class="border border-indigo-600 text-indigo-600 px-3 py-1.5 rounded-lg hover:bg-indigo-50 transition">Connexion</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="max-w-5xl mx-auto px-6 py-10">