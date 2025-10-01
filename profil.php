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

<h2 class="text-2xl font-bold text-gray-800 mb-6">Mon profil</h2>

<form action="" method="POST" class="space-y-4 max-w-md mx-auto bg-white shadow p-6 rounded-lg">
    <label class="block">
        <span class="text-gray-700">Login</span>
        <input type="text" name="login" value="<?= htmlspecialchars($_SESSION['login']) ?>"
            class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500">
    </label>
    <label class="block">
        <span class="text-gray-700">Nouveau mot de passe</span>
        <input type="password" name="password"
            class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500">
    </label>
    <button type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Mettre à jour</button>
</form>

<?php include 'includes/footer.php'; ?>
