<?php
session_start(); // Démarrez la session

// Vérifiez si l'utilisateur est connecté
if(isset($_SESSION['user'])) {
    // Détruisez la session
    session_destroy();
    // Redirigez l'utilisateur vers la page d'accueil ou une autre page après la déconnexion
    header("Location: index.html");
    exit; // Assurez-vous de terminer le script après la redirection
} else {
    // Si l'utilisateur n'est pas connecté, vous pouvez rediriger vers la page d'accueil ou afficher un message d'erreur
    echo "Vous n'êtes pas connecté.";
}
?>
