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
                <?php
                //storing $_SESSION arrays about the flights for better use of it
                $oneWayFlight=$_SESSION['oneWayFlight'];
                $returnWayFlight=$_SESSION['returnFlight'];
                $passengersInformation=$_SESSION['passengersInformation'];
                // end of storage
                ?>

                <!-- OneWay Flight--------------------------- -->
                <h2 class="display-8">VOL ALLER</h2>
                <div class="flexResults">

                    <div class="resultBox">
                        <?php
                        echo $oneWayFlight['flightNumber'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $oneWayFlight['departure_airport_id'] . "  " . "✈" . "  " . $oneWayFlight['arrival_airport_id'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $oneWayFlight['departure_time'] . "  " . "✈" . "  " . $oneWayFlight['arrival_time'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        switch (array_key_last($oneWayFlight)) {
                            case 'economy1':
                                echo 'SAVER';
                                break;
                            case 'economy2':
                                echo 'FLEX';
                                break;
                            case 'economy3':
                                echo 'PREMIUM';
                                break;
                            case 'price_business':
                                echo 'BUSINESS';
                                break;
                            };
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['nbPassengers'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['nbPassengers']*end($oneWayFlight) . " €";
                        ?>
                    </div>

                </div>
                <!-- End of OneWay Flight--------------------------------------------------- -->

                <!-- Return Flight--------------------------- -->
                <h2 class="display-8">VOL RETOUR</h2>
                <div class="flexResults">

                    <div class="resultBox">
                        <?php
                        echo $returnWayFlight['flightNumber2'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $returnWayFlight['departure_airport_id2'] . "  " . "✈" . "  " . $returnWayFlight['arrival_airport_id2'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $returnWayFlight['departure_time2'] . "  " . "✈" . "  " . $returnWayFlight['arrival_time2'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        switch (array_key_last($returnWayFlight)) {
                            case 'economy1_2':
                                echo 'SAVER';
                                break;
                            case 'economy2_2':
                                echo 'FLEX';
                                break;
                            case 'economy3_2':
                                echo 'PREMIUM';
                                break;
                            case 'price_business2':
                                echo 'BUSINESS';
                                break;
                            };
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['nbPassengers'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['nbPassengers']*end($returnWayFlight) . " €";
                        ?>
                    </div>

                </div>
                <!-- End of Return Flight--------------------------------------------------- -->

                <!-- Owner of the order -->
                <h2 class="display-8">Passager principal</h2>
                <div class="flexResults">

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['firstname'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['lastname'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['birthdate'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['email'];
                        ?>
                    </div>

                    <div class="resultBox">
                        <?php
                        echo $_SESSION['phone'];
                        ?>
                    </div>

                </div>
                <!-- End of Passenger owner--------- -->

                <h2 class="display-8">
                    Prix total:
                    <?php
                    echo(end($returnWayFlight)+end($returnWayFlight))*$_SESSION['nbPassengers'] . " €";
                    ?>
                </h2>
                <a href="#"><button>Confirmer</button></a>

            </div>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>
</body>

</html>