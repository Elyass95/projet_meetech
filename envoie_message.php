<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Messages</title>
    <!-- Inclusion de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        .alert {
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert i {
            margin-right: 10px;
        }

        .alert button.close {
            padding: 0;
            background: transparent;
            border: 0;
            position: relative;
            top: -2px;
        }
    </style>
</head>
<body>

<?php
if(isset($_SESSION['user'])) {
    // Récupérer l'utilisateur connecté depuis la session
    $emetteur = $_SESSION['user'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['destinataire']) && isset($_POST['message'])) {
        // Récupérer le destinataire et le message envoyés depuis le formulaire
        $destinataire = $_POST['destinataire'];
        $message = $_POST['message'];

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

        // Insérer le message dans la base de données
        $insert_message_query = "INSERT INTO messages (pseudo_emetteur, pseudo_destinataire, contenu) VALUES ('$emetteur', '$destinataire', '$message')";

        if ($conn->query($insert_message_query) === TRUE) {
            // Afficher un message de succès avec Bootstrap et styles personnalisés
            echo '<div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    Message envoyé avec succès à ' . $destinataire . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        } else {
            // Afficher un message d'erreur avec Bootstrap et styles personnalisés
            echo '<div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Erreur lors de l\'envoi du message: ' . $conn->error . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }

        // Fermer la connexion
        $conn->close();
    }
} else {
    // Afficher un message d'erreur avec Bootstrap et styles personnalisés
    echo '<div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            Erreur: Utilisateur non connecté
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}
?>

<!-- Inclusion de Bootstrap JavaScript pour --->
 fonctionnalités des alertes -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
