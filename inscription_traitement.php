<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajoutez d'autres liens pour Bootstrap si nécessaire -->
</head>
<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $motDePasse = $_POST["mot_de_passe"];
            $confirmationMotDePasse = $_POST["confirmation_mot_de_passe"];

            if ($motDePasse === $confirmationMotDePasse) {
                $motDePasse = md5($motDePasse);

                $connexion = mysqli_connect('localhost', 'root', '', 'projet');
                if (!$connexion) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur !</strong> Connexion à la base de données échouée.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }

                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $email = $_POST["email"];

                // Vérifier si le pseudo est déjà utilisé
                $requetePseudoExistant = mysqli_query($connexion, "SELECT * FROM utilisateurs WHERE pseudo = '$nom'");
                if (mysqli_num_rows($requetePseudoExistant) > 0) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Le pseudo <strong>'.$nom.'</strong> est déjà utilisé. Veuillez en choisir un autre.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    die(); // Arrête l'exécution du script
                }

                // Vérifier si l'utilisateur existe déjà dans la base de données
                $requeteUtilisateurExistant = mysqli_query($connexion, "SELECT * FROM utilisateurs WHERE email = '$email'");
                if (mysqli_num_rows($requeteUtilisateurExistant) > 0) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        L\'utilisateur avec l\'email <strong>'.$email.'</strong> existe déjà. Veuillez vous connecter.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    die(); // Arrête l'exécution du script
                }

                // Insérer l'utilisateur dans la base de données
                $requeteInsertion = mysqli_query($connexion, "INSERT INTO utilisateurs (pseudo, mot_de_passe, email) VALUES ('$nom', '$motDePasse', '$email')");

                mysqli_close($connexion);

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Inscription terminée avec succès. Vous pouvez maintenant vous <a href="connexion.php" class="alert-link">connecter</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Les mots de passe ne correspondent pas. Veuillez réessayer.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        }
        ?>
        

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
