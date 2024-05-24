<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="page-connexion.css">
    <style>
        .srouce{
            text-align: center;
            color: #ffffff;
            padding: 10px;
        }
    </style>
</head>
<body>
    
    <div class="main-container">
        <div class="form-container">

            <div class="srouce"><a title="hotel" href="./menu.html">GALACTECH FOOT</a></div>

            <div class="form-body">
                <h2 class="title">Connexion</h2>
                <div class="social-login">
                    
                </div><!-- SOCIAL LOGIN -->

                <?php
                if(isset($_SESSION['login_error'])) {
                    echo "<div style=\"text-align: center; border: 1px solid red; color:red; padding: 10px;\">".$_SESSION['login_error']."</div>";
                    unset($_SESSION['login_error']);
                }
                ?>

                <form action="connexion_traitement.php" class="the-form" method="post">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder=" email">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password">

                    <input type="submit" value="Log In">

                </form>

            </div><!-- FORM BODY-->

            <div class="form-footer">
                <div>
                    <span>Vous n'avez pas de compte ?</span> <a href="inscription.php">S'inscrire</a>
                </div>
            </div><!-- FORM FOOTER -->

        </div><!-- FORM CONTAINER -->
    </div>

</body>
</html>
