<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Boîte de réception - Administrateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Boîte de réception - Administrateur</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Boîte de réception de l'administrateur -->
                <h3>Boîte de réception de l'administrateur</h3>
                <?php
                session_start();

                // Vérifiez si l'utilisateur est connecté
                if(isset($_SESSION['user'])) {
                    // Récupérez le pseudo de l'utilisateur connecté depuis la session
                    $admin = $_SESSION['user'];

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

                    // Requête pour récupérer les messages reçus par l'administrateur
                    $sql = "SELECT id, pseudo_emetteur, contenu, date_envoi FROM messages WHERE pseudo_destinataire = '$admin' ORDER BY date_envoi DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Afficher les messages reçus
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <strong>De: </strong><?php echo $row["pseudo_emetteur"]; ?>
                                    <form action="supprimer_message.php" method="post" style="display: inline-block; float: right;">
                                        <input type="hidden" name="message_id" value="<?php echo $row["id"]; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row["contenu"]; ?></p>
                                    <p class="card-text"><small class="text-muted">Envoyé le: <?php echo $row["date_envoi"]; ?></small></p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Boîte de réception vide
                        </div>
                        <?php
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
            <div class="col-md-6">
                <!-- Boîte de réception de tous les utilisateurs -->
                <h3>Boîte de réception de tous les utilisateurs</h3>
                <?php
                // Connexion à la base de données
                $conn_all_users = new mysqli($servername, $username, $password, $dbname);

                // Vérifier la connexion
                if ($conn_all_users->connect_error) {
                    die("Connexion échouée: " . $conn_all_users->connect_error);
                }

                // Requête pour récupérer tous les messages
                $sql_all_users = "SELECT id, pseudo_emetteur, pseudo_destinataire, contenu, date_envoi FROM messages ORDER BY date_envoi DESC";
                $result_all_users = $conn_all_users->query($sql_all_users);

                if ($result_all_users->num_rows > 0) {
                    // Afficher les messages reçus
                    while($row_all_users = $result_all_users->fetch_assoc()) {
                        ?>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <strong>De: </strong><?php echo $row_all_users["pseudo_emetteur"]; ?> - <strong>À: </strong><?php echo $row_all_users["pseudo_destinataire"]; ?>
                                <form action="supprimer_message.php" method="post" style="display: inline-block; float: right;">
                                    <input type="hidden" name="message_id" value="<?php echo $row_all_users["id"]; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $row_all_users["contenu"]; ?></p>
                                <p class="card-text"><small class="text-muted">Envoyé le: <?php echo $row_all_users["date_envoi"]; ?></small></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Aucun message disponible
                    </div>
                    <?php
                }

                // Fermer la connexion
                $conn_all_users->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>
