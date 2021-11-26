<?php
@require_once "connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
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
        var_dump($_SESSION);
    }
    ?>

    <main class="backgroundSummary">
        <h1 class="display-7">Récapitulatif de votre réservation</h1>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <div class="flexResults">
                    <?php
                    $oneWayFlight=$_SESSION['oneWayFlight'];
                    $returnWayFlight=$_SESSION['returnFlight'];
                    $passengersInformation=$_SESSION['passengersInformation'];
                    foreach ($oneWayFlight as $value) { ?>
                    <div class="resultBox">
                        <?php echo $value ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
                <div class="flexResults">
                    <?php
                    foreach ($returnWayFlight as $value) { ?>
                    <div class="resultBox">
                        <?php echo $value ?>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="flexResults">

                    <div class="resultBox">
                        <?php                     
                        echo $passengersInformation['email1'];
                        echo $passengersInformation['email1'];
                        echo $passengersInformation['email1'];
                        echo $passengersInformation['email1'];
                        echo $passengersInformation['email1'];
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>
</body>

</html>