<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Connectez-vous a votre espace pour gérer vos reservations, ajouter une assurance, des options bagagages, une prise en charge à l'aéroport, un surclassement, ou consulter votre historique de vols vers vos destinations préférées">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <title>Connectez-vous a votre espace pour gérer vos reservations et consulter votre historique de vols vers vos
        destinations préférées</title>
</head>

<body>

    <?php @require_once 'headerLogin.php' ?>

    <main class="backgroundLogin">
        <div>
            <form class="reservationContainerLogin" method="post" action="login.php">

                <h1 class="display-5">Connexion à votre espace</h1>
                <label for="id-email"></label>
                <input type="email" id="id-email" autocomplete="on" name="email" placeholder="Adresse e-mail" value=<?php
                if (!empty($_SESSION)) {
                    echo $_SESSION['email'];
                } ?>>
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Mot de passe">
                <input class="validatebtn" type="submit" value="Accéder à mon espace">
                <?php
                if (!empty($_SESSION)) { ?>
                <p class="alert alert-danger" role="error"> <?php echo "Email ou Mot de passe incorrect"; ?> </p>
                <?php session_destroy();
                }
                ?>
            </form>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>

</body>

</html>