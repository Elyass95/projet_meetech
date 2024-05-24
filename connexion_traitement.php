<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $connect = mysqli_connect('localhost', 'root', '', 'projet');
    if (!$connect) {
        die('Erreur : ' . mysqli_connect_error());
    }

    $query = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE email = '$email'");
    if ($query && mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        if (isset($user['mot_de_passe'])) {
            $storedPassword = $user['mot_de_passe'];

            if (md5($password) === $storedPassword) {
                $_SESSION['user'] = $email; // Utilisation de l'email comme nom d'utilisateur
                $_SESSION['prenom'] = $user['prenom']; // Stockage du prénom de l'utilisateur

                mysqli_close($connect);
                // Vérification pour rediriger vers indexadmin.php si l'utilisateur est admin
                if ($user['pseudo'] === 'admin' && $email === 'admin@gmail.com') {
                    header("Location: ./indexadmin.php");
                } else {
                    header("Location: ./index.php");
                }
                exit();
            } else {
                $_SESSION['login_error'] = "Mot de passe incorrect.";
                header("Location: ./connexion.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Mot de passe non trouvé pour cet utilisateur.";
            header("Location: ./connexion.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Utilisateur non trouvé.";
        header("Location: ./connexion.php");
        exit();
    }

    mysqli_close($connect);
}
?>
