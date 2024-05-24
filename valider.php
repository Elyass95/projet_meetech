<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $dateRencontre = $_POST["dateRencontre"];
    $heureRencontre = $_POST["heureRencontre"];
    $equipeSelectionnee = $_POST["equipeSelectionnee"];
    $joueurSelectionne = $_POST["joueurSelectionne"];
    $nombreJoueurs = $_POST["nombreJoueurs"];

    // Connexion à la base de données
    $connexion = mysqli_connect('localhost', 'root', '', 'projet');

    // Vérifier la connexion
    if (!$connexion) {
        echo "Erreur : Connexion à la base de données échouée.";
        exit();
    }

    // Insérer l'équipe dans la table equipes
    $requeteInsertEquipe = "INSERT INTO equipes (nom, description) VALUES ('$equipeSelectionnee', 'Description de l\'équipe')";
    $resultatInsertEquipe = mysqli_query($connexion, $requeteInsertEquipe);

    // Vérifier si l'insertion de l'équipe a réussi
    if (!$resultatInsertEquipe) {
        echo "Erreur : Échec de l'ajout de l'équipe à la base de données.";
        mysqli_close($connexion);
        exit();
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);

    // Afficher un message de succès
    echo "L'équipe a été ajoutée avec succès à la base de données.";
}
?>
