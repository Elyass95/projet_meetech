<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajoutez votre CSS personnalisé ici */
        .pseudo {
            font-size: 20px;
        }
        .btn-subscribe {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px;
        }
        .btn-details {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px;
        }
        .btn-message {
            background-color: #ffc107;
            color: #000;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px;
        }
        .btn-block {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px;
        }
        .btn-unblock {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px;
        }
        .already-subscribed {
            color: #28a745;
            margin-left: 10px;
        }
        .blocked-message {
            color: #dc3545;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Résultats de la recherche</h1>
        <div class="row">
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
                        // Afficher les utilisateurs avec un bouton "S'abonner", "Détails" et "Bloquer"
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-6">';
                            echo '<div class="card mb-3">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title pseudo">' . $row["pseudo"] . '</h5>';

                            // Afficher l'adresse e-mail associée au pseudo recherché
                            echo '<p>Email associé à ce pseudo : ' . $row["email"] . '</p>';

                            // Vérifie si l'utilisateur est déjà abonné à cet utilisateur
                            echo '<a href="sabonner.php?pseudo=' . $pseudo_selectionne . '" class="btn btn-subscribe">S\'abonner</a>';
                            
                            // Requête pour vérifier si les deux utilisateurs sont abonnés mutuellement
                            // Requête pour vérifier si les deux utilisateurs sont abonnés mutuellement
                            $sql_mutual_subscription = "SELECT * FROM abonnements WHERE abonne='$user_email' AND abonnement='$pseudo_selectionne'";
                            $result_mutual_subscription = $conn->query($sql_mutual_subscription);


                            if ($result_mutual_subscription->num_rows > 0) {
                                // Afficher le bouton "Message Privé" seulement si les deux utilisateurs sont abonnés mutuellement
                                echo '<a href="envoi_message.php" class="btn btn-message">Message Privé</a>';
                            }

                            // Vérifie si l'utilisateur a bloqué l'autre utilisateur
                            echo '<a href="bloquer_utilisateur.php?pseudo=' . $pseudo_selectionne . '" class="btn btn-block">Bloquer Utilisateur</a>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">';
                        echo "Aucun utilisateur trouvé avec le pseudo $pseudo_selectionne";
                        echo '</div>';
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
    </div>
</body>

</html>
