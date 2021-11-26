<?php
@require_once "connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="fancy.css">
    <title>Récapitulatif de votre vol</title>

</head>

<body>

    <?php
    @require_once 'header.php';
    if (empty($_SESSION['firstname'])) {
        @require_once 'login.php';
        exit();
    } else {
    $_SESSION['passengersInformation']=$_POST;
    } ?>

    <main class="backgroundSummary">
        <h1 class="display-7">Récapitulatif de votre réservation</h1>
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
                <div class="packageResults-container hidden">
                    <div class="packageResults">
                        <div class="packageResultTitle1">
                        </div>
                        <div class="packageResultContent">
                        </div>
                    </div>
                    <div class="packageResults">
                        <div class="packageResultTitle2">
                        </div>
                        <div class="packageResultContent">

                        </div>
                    </div>
                    <div class="packageResults">
                        <div class="packageResultContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>
</body>

</html>