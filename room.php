<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

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
                        <h4 class="m-0 text-primary text-uppercase">GALACTECH FOOT </h4>
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
                                <a href="room.php" class="nav-item nav-link active">Équipes</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Équipes</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Équipes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        


        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                   
                    <h1 class="mb-5">Explorer Nos <span class="text-primary text-uppercase">Équipes</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            
                           <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Équipe A</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-users text-primary me-2"></i>15 Joueurs</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-map-marker text-primary me-2"></i>Stade Galactech</small>
                                    <small><i class="fa fa-trophy text-primary me-2"></i>5 Victoires</small>
                                </div>
                                <p class="text-body mb-3">L'équipe A est prête à relever tous les défis sur le terrain.</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">Détails</a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Inscription</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                            
            </div>
        </div>
        <!-- Room End -->


        

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    
    <script src="js/main.js"></script>




<script>
    $(document).ready(function() {
        // Charge les équipes stockées dans localStorage lorsque la page est prête
        chargerEquipes();

        // Fonction pour charger les équipes depuis localStorage et les afficher sur la page
        function chargerEquipes() {
            var equipes = JSON.parse(localStorage.getItem('equipes'));
            if (equipes) {
                equipes.forEach(function(equipe) {
                    ajouterEquipeSurPage(equipe);
                });
            }
        }

        // Fonction pour ajouter une équipe sur la page
        function ajouterEquipeSurPage(equipe) {
            // Créer le HTML pour la nouvelle équipe
            var nouvelleEquipeHTML = `
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/equipe${equipe.id}.jpg" alt="Équipe ${equipe.nom}">
                            
                        </div>
                        <div class="p-4 mt-2">
                            <h5 class="mb-0">Équipe ${equipe.nom}</h5>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-users text-primary me-2"></i>${equipe.nombreJoueurs} Joueurs</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-map-marker text-primary me-2"></i>Stade Galactech</small>
                                <small><i class="fa fa-trophy text-primary me-2"></i>5 Victoires</small>
                            </div>
                            <p class="text-body mb-3">L'équipe ${equipe.nom} est prête à relever tous les défis sur le terrain.</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">Détails</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Inscription</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Ajoute la nouvelle équipe à côté des autres équipes
            $(".container .row.g-4").append(nouvelleEquipeHTML);
        }

        // Gestionnaire d'événements pour le bouton de validation de l'équipe
        $("#validerEquipe").click(function() {
            // Récupérer les valeurs des champs
            var dateRencontre = $("#date1 input").val();
            var heureRencontre = $("#date2 input").val();
            var equipeSelectionnee = $("#equipeSelect").val();
            var joueurSelectionne = $("#joueurSelect").val();
            var nombreJoueurs = $("#nombreJoueurs").val();

            // Stocker les détails de la nouvelle équipe dans localStorage
            var nouvelleEquipe = {
                id: equipeSelectionnee,
                nom: "Équipe " + equipeSelectionnee,
                nombreJoueurs: nombreJoueurs
            };

            // Récupérer les équipes déjà stockées dans localStorage
            var equipes = JSON.parse(localStorage.getItem('equipes')) || [];

            // Ajouter la nouvelle équipe à la liste des équipes
            equipes.push(nouvelleEquipe);

            // Mettre à jour les équipes stockées dans localStorage
            localStorage.setItem('equipes', JSON.stringify(equipes));

            // Ajouter la nouvelle équipe sur la page
            ajouterEquipeSurPage(nouvelleEquipe);
        });

        
    });
</script>

</body>

</html>