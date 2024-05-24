<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les messages signalés depuis la base de données
$sql = "SELECT * FROM signalements_messages";
$result = $conn->query($sql);

// Initialiser un tableau pour stocker les messages signalés
$messages_signalés = [];

if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while ($row = $result->fetch_assoc()) {
        // Ajouter le message signalé au tableau
        $messages_signalés[] = $row;
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Messages Signalés</title>
    <!-- Liens CSS Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Messages Signalés</h1>
        <?php if (count($messages_signalés) > 0) : ?>
            <div class="row">
                <?php foreach ($messages_signalés as $message) : ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $message['motif']; ?></h5>
                                <p class="card-text"><?php echo $message['details']; ?></p>
                                <p class="card-text"><small class="text-muted">Signalé le <?php echo $message['created_at']; ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info" role="alert">Aucun message signalé pour le moment.</div>
        <?php endif; ?>
    </div>

    <!-- Liens JavaScript Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
