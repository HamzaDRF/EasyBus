
<?php
session_start();

// Vérification de la connexion
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "<h2>Bienvenue, " . htmlspecialchars($_SESSION['username']) . "!</h2>";
    header("Location: page2.php");
    exit();
}

// Gestion de l'envoi des formulaires
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = '';

    // Utilisateurs enregistrés en mémoire (cette liste est temporaire et ne sera pas conservée après fermeture du navigateur)
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    // Connexion
    if (isset($_POST['login'])) {
        if (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username] === $password) {
            // Définir les variables de session pour la connexion
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: page2.php");
            exit();
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }

    // Création de compte
    if (isset($_POST['register'])) {
        if (!isset($_SESSION['users'][$username])) {
            // Ajouter le nouvel utilisateur en mémoire de session
            $_SESSION['users'][$username] = $password;

            // Connexion automatique après la création du compte
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: page2.php");
            exit();
        } else {
            $error = "Le nom d'utilisateur existe déjà. Veuillez choisir un autre nom.";
        }
    }
}

// Déconnexion
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion et Création de Compte</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">      
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" action="">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="username" placeholder="User name" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="register">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form method="POST" action="">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" placeholder="User name" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="login">Login</button>
            </form>
        </div>
</div>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

</body>
</html>