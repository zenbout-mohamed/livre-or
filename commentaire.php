<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: connexion.php");
    exit();
}

include 'includes/header.php'; 
?>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un commentaire</h2>

<form action="" method="POST" class="space-y-4 max-w-md mx-auto bg-white shadow p-6 rounded-lg">
    <textarea name="commentaire" rows="5" required
        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500"></textarea>
    <button type="submit"
        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Publier</button>
</form>

<?php include 'includes/footer.php'; ?>
