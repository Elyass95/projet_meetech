


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
                                <a href="about.php" class="nav-item nav-link active">À Propos</a>
                                <a href="room.php" class="nav-item nav-link">Équipes</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">À Propos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">À Propos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="mb-4">Bienvenue sur  <span class="text-primary text-uppercase">GALACTECH FOOT</span></h1>
                        <p class="mb-4">Explorez GALACTECH FOOT et vivez la passion du football à chaque instant. Rejoignez-nous pour une expérience unique sur le terrain et dans les gradins.</p>
                        
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Team Start -->
<center> <!-- Balise center pour centrer le contenu -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <span class="text-primary text-uppercase">notre equipe</span></h1>
            </div>
            <div class="row g-4 justify-content-center"> <!-- Modifier la classe pour centrer les colonnes -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/adil.jpg" alt="">
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Adil Siddiqui</h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/elyass.jpg" alt="">
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Elyass Chhibi</h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/reda.jpg" alt="">
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Reda El Hossi</h5>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center> <!-- Fin de la balise center -->
<!-- Team End -->



       

       

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
</body>

</html>