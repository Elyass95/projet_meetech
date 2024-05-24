<?php
session_start();

if(isset($_SESSION['user'])) {
    // Récupérer l'utilisateur connecté depuis la session
    $abonne = $_SESSION['user'];

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pseudo'])) {
        // Récupérer le pseudo de l'utilisateur auquel on veut s'abonner depuis l'URL
        $abonnement = $_GET['pseudo'];

        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet";

        // Création de la connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée: " . $conn->connect_error);
        }

        // Vérifier si l'utilisateur est déjà abonné à cet utilisateur
        $check_subscription_query = "SELECT * FROM abonnements WHERE abonne = '$abonne' AND abonnement = '$abonnement'";
        $check_subscription_result = $conn->query($check_subscription_query);

        if ($check_subscription_result->num_rows == 0) {
            // Ajouter l'abonnement à la base de données
            $insert_subscription_query = "INSERT INTO abonnements (abonne, abonnement) VALUES ('$abonne', '$abonnement')";

            if ($conn->query($insert_subscription_query) === TRUE) {
                echo "Vous êtes maintenant abonné à $abonnement";
            } else {
                echo "Erreur lors de l'abonnement: " . $conn->error;
            }
        } else {
            echo "Vous êtes déjà abonné à $abonnement";
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "Erreur: Paramètres manquants";
    }
} else {
    echo "Erreur: Utilisateur non connecté";
}
?>
