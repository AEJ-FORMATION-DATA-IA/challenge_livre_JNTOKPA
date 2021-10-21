<?php
if (isset($_POST['modifier'])) {
    if (!empty($_POST['titre']) and !empty($_POST['auteur']) and !empty($_POST['date_parution']) and !empty($_POST['description'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $date_parution = htmlspecialchars($_POST['date_parution']);
        $oldImage = htmlspecialchars($_POST['oldImage']);

        /*if ($_FILES['newImage'] != "Aucun fichier n'a été selectionné") {
            $newImage = htmlspecialchars($_FILES['newImage']['name']);
            $cheminnewImage = '../images/' . basename($newImage);
            $extnewImage = pathinfo($cheminnewImage, PATHINFO_EXTENSION);
            $sizenewImage =  htmlspecialchars($_FILES['newImage']['size']);
            $livre_exist->execute(array($titre, $description, $auteur, $date_parution, $newImage));
            $nbreLivre = $livre_exist->rowCount();
            if ($nbreLivre != 0) {
                $message = "Ce livre existe deja";
            } else {
                if ($extnewImage != "jpg" and $extnewImage != "jpeg" and $extnewImage != "png" and $extnewImage != "gif" and $extnewImage != "JPG" and $extnewImage != "JPEG" and $extnewImage != "PNG" and $extnewImage != "GIF") {
                    $message = "Choisir un fichier .jpg ou .jpeg ou .png ou .gif";
                } else {
                    if (file_exists($cheminnewImage)) {
                        $message = "Ce fichier existe deja";
                    } else {
                        if ($sizenewImage > 500000) {
                            $message = "Choisir un fichier de moins de 500 KB";
                        } else {
                            if (!move_uploaded_file($_FILES['newImage']['tmp_name'], $cheminnewImage)) {
                                $message = "Erreur lors du telechargement de l'image";
                            } else {
                                $modifLivre->execute(array($titre, $description, $auteur, $date_parution, $newImage, $id));
                                header('Location: ../Vue/accueil.php');
                            }
                        }
                    }
                }
            }
        } else {*/
        $modifLivre->execute(array($titre, $description, $auteur, $date_parution, $oldImage, $id));
        header('Location: ../Vue/accueil.php');
        /*}*/
    } else {
        $message = "Remplir tous les champs";
    }
}
