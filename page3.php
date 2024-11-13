<?php
session_start();

$logoutSuccess = false;

// Si l'utilisateur confirme la déconnexion
if (isset($_POST['confirm'])) {
    session_unset();
    session_destroy();
    $logoutSuccess = true; // Variable pour afficher le message de succès
}

// Redirige vers la page d'accueil si la déconnexion est réussie après 5 secondes
if ($logoutSuccess) {
    header("Refresh:5; url=page1.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Déconnexion</title>
    <style>
        /* Styles de base */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f9f9f9; }
        .confirmation-box { text-align: center; background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; }
        h1 { font-size: 1.8rem; color: #333; margin-bottom: 1rem; }
        p { font-size: 1rem; color: #666; margin-bottom: 1.5rem; }
        .buttons { display: flex; gap: 1rem; justify-content: center; }
        button { padding: 0.5rem 1.5rem; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; font-size: 1rem; }
        .confirm-btn { background-color: #ffcc00; color: #333; }
        .cancel-btn { background-color: #ddd; color: #333; }
        button:hover { opacity: 0.9; }

        /* Animation de chargement */
        #loading-spinner { display: none; margin-top: 1.5rem; border: 6px solid #f3f3f3; border-top: 6px solid #ffcc00; border-radius: 50%; width: 60px; height: 60px; animation: spin 2s linear infinite; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Message de déconnexion réussie */
        .logout-success { display: none; color: green; font-size: 1.2rem; margin-top: 1.5rem; }
    </style>
    <script>
        function showLoading() {
            document.getElementById('loading-spinner').style.display = 'block';
        }

        function showLogoutSuccess() {
            document.getElementById('loading-spinner').style.display = 'none';
            document.getElementById('logout-success').style.display = 'block';
        }

        // Affiche le message de déconnexion réussie si la variable PHP $logoutSuccess est vraie
        <?php if ($logoutSuccess) : ?>
            setTimeout(showLogoutSuccess, 2000);
        <?php endif; ?>

        // Fonction pour rediriger l'utilisateur si l'annulation est choisie
        function cancelLogout() {
            window.location.href = "page1.php"; // Remplacez par la page souhaitée
        }
    </script>
</head>
<body>
    <div class="confirmation-box">
        <h1>Voulez-vous vous déconnecter ?</h1>
        <p>Veuillez confirmer si vous souhaitez terminer votre session actuelle.</p>
        <form method="POST" onsubmit="showLoading()">
            <div class="buttons">
                <button type="submit" name="confirm" class="confirm-btn">Oui, déconnectez-moi</button>
                <button type="button" onclick="cancelLogout()" class="cancel-btn">Annuler</button>
            </div>
        </form>
        <div id="loading-spinner"></div>
        <?php if ($logoutSuccess): ?>
            <div id="logout-success" class="logout-success">Déconnexion réussie ! Vous serez redirigé sous peu.</div>
        <?php endif; ?>
    </div>
</body>
</html>
