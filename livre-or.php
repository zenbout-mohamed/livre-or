<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php'; 

$sql = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC";

$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

include './assets/header.php';
?>

<h2 class="text-2xl font-bold text-gray-800 mb-6">Livre d'Or</h2>

<div class="space-y-4">
    <?php foreach ($commentaires as $comm): ?>
        <div class="bg-white shadow rounded-lg p-4">
            <p class="text-gray-700"><?= htmlspecialchars($comm['commentaire']) ?></p>
            <p class="text-sm text-gray-500 mt-2">
                Posté le <?= date("d/m/Y H:i", strtotime($comm['date'])) ?> par 
                <span class="font-semibold"><?= htmlspecialchars($comm['login']) ?></span>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<?php include './assets/footer.php'; ?>