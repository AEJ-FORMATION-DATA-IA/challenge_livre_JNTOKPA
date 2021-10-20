<?php
if (isset($_POST['enregistrer'])) {
    if (!empty($_POST['titre']) and !empty($_POST['auteur']) and !empty($_POST['date_parution']) and !empty($_POST['description']) and !empty($_FILES['image'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $date_parution = htmlspecialchars($_POST['date_parution']);
        //image
        $image = htmlspecialchars($_FILES['image']['name']);
        $cheminImage = '../images/' . basename($image);
        $extImage = pathinfo($cheminImage, PATHINFO_EXTENSION);
        $sizeImage =  htmlspecialchars($_FILES['image']['size']);
        //
        $livre_exist->execute(array($titre, $description, $auteur, $date_parution, $image));
        $nbreLivre = $livre_exist->rowCount();
        if ($nbreLivre != 0) {
            $message = "Ce livre existe deja";
        } else {
            if ($extImage != "jpg" and $extImage != "jpeg" and $extImage != "png" and $extImage != "gif" and $extImage != "JPG" and $extImage != "JPEG" and $extImage != "PNG" and $extImage != "GIF") {
                $message = "Choisir un fichier .jpg ou .jpeg ou .png ou .gif";
            } else {
                if (file_exists($cheminImage)) {
                    $message = "Ce fichier existe deja";
                } else {
                    if ($sizeImage > 500000) {
                        $message = "Choisir un fichier de moins de 500 KB";
                    } else {
                        if (!move_uploaded_file($_FILES['image']['tmp_name'], $cheminImage)) {
                            $message = "Erreur lors du telechargement de l'image";
                        } else {
                            $ajouterLivre->execute(array($titre, $description, $auteur, $date_parution, $image));
                            header('Location: ../Vue/accueil.php');
                        }
                    }
                }
            }
        }
    } else {
        $message = "Remplir tous les champs";
    }
}
