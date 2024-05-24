<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if(isset($_SESSION['user'])) {
    // Récupérez les informations de l'utilisateur connecté depuis la session
    $user_email = $_SESSION['user'];

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

    // Vérifier si le pseudo a été sélectionné
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pseudo'])) {
        // Récupérer le pseudo sélectionné depuis l'URL
        $pseudo_selectionne = $_GET['pseudo'];

        // Requête pour récupérer les informations de l'utilisateur sélectionné
        $sql = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo_selectionne'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher les informations de l'utilisateur
            $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre fichier CSS pour le style personnalisé -->
</head>

<body>
    <div class="container">
        <h1 class="my-4">Détails du Profil de <?php echo $row["pseudo"]; ?></h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informations publiques</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Pseudonyme: </strong><?php echo $row["pseudo"]; ?></li>
                    <li class="list-group-item"><strong>Sexe: </strong><?php echo $row["sexe"]; ?></li>
                    <li class="list-group-item"><strong>Date de naissance: </strong><?php echo $row["date_de_naissance"]; ?></li>
                    <li class="list-group-item"><strong>Profession: </strong><?php echo $row["profession"]; ?></li>
                    <li class="list-group-item"><strong>Lieu de résidence: </strong><?php echo $row["lieu_de_residence"]; ?></li>
                    <li class="list-group-item"><strong>Situation amoureuse et familiale: </strong><?php echo $row["situation_amoureuse"]; ?></li>
                    <li class="list-group-item"><strong>Description physique: </strong><?php echo $row["description_physique"]; ?></li>
                    <li class="list-group-item"><strong>Informations personnelles: </strong><?php echo $row["informations_personnelles"]; ?></li>
                    <!-- Ajoutez d'autres champs en fonction de votre base de données -->
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
<?php
        } else {
            echo "Aucun utilisateur trouvé avec le pseudo $pseudo_selectionne";
        }
    }

    // Fermer la connexion
    $conn->close();
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: connexion.php");
    exit;
}
?>
