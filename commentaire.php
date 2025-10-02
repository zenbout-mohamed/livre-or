<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['login'])) {
    header("Location: connexion.php");
    exit();
}

$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $commentaire = trim($_POST['commentaire'] ?? '');

    if (!empty($commentaire)) {
        $sqlUser = "SELECT id FROM utilisateurs WHERE login = ?";
        $stmtUser = $pdo->prepare($sqlUser);
        $stmtUser->execute([$_SESSION['login']]);
        $user = $stmtUser->fetch();

        if ($user) {
            $sql = "INSERT INTO commentaires (id_utilisateur, commentaire, date) VALUES (?, ?, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user['id'], $commentaire]);

            $success = "Votre commentaire a bien été ajouté !";
        } else {
            $error = "Utilisateur introuvable.";
        }
    } else {
        $error = "Veuillez écrire un commentaire.";
    }
}

include './assets/header.php';
?>

<h2 class="text-3xl font-bold mb-6">💬 Ajouter un commentaire</h2>

<?php if (!empty($success)): ?>
    <p class="text-green-600 font-semibold mb-4"><?= $success ?></p>
<?php elseif (!empty($error)): ?>
    <p class="text-red-600 font-semibold mb-4"><?= $error ?></p>
<?php endif; ?>

<form method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4 max-w-xl">
    <div>
        <label class="block font-semibold">Votre commentaire</label>
        <textarea name="commentaire" rows="5" class="w-full border rounded-lg px-3 py-2"></textarea>
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
        Publier
    </button>
</form>

<?php include './assets/footer.php'; ?>
