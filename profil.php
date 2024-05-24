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

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $pseudo = $_POST['pseudo'];
        $profession = $_POST['profession'];
        $lieu_residence = $_POST['lieu_residence'];
        $situation_amoureuse = $_POST['situation_amoureuse'];
        $description_physique = $_POST['description_physique'];
        $infos_personnelles = $_POST['infos_personnelles'];

        // Requête pour mettre à jour les informations de l'utilisateur
        $sql_update = "UPDATE utilisateurs SET pseudo='$pseudo', profession='$profession', lieu_de_residence='$lieu_residence', situation_amoureuse='$situation_amoureuse', description_physique='$description_physique', informations_personnelles='$infos_personnelles' WHERE email='$user_email'";

        if ($conn->query($sql_update) === TRUE) {
            echo "Les modifications ont été enregistrées avec succès.";
        } else {
            echo "Erreur lors de la mise à jour des informations: " . $conn->error;
        }
    }

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE email = '$user_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les informations de l'utilisateur
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre fichier CSS pour le style personnalisé -->
</head>

<body>
    <div class="container">
        <h1 class="my-4">Profil de <?php echo $row["pseudo"]; ?></h1>
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
        <!-- Formulaire pour modifier les informations -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-4">
            <h5>Modifier les informations</h5>
            <div class="form-group">
                <label for="pseudo">Pseudonyme:</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?php echo $row["pseudo"]; ?>">
            </div>
            <div class="form-group">
                <label for="profession">Profession:</label>
                <input type="text" id="profession" name="profession" class="form-control" value="<?php echo $row["profession"]; ?>">
            </div>
            <div class="form-group">
                <label for="lieu_residence">Lieu de résidence:</label>
                <input type="text" id="lieu_residence" name="lieu_residence" class="form-control" value="<?php echo $row["lieu_de_residence"]; ?>">
            </div>
            <div class="form-group">
                <label for="situation_amoureuse">Situation amoureuse et familiale:</label>
                <input type="text" id="situation_amoureuse" name="situation_amoureuse" class="form-control" value="<?php echo $row["situation_amoureuse"]; ?>">
            </div>
            <div class="form-group">
                <label for="description_physique">Description physique:</label>
                <textarea id="description_physique" name="description_physique" class="form-control"><?php echo $row["description_physique"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="infos_personnelles">Informations personnelles:</label>
                <textarea id="infos_personnelles" name="infos_personnelles" class="form-control"><?php echo $row["informations_personnelles"]; ?></textarea>
            </div>
            <!-- Ajoutez d'autres champs en fonction de votre base de données -->
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
</body>

</html>
<?php
    } else {
        echo "Aucun utilisateur trouvé avec l'email $user_email";
    }

    // Fermer la connexion
    $conn->close();
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: connexion.php");
    exit;
}
?>
