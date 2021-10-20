<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style_connexion.css">
    <title>Connexion</title>
</head>

<body>
    <?php
    include_once 'Controlleurs/traitement_connexion.php';
    ?>

    <div class="jnt-arriere-plan">
        <div class="container">
            <h2 class="jnt-titre">CONNEXION</h2>
            <div class="jnt-message">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </div>
            <div class="jnt-form">
                <form action="" method="POST">
                    <div class="row jnt-insc-par">
                        <label for="login" class="col-md-offset-1 col-md-4 jnt-position">LOGIN </label>
                        <input type="text" class="col-md-3 jnt-chp-insc" name="login" id="login" value="<?php if (isset($_POST['login'])) {
                                                                                                            echo $_POST['login'];
                                                                                                        } ?>">
                    </div>
                    <div class="row jnt-insc-par">
                        <label for="pass" class="col-md-offset-1 col-md-4 jnt-position">MOT DE PASSE </label>
                        <input type="password" class="col-md-3 jnt-chp-insc" name="pass" id="pass">
                    </div>
                    <div class="row jnt-insc-par">
                        <input type="submit" name="connexion" value="Se connecter" class="btn btn-success btnInscription col-md-offset-5 col-md-2">
                    </div>
                </form>

            </div>

        </div>
    </div>
    </div>

</body>

</html>