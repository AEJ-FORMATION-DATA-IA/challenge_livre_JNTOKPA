<?php
session_start();
include_once '../Modele/connexion.php';
include_once '../Controlleurs/traitement_modifier_livre.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Livre.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">
    <script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="../js/cufon-yui.js" type="text/javascript"></script>
    <script src="../js/cufon-replace.js" type="text/javascript"></script>
    <script src="../js/Asap_400.font.js" type="text/javascript"></script>
    <script src="../js/Asap_italic_400.font.js" type="text/javascript"></script>
    <script src="../js/FF-cash.js" type="text/javascript"></script>
    <script src="../js/jquery.equalheights.js" type="text/javascript"></script>
    <script src="../js/jquery.cycle.all.js" type="text/javascript"></script>
    <script>
        $('#banners')
            .cycle({
                fx: 'fade',
                delay: 7000,
                timeout: 7000,
                manualTrump: false,
                cleartypeNoBg: true,
                next: '#next',
                prev: '#prev'
            });
    </script>
</head>

<body id="page1">
    <div class="main">
        <!--==============================header=================================-->
        <?php include_once 'header.php'; ?>

        <!--==============================content================================-->
        <div class="container_12">

            <article class="grid_8">
                <div class="indent-right">
                    <h3 class="prev-indent-bot">Modifier un livre</h3>

                    <form id="contact-form" method="post" enctype="multipart/form-data">
                        <span class="text-form"><?php
                                                if (isset($message)) {
                                                    echo $message;
                                                }
                                                ?></span>
                        <fieldset>
                            <label><span class="text-form">Titre:</span><input name="titre" type="text" value="<?= $titre; ?>" required /></label>
                            <label><span class="text-form">Auteur:</span><input name="auteur" type="text" value="<?= $auteur; ?>" required /></label>
                            <label><span class="text-form">Paru le:</span><input name="date_parution" type="date" value="<?= $date_parution; ?>" required /></label>
                            <label><span class="text-form">OldImage:</span><input name="oldImage" type="text" value="<?= $oldImage; ?>" /></label>
                            <!--label><span class="text-form">Image:</span><input name="newImage" type="file" /></label-->
                            <div class="wrapper">
                                <div class="text-form">Description:</div>
                                <div class="extra-wrap">
                                    <textarea name="description" required><?= $description; ?></textarea>
                                    <div class="clear"></div>
                                    <div class="buttons">
                                        <button class="button" href="#" type="reset">Annuler</a>
                                            <button class=" button" href="" type="submit" name="modifier">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </article>

            <div class="clear"></div>
        </div>

        <!--==============================footer=================================-->
        <?php include_once 'footer.php'; ?>
    </div>
</body>

</html>