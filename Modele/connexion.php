<?php
//connexion a la base de donnees
try {
  $bdd = new PDO('mysql:host=localhost;dbname=bdlivre;charset=utf8', 'root', '');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

//enregistrer un livre
$ajouterLivre = $bdd->prepare('INSERT INTO livre(titre, description, auteur, date_parution, image) VALUES(?,?,?,?,?)');

//verifier si le livre existe deja dans la bdd
$livre_exist = $bdd->prepare('SELECT * FROM livre WHERE  titre = ? AND description = ? AND auteur = ? AND date_parution = ? AND image = ?');

//selection de tous les livre
$selectAllLivre = $bdd->prepare('SELECT * FROM livre');

//modification des informations sur un livre
$modifLivre = $bdd->prepare('UPDATE livre SET titre = ?, description = ?, auteur = ?, date_parution = ?, image = ? WHERE id = ?');

//suprression d'un livre
$del = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
if ($del) {
  $deleteLivre = "DELETE FROM livre WHERE id = $del";
  $bdd->prepare($deleteLivre)->execute();
}

//selection du livre à modifier
$modif = filter_input(INPUT_GET, "modif", FILTER_SANITIZE_NUMBER_INT);
if ($modif) {
  $selectedLivre  = $bdd->query("SELECT * FROM livre WHERE id = $modif");
  $infoLivre = $selectedLivre->fetch();
  $titre = $infoLivre["titre"];
  $auteur = $infoLivre["auteur"];
  $description = $infoLivre["description"];
  $date_parution = $infoLivre["date_parution"];
  $oldImage = $infoLivre["image"];
  $id = $infoLivre["id"];
}
