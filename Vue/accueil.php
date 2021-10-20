<?php
session_start();
include_once '../Modele/connexion.php';
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
            <div><strong class="title-3 color-1">TOUS LES LIVRES</strong></div>
            <?php
            $selectAllLivre->execute();
            $i = 1;
            while ($livre = $selectAllLivre->fetch()) {
                echo "<article class=\"grid_4\">";
                echo "<div class=\"box\">";

                echo "    <figure><a href=\"#\"><img src=\"../images/$livre[image]\" alt=\"\" width=\"300\" height=\"300\"></a></figure>";
                echo "   <div class=\"padding\">";
                echo "<strong class=\"title-3 color-1\"> $livre[titre]</strong> ";
                echo "<time class=\"tdate-1\"><a class=\"link\" href=\"#\">Auteur: $livre[auteur]</a></time>";
                echo "<time class=\"tdate-1\" datetime=\"2012-02-06\"><a class=\"link\" href=\"#\">Paru le: $livre[date_parution]</a></time>";
                echo "<a class=\"link\" href=\"#\"> $livre[description]</a>";
                echo "    </div> ";
                echo "<a class=\"button\" href=\"../Vue/modifier_livre.php?modif=$livre[id]\">MODIFIER</a>";
                echo "<a class=\"button\" href=\"?del=$livre[id]\">SUPPRIMER</a>";
                echo "</div>";

                echo "</article>";

                $i++;
            } ?>

            <div class="clear"></div>
        </div>

        <!--==============================footer=================================-->
        <?php include_once 'footer.php'; ?>
    </div>
</body>

</html>