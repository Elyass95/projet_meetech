<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="page-connexion.css">
    <style>
        .source {
            text-align: center;
            color: #ffffff;
            padding: 10px;
        }
    </style>    
</head>
<body>

    <div class="main-container">
        <div class="form-container">

            <div class="source"><a title="hotel" href="./menu.html">GALACTECH FOOT</a></div>

            <div class="form-body">
                <h2 class="title">Inscription</h2>
                
                <form action="inscription_traitement.php" class="the-form" method="post">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom">

                    <label for="nom">pseudo</label>
                    <input type="text" name="nom" id="nom" placeholder="Entrez votre pseudo">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Entrez votre email">

                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe">

                    <label for="confirmation_mot_de_passe">Confirmez le mot de passe</label>
                    <input type="password" name="confirmation_mot_de_passe" id="confirmation_mot_de_passe" placeholder="Confirmez votre mot de passe">

                    <input type="submit" value="S'inscrire">
                </form>
            </div><!-- FORM BODY-->

            <div class="form-footer">
                <div>
                    <span>Déjà un compte?</span> <a href="connexion.php">Connectez-vous</a>
                </div>
            </div><!-- FORM FOOTER -->

        </div><!-- FORM CONTAINER -->
    </div>
</body>
</html>
