<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>GALACTECH FOOTBALL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <link rel="stylesheet" type="text/css" href="#">

   
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    

    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- En-tête -->
        <!-- Code de l'en-tête -->

        <!-- Barre de navigation -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                        <a href="index.php" class="navbar-brand d-block d-lg-none">
                            <h4 class="m-0 text-primary text-uppercase">GALACTECH FOOTBALL</h4>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Accueil</a>
                                <a href="about.php" class="nav-item nav-link">À Propos</a>
                                <a href="room.php" class="nav-item nav-link">Équipes</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                            </div>
                            <form class="d-flex" action="recherche.php" method="GET">
                                <input class="form-control me-2" type="search" placeholder="Rechercher pseudo" aria-label="Search" name="pseudo">
                                <button class="btn btn-outline-success" type="submit">Rechercher</button>
                           </form>

                            <?php if(isset($_SESSION['user'])) : ?>
                                <div class="dropdown">
                                    <button class="btn btn-scondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['user']; ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="profil.php">Profil</a></li> <!-- Lien vers la page de profil -->
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li> <!-- Lien de déconnexion -->
                                        <li><a class="dropdown-item" href="boite_reception.php">boite de reception</a></li>
                                        <li><a class="dropdown-item" href="boite_reception_admin.php">boite de reception admin</a></li>
                                        <li><a class="dropdown-item" href="bannir.php">bannir</a></li>
                                        <li><a class="dropdown-item" href="message_signaler.php">messages signaler</a></li>
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

        

        <!-- Carousel Start --> <!--slide-->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Rejoignez la Rencontre de Football Galactech</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Découvrez nos Équipes</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Inscrivez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Rejoignez la Rencontre de Football Galactech</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Découvrez nos Équipes</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Inscrivez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


       <!-- Booking Start -->
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            <div class="row g-2">
                <div class="col-md-3">
                    <div class="date" id="date1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                            placeholder="Date de la Rencontre" data-target="#date1" data-toggle="datetimepicker" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="date" id="date2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" placeholder="Heure de la Rencontre" data-target="#date2" data-toggle="datetimepicker"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="equipeSelect">
                        <option selected>Équipe</option>
                        <option value="1">Équipe 1</option>
                        <option value="2">Équipe 2</option>
                        <option value="3">Équipe 3</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="joueurSelect">
                        <option selected>Joueur</option>
                        <option value="1">Joueur 1</option>
                        <option value="2">Joueur 2</option>
                        <option value="3">Joueur 3</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="nombreJoueurs">
                        <option selected>Nombre de Joueurs</option>
                        <option value="5">5 Joueurs</option>
                        <option value="10">10 Joueurs</option>
                        <option value="15">15 Joueurs</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" id="validerEquipe">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#validerEquipe").click(function() {
            // Récupérer les valeurs des champs
            var dateRencontre = $("#date1 input").val();
            var heureRencontre = $("#date2 input").val();
            var equipeSelectionnee = $("#equipeSelect").val();
            var joueurSelectionne = $("#joueurSelect").val();
            var nombreJoueurs = $("#nombreJoueurs").val();

            // Envoi des données via AJAX
            $.ajax({
                type: "POST",
                url: "ajouter_equipe.php", // Chemin vers le script PHP pour ajouter l'équipe
                data: {
                    dateRencontre: dateRencontre,
                    heureRencontre: heureRencontre,
                    equipeSelectionnee: equipeSelectionnee,
                    joueurSelectionne: joueurSelectionne,
                    nombreJoueurs: nombreJoueurs
                },
                success: function(response) {
                    alert(response); // Afficher la réponse du serveur (peut être supprimée une fois que vous êtes sûr que tout fonctionne correctement)
                    // Actualiser la page après l'ajout de l'équipe
                    window.location.reload();
                }
            });
        });
    });
</script>

       
        <!-- match_foot -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">Explorez Nos <span class="text-primary text-uppercase">Équipes</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/equipe1.jpg" alt="">
                                
                            </div>
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




                    <!-- Ajoutez ici les autres équipes avec des noms et des images correspondantes -->
                    
                </div>
            </div>
        </div>
        <!-- fin -->



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    

    <!--  Javascript -->
    <script src="js/main.js"></script>

    <!-- JavaScript -->

<!-- JavaScript -->
<!-- JavaScript -->
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
                            <button class="btn btn-danger btn-sm btn-supprimer" data-id="${equipe.id}">Supprimer</button>
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

        // Gestionnaire d'événements pour le bouton de suppression d'équipe
        $(document).on("click", ".btn-supprimer", function() {
            // Récupérer l'identifiant de l'équipe à supprimer
            var equipeId = $(this).data("id");

            // Récupérer les équipes depuis localStorage
            var equipes = JSON.parse(localStorage.getItem('equipes')) || [];

            // Recherche de l'index de l'équipe à supprimer dans le tableau des équipes
            var index = -1;
            for (var i = 0; i < equipes.length; i++) {
                if (equipes[i].id === equipeId) {
                    index = i;
                    break;
                }
            }

            // Si l'équipe est trouvée, la supprimer du tableau
            if (index !== -1) {
                equipes.splice(index, 1);

                // Mettre à jour les équipes dans localStorage
                localStorage.setItem('equipes', JSON.stringify(equipes));
            }

            // Supprimer l'équipe de la page
            $(this).closest(".col-lg-4").remove();
        });
    });
</script>





</body>

</html>
