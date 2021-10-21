<?php
if (isset($_POST['connexion'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass'])) {
        $login = htmlspecialchars($_POST['login']);
        $pass = htmlspecialchars($_POST['pass']);
        if ($login != "jnt") {
            $message = "Erreur sur le login";
        } else {
            if ($pass != "2002") {
                $message = "Erreur sur le mot de passe";
            } else {
                $_SESSION['login'] = $login;
                $_SESSION['connect'] = true;
                header('Location: Vue/accueil.php');
            }
        }
    } else {
        $message = "Completez tous les champs";
    }
}
