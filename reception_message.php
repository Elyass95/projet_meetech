<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Boîte de réception</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Boîte de réception</h1>
        <div class="row">
            <?php
            session_start();

            // Vérifiez si l'utilisateur est connecté
            if(isset($_SESSION['user'])) {
                // Récupérez le pseudo de l'utilisateur connecté depuis la session
                $destinataire = $_SESSION['user'];

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

                // Requête pour récupérer les messages reçus par l'utilisateur connecté
                $sql = "SELECT pseudo_emetteur, contenu, date_envoi FROM messages WHERE pseudo_destinataire = '$destinataire' ORDER BY date_envoi DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher les messages reçus
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <strong>De: </strong><?php echo $row["pseudo_emetteur"]; ?>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row["contenu"]; ?></p>
                                    <p class="card-text"><small class="text-muted">Envoyé le: <?php echo $row["date_envoi"]; ?></small></p>
                                </div>
                            </div>
                        </div>
                        <?php
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Bouton pour voir les messages -->
                <a href="boite_reception.php" class="btn btn-primary">Voir les messages</a>
            </div>
        </div>
    </div>
</body>

</html>
