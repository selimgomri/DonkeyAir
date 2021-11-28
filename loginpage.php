<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Connectez-vous a votre espace pour gérer vos reservations, ajouter une assurance, des options bagagages, une prise en charge à l'aéroport, un surclassement, ou consulter votre historique de vols vers vos destinations préférées">
    <link rel="stylesheet" href="fancy.css">
    <title>Connectez-vous a votre espace pour gérer vos reservations et consulter votre historique de vols vers vos
        destinations préférées</title>
</head>

<body>

    <?php @require_once 'headerLogin.php' ?>

    <main class="backgroundLogin">
        <div>
            <form class="reservationContainerLogin" method="post" action="login.php">

                <h1 class="display-6">Connexion à votre espace</h1>
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