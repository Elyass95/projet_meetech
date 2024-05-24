<?php
session_start();

// Vérifie si les données sont envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données envoyées par AJAX
    $equipeSelectionnee = $_POST["equipeSelect"];
    $dateRencontre = $_POST["date"];
    $heureRencontre = $_POST["heure"];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = ""; // Mettez votre propre mot de passe si nécessaire
    $database = "projet";

    // Connexion
    $connexion = mysqli_connect($servername, $username, $password, $database);

    // Vérifie la connexion
    if (!$connexion) {
        die("La connexion à la base de données a échoué: " . mysqli_connect_error());
    }

    // Combine la date et l'heure en une seule valeur DATETIME
    $dateResa = $dateRencontre . ' ' . $heureRencontre;

    // Insère les données dans la table "reservations"
    $requeteInsertion = mysqli_query($connexion, "INSERT INTO reservations (equipe, date_resa) VALUES ('$equipeSelectionnee', '$dateResa')");

    // Vérifie si l'insertion a réussi
    if ($requeteInsertion) {
        echo "L'équipe a été réservée avec succès!";
    } else {
        echo "Erreur lors de la réservation de l'équipe: " . mysqli_error($connexion);
    }

    // Ferme la connexion à la base de données
    mysqli_close($connexion);
}
?>
