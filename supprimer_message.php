<?php
// Vérifier si le formulaire a été soumis et si l'identifiant du message à supprimer est présent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message_id'])) {
    // Récupérer l'identifiant du message à supprimer
    $message_id = $_POST['message_id'];

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

    // Requête pour supprimer le message de la base de données
    $sql = "DELETE FROM messages WHERE id = $message_id";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page précédente après la suppression
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    } else {
        echo "Erreur lors de la suppression du message: " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
} else {
    // Redirection vers la page précédente si l'identifiant du message à supprimer n'est pas présent
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}
?>
