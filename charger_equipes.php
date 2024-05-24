<?php
// Connectez-vous à la base de données
$connexion = mysqli_connect('localhost', 'root', '', 'projet');

// Vérifiez si la connexion est réussie
if (!$connexion) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

// Récupérer les équipes depuis la base de données
$resultat = mysqli_query($connexion, "SELECT * FROM equipes");

// Construire le HTML des équipes
$htmlEquipes = '';
while ($row = mysqli_fetch_assoc($resultat)) {
    $htmlEquipes .= '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
    $htmlEquipes .= '<div class="room-item shadow rounded overflow-hidden">';
    $htmlEquipes .= '<div class="position-relative">';
    // Ici, vous pouvez afficher les détails de chaque équipe, par exemple :
    $htmlEquipes .= '<img class="img-fluid" src="img/' . $row['nom'] . '.jpg" alt="Équipe ' . $row['nom'] . '">';
    $htmlEquipes .= '</div>';
    $htmlEquipes .= '<div class="p-4 mt-2">';
    $htmlEquipes .= '<h5 class="mb-0">Équipe ' . $row['nom'] . '</h5>';
    // Ajoutez d'autres détails de l'équipe si nécessaire
    $htmlEquipes .= '</div>';
    $htmlEquipes .= '</div>';
    $htmlEquipes .= '</div>'; 
}

// Afficher le HTML des équipes
echo $htmlEquipes;

// Fermez la connexion à la base de données
mysqli_close($connexion);
?>
