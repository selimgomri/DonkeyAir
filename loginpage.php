<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connectez-vous a votre espace pour gérer vos reservations, ajouter une assurance, des options bagagages, une prise en charge à l'aéroport, un surclassement, ou consulter votre historique de vols vers vos destinations préférées">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <title>Connectez-vous a votre espace pour gérer vos reservations et consulter votre historique de vols vers vos destinations préférées</title>
</head>
<body>

<header>
    <nav class="menu-container">
        <div class="logo-container">
            <a class="logo" href="/index.php" > <img src="/media/DA_Logo2-01.svg " alt="logo"></a>
        </div>
        <ul class="menu">
            <li class="gerer-menu"> <a href="/index.php">Réservez votre vol</a></li>
            <li class="donkey-menu"> <a href="#">Donkey Airlines</a></li>
            <li class="contact-menu"> <a href="#">Nous contacter</a></li>
            <li class="connection"> <a class="login" href="/loginpage.php">✈️ Votre espace</a></li>
        </ul>
    </nav>
</header>

    <main class="backgroundLogin">
        <div> 
            <form class="reservationContainerLogin" method="post">    
                <h1 class="display-5">Connexion à votre espace</h1>
                <label for="id-email"></label>
                <input type="email" id="id-email" autocomplete="on" name="id-email" placeholder="Adresse e-mail">
                <label for="password"></label>
                <input type="password" id="password" placeholder="Mot de passe">
                <input class="validatebtn" type="submit" value="Accéder à mon espace">
            </form>
        </div>
    </main>

<?php @require_once 'footer.html' ?>

</body>
</html>