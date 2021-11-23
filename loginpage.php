<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <title>Donkey Airlines</title>
</head>
<body>

    <?php @require_once 'header.html' ?>

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