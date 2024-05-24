<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['user'])) {
    echo "Vous devez être connecté pour rejoindre une équipe.";
    exit();
}

// Définir les informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer l'ID de l'utilisateur depuis la session
$user_id = $_SESSION['user'];

// Vérifier si l'équipe_id est bien envoyé via le formulaire
if (!isset($_POST['equipe_id'])) {
    echo "Erreur: Aucune équipe sélectionnée.";
    exit();
}

$equipe_id = $_POST['equipe_id']; // Assurez-vous que le nom du champ dans le formulaire correspond

// Validation et échappement des données
$user_id = mysqli_real_escape_string($conn, $user_id);
$equipe_id = mysqli_real_escape_string($conn, $equipe_id);

// Préparation de la requête pour vérifier l'inscription de l'utilisateur dans l'équipe
$query = "SELECT * FROM inscriptions WHERE user_id = '$user_id' AND equipe_id = '$equipe_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "Vous êtes déjà inscrit dans cette équipe.";
    exit();
}

// Préparation de la requête pour vérifier si l'équipe est complète
$query = "SELECT joueurs_actuels, joueurs_max FROM equipes WHERE id = '$equipe_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $equipe = $result->fetch_assoc();
    if ($equipe['joueurs_actuels'] >= $equipe['joueurs_max']) {
        echo "Cette équipe est complète.";
        exit();
    }
} else {
    echo "L'équipe n'existe pas.";
    exit();
}

// Inscription de l'utilisateur dans l'équipe
$query = "INSERT INTO inscriptions (user_id, equipe_id) VALUES ('$user_id', '$equipe_id')";
if ($conn->query($query) === TRUE) {
    // Mise à jour du nombre de joueurs actuels de l'équipe
    $query_update = "UPDATE equipes SET joueurs_actuels = joueurs_actuels + 1 WHERE id = '$equipe_id'";
    if ($conn->query($query_update) === TRUE) {
        echo "Vous avez rejoint l'équipe avec succès!";
    } else {
        echo "Erreur lors de la mise à jour du nombre de joueurs de l'équipe: " . $conn->error;
    }
} else {
    echo "Erreur lors de l'inscription dans l'équipe: " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
