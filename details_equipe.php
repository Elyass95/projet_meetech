<?php
session_start();
require 'database.php';

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

$equipe = ""; // Initialise la variable $equipe
$membres = []; // Initialise la variable $membres

if (isset($_GET['equipe'])) {
    $equipe = $_GET['equipe'];

    // Récupérer les membres inscrits dans l'équipe
    $stmt = $conn->prepare("SELECT * FROM reservations WHERE equipe = ?");
    $stmt->bind_param("s", $equipe);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Vérifie si des membres sont trouvés
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $membres[] = $row['user'];
        }
    } else {
        echo "Aucun membre n'est inscrit dans cette équipe.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'équipe</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Détails de l'équipe <?php echo htmlspecialchars($equipe); ?></h1>
        <h2>Membres inscrits :</h2>
        <ul>
            <?php foreach ($membres as $membre) : ?>
                <li><?php echo htmlspecialchars($membre); ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php">Retour à l'accueil</a>
    </div>
</body>

</html>
