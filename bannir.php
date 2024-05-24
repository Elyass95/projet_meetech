<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Traitement du formulaire de bannissement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pseudo'])) {
    // Récupérer le pseudo à bannir depuis le formulaire
    $pseudo = $_POST['pseudo'];

    // Validation supplémentaire si nécessaire

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

    // Préparer la requête SQL pour supprimer l'utilisateur de la table des utilisateurs
    $sql = "DELETE FROM utilisateurs WHERE pseudo = ?";

    // Préparer la déclaration SQL et lier les paramètres
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $pseudo);

    // Exécuter la requête
    if ($stmt->execute()) {
        $message = "L'utilisateur " . $pseudo . " a été banni avec succès.";
    } else {
        $error = "Une erreur est survenue lors du bannissement de l'utilisateur.";
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bannir Utilisateur</title>
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
        <h1 class="mb-4">Bannir Utilisateur</h1>
        <?php if(isset($message)) : ?>
            <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo de l'utilisateur à bannir :</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <button type="submit" class="btn btn-primary">Bannir</button>
        </form>
    </div>

    <!-- Liens JavaScript Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
