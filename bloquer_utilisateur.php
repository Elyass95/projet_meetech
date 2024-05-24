<?php
session_start();

if(isset($_SESSION['user'])) {
    // Récupérez l'utilisateur connecté depuis la session
    $user_email = $_SESSION['user'];

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pseudo'])) {
        // Récupérer le pseudo de l'utilisateur à bloquer depuis l'URL
        $pseudo_a_bloquer = $_GET['pseudo'];

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

        // Vérifier si l'utilisateur à bloquer existe dans la base de données
        $check_user_query = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo_a_bloquer'";
        $check_user_result = $conn->query($check_user_query);

        if ($check_user_result->num_rows > 0) {
            // Exécuter la requête pour bloquer l'utilisateur dans la base de données
            $block_user_query = "INSERT INTO blocages (bloqueur, utilisateur_bloque) VALUES ('$user_email', '$pseudo_a_bloquer')";

            if ($conn->query($block_user_query) === TRUE) {
                echo "Utilisateur bloqué avec succès: $pseudo_a_bloquer";
            } else {
                echo "Erreur lors du blocage de l'utilisateur: " . $conn->error;
            }
        } else {
            echo "L'utilisateur à bloquer n'existe pas: $pseudo_a_bloquer";
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "Erreur: Données manquantes";
    }
} else {
    echo "Erreur: Utilisateur non connecté";
}
?>
