<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['login'])) {
    header("Location: connexion.php");
    exit();
}

$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $new_login = $_POST['login'] ?? '';
    $new_password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (!empty($new_login) && !empty($new_password) && !empty($confirm)) {
        if ($new_password === $confirm) {
            $hash = password_hash($new_password, PASSWORD_DEFAULT);

            $sql = "UPDATE utilisateurs SET login = ?, password = ? WHERE login = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$new_login, $hash, $_SESSION['login']]);

            
            $_SESSION['login'] = $new_login;
            $success = "Profil mis à jour avec succès.";
        } else {
            $error = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

include './assets/header.php';
?>

<h2 class="text-3xl font-bold mb-6">👤 Mon profil</h2>

<?php if (!empty($success)): ?>
    <p class="text-green-600 font-semibold mb-4"><?= $success ?></p>
<?php elseif (!empty($error)): ?>
    <p class="text-red-600 font-semibold mb-4"><?= $error ?></p>
<?php endif; ?>

<form method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4 max-w-md">
    <div>
        <label class="block font-semibold">Login</label>
        <input type="text" name="login" value="<?= htmlspecialchars($_SESSION['login']) ?>" class="w-full border rounded-lg px-3 py-2">
    </div>
    <div>
        <label class="block font-semibold">Nouveau mot de passe</label>
        <input type="password" name="password" class="w-full border rounded-lg px-3 py-2">
    </div>
    <div>
        <label class="block font-semibold">Confirmer le mot de passe</label>
        <input type="password" name="confirm" class="w-full border rounded-lg px-3 py-2">
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
        Mettre à jour
    </button>
</form>

<?php include './assets/footer.php'; ?>
