<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs du formulaire sont présents
    if (isset($_POST['subject']) && isset($_POST['message'])) {
        // Récupérer les données du formulaire
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        // Validation des données (vous pouvez ajouter d'autres validations si nécessaire)

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

        // Préparer la requête SQL pour insérer le signalement dans la base de données
        $user_email = $_SESSION['user'];
        $sql = "INSERT INTO signalements_messages (id_message, motif, details) VALUES (?, ?, ?)";
        
        // Préparer la déclaration SQL et lier les paramètres
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_message, $subject, $message);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Le message a été signalé avec succès.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors du signalement du message.</div>';
        }

        // Fermer la déclaration et la connexion
        $stmt->close();
        $conn->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Tous les champs du formulaire sont requis.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>GALACTECH FOOT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
       

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h4 class="m-0 text-primary text-uppercase">GALACTECH FOOT</h4>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">contact@galactechfootball.com</p>
                            </div>
                           
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">GALACTECH FOOT</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link">À Propos</a>
                                <a href="room.php" class="nav-item nav-link">Equipes</a>
                                
                                <a href="contact.html" class="nav-item nav-link active">Contact</a>
                            </div>
                            <?php if(isset($_SESSION['user'])) : ?>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['user']; ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="profil.php">Profil</a></li> <!-- Lien vers la page de profil -->
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li> <!-- Lien de déconnexion -->
                                        <li><a class="dropdown-item" href="boite_reception.php">boite de reception</a></li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <a href="connexion.php" class="btn btn-primary  d-lg-block">Connexion<i class="fa fa-arrow-right ms-3"></i></a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        


        <!-- Contact Start -->
        <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5"><span class="text-primary text-uppercase">Signaler</span></h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    
                </div>
            </div>
            
            <center>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form method="post">
                            <div class="row g-3">
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        <label for="subject">Sujet</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">envoyer Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>



        

        <!-- Back to Top -->
        
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    

    
    <script src="js/main.js"></script>

    <!-- Back to Top -->
        
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    

    
    <script src="js/main.js"></script>

    <!-- Script pour masquer le message après quelques secondes -->
    <script>
        // Fonction pour masquer le message après quelques secondes
        function hideMessage() {
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 5000); // Masquer le message après 5 secondes (5000 millisecondes)
        }

        // Appeler la fonction pour masquer le message
        hideMessage();
    </script>
</body>

</html>

</body>

</html>
