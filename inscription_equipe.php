<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['equipeSelect'])) {
    $equipeSelectionnee = $_POST['equipeSelect'];
    
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = ""; // Assurez-vous de mettre votre propre mot de passe si nécessaire
    $database = "projet";

    // Connexion
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Vérifier la connexion
    if (!$conn) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    $user_pseudo = $_SESSION['user']; // Pseudo de l'utilisateur connecté

    // Mettre à jour la colonne "pseudo" avec le pseudo de l'utilisateur et l'équipe sélectionnée
    $sql_update_equipe = "UPDATE equipes SET pseudo='$user_pseudo' WHERE num_equipe='$equipeSelectionnee'";
    $result_update_equipe = mysqli_query($conn, $sql_update_equipe);

    if ($result_update_equipe) {
        echo "Inscription réussie. Vous avez rejoint l'équipe.";
    } else {
        echo "Erreur lors de l'inscription à l'équipe : " . mysqli_error($conn);
    }

    // Fermer la connexion
    mysqli_close($conn);
}
?>
