<?php
@require_once "connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vous connecter pour accéder à votre historique de réservation ou bien reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="fancy.css">
    <title>Historique de vos réservations</title>

</head>

<body>

    <?php
    @require_once 'header.php';
    if (empty($_SESSION['firstname'])) {
        @require_once 'login.php';
        exit();
    }
    ?>

    <main class="backgroundHistory">
        <h1 class="display-7">Historique de vos réservations</h1>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <div class="flexResults">
                    <div class="resultBox">
                    </div>
                    <div class="resultBox"> 
                    </div>
                    <div class="resultBox">
                    </div>
                </div> 
            </div>
        </div>

    <?php
    $_SESSION['passengers']=$_GET;
    ?>
    </main>

    <?php @require_once 'footer.html' ?>
</body>

</html>