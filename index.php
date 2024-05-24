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
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['user']; ?>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>
                                        <li><a class="dropdown-item" href="boite_reception.php">Boîte de réception</a></li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <a href="connexion.php" class="btn btn-primary d-lg-block">Connexion<i class="fa fa-arrow-right ms-3"></i></a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Rejoignez la Rencontre de Football Galactech</h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Découvrez nos Équipes</a>
                                <a href="connexion.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Inscrivez-vous</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Rejoignez la Rencontre de Football Galactech</h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Découvrez nos Équipes</a>
                                <a href="connexion.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Inscrivez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

       <!-- Formulaire de réservation et d'ajout d'équipe -->
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                    <form id="addTeamForm">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="date" class="form-control datetimepicker-input" placeholder="Date de la Rencontre" data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="time" class="form-control datetimepicker-input" placeholder="Heure de la Rencontre" data-target="#date2" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="equipeSelect" name="equipeSelect">
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
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="teamName" class="form-label">Nom de l'équipe</label>
                                    <input type="text" class="form-control" id="teamName" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="maxPlayers" class="form-label">Nombre de joueurs maximum</label>
                                    <select class="form-select" id="maxPlayers" required>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="field" class="form-label">Terrain</label>
                                    <select class="form-select" id="field" required>
                                        <option value="Terrain 1">Terrain 1</option>
                                        <option value="Terrain 2">Terrain 2</option>
                                        <option value="Terrain 3">Terrain 3</option>
                                        <option value="Terrain 4">Terrain 4</option>
                                        <option value="Terrain 5">Terrain 5</option>
                                        <option value="Terrain 6">Terrain 6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Formulaire de réservation et d'ajout d'équipe -->

        <!-- Liste des équipes -->
        <div class="container my-5">
            <h2>Équipes</h2>
            <div class="row" id="teamList"></div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addTeamForm = document.getElementById("addTeamForm");
            const teamList = document.getElementById("teamList");

            function loadTeams() {
                const teams = JSON.parse(localStorage.getItem("teams")) || [];
                teamList.innerHTML = '';
                teams.forEach(team => {
                    const col = document.createElement("div");
                    col.className = "col-lg-4 col-md-6 wow fadeInUp";
                    col.setAttribute("data-wow-delay", "0.1s");

                    const teamCard = `
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">${team.name}</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-users text-primary me-2"></i>${team.maxPlayers} Joueurs Max</small>
                                    <small><i class="fa fa-futbol text-primary me-2"></i>${team.field}</small>
                                </div>
                                <p class="text-body mb-3">Une équipe dynamique et compétitive prête à affronter tous les défis sur le terrain.</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="rejoindre_equipe.php?team=${team.name}">Rejoindre</a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="details.php?team=${team.name}">Détails</a>
                                </div>
                            </div>
                        </div>
                    `;

                    col.innerHTML = teamCard;
                    teamList.appendChild(col);
                });
            }

            addTeamForm.addEventListener("submit", function(event) {
                event.preventDefault();
                const teamName = document.getElementById("teamName").value.trim();
                const maxPlayers = document.getElementById("maxPlayers").value;
                const field = document.getElementById("field").value;
                if (teamName && maxPlayers && field) {
                    let teams = JSON.parse(localStorage.getItem("teams")) || [];
                    teams.push({ name: teamName, maxPlayers: maxPlayers, field: field });
                    localStorage.setItem("teams", JSON.stringify(teams));
                    loadTeams();
                    addTeamForm.reset();
                }
            });

            loadTeams();
        });
    </script>
</body>
</html>