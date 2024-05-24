<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Envoyer un message</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Envoyer un message</h1>
        <form method="post" action="envoie_message.php">

            <div class="form-group">
                <label for="destinataire">Destinataire :</label>
                <?php
                // Vérifiez si le pseudo du destinataire est passé en paramètre
                if (isset($_GET['destinataire'])) {
                    $destinataire = $_GET['destinataire'];
                    echo '<input type="text" class="form-control" id="destinataire" name="destinataire" value="' . $destinataire . '" readonly>';
                } else {
                    echo '<input type="text" class="form-control" id="destinataire" name="destinataire" placeholder="Pseudo du destinataire" required>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>

</html>
