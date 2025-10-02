<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"]=== "POST") {
   $login = $_POST['login'];
   $password =$_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['login']);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];

        header("Location: index.php");
        exit();
    }else{
        $error ="E-mail ou mot de passe incorrect.";
    }

}


include './assets/header.php';
?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <main class="bg-white shadow-xl rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-indigo-600 mb-6">Créer un compte :</h1>

        <?php if (!empty($error)): ?>
            <p class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4"><?= $error ?></p>
        <?php endif; ?>

        <form method="post" class="space-y-4">
            <input type="text" name="login" placeholder="Nom d'utilisateur" required 
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">

            <input type="password" name="password" placeholder="Mot de passe" required 
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">

            <input type="password" name="confirm" placeholder="Confirmer le mot de passe" required 
            class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">

            <button type="submit"class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                S'inscrire
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600 text-sm">
            Déjà inscrit ? 
            <a href="connexion.php" class="text-indigo-600 font-semibold hover:underline">Se connecter</a>
        </p>
    </div>

</body>
