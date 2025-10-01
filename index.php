<?php include './assets/header.php'; ?>

<section class="text-center space-y-6">
  <h2 class="text-4xl font-bold text-gray-800">Bienvenue sur le <span class="text-indigo-600">Livre d'Or</span></h2>
  <p class="text-lg text-gray-500">Partagez vos messages et découvrez ceux des autres utilisateurs</p>
</section>

<div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
  <?php if (isset($_SESSION['login'])): ?>
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Bonjour <?= htmlspecialchars($_SESSION['login']); ?></h3>
      <a href="commentaire.php" class="block bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition mb-2">Ajouter un commentaire</a>
      <a href="livre-or.php" class="block border border-indigo-600 text-indigo-600 py-2 px-4 rounded-lg hover:bg-indigo-50 transition">Voir le livre d’or</a>
    </div>
  <?php else: ?>
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Vous n'êtes pas connecté</h3>
      <a href="inscription.php" class="block bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition mb-2">Créer un compte</a>
      <a href="connexion.php" class="block border border-gray-400 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-100 transition">Se connecter</a>
    </div>
  <?php endif; ?>

  <div class="bg-white rounded-xl shadow p-6 text-center">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Derniers commentaires</h3>
    <p class="text-gray-500">Consultez les messages les plus récents dans le livre d’or.</p>
    <a href="livre-or.php" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">Voir les commentaires</a>
  </div>
</div>

<?php include './assets/footer.php'; ?>
