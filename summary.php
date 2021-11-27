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
    }
    ?>

    <main class="backgroundSummary">
        <h1 class="display-7">Récapitulatif de votre réservation</h1>
        <div class="summaryInformations-container">
            <?php
            //storing $_SESSION arrays about the flights for better use of it
            $oneWayFlight=$_SESSION['oneWayFlight'];
            $returnWayFlight=$_SESSION['returnFlight'];
            $passengersInformation=$_SESSION['passengersInformation'];
            // end of storage
            ?>

            <!-- OneWay Flight--------------------------- -->
            <div class="summaryInformations">
                <h2 class="h2FlightSummary">✈️ Votre vol aller</h2>
                <div class="summaryResults">
                    <?php
                    echo "Numéro de vol : " . $oneWayFlight['flightNumber'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo "📍 Au départ de : " . $oneWayFlight['departure_airport_id'] . " et à destination de : " . $oneWayFlight['arrival_airport_id'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo "🛫 Heure du décollage : " . $oneWayFlight['departure_time'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo "🛬 Heure de l'atterissage : " . $oneWayFlight['arrival_time'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    switch (array_key_last($oneWayFlight)) {
                        case 'economy1':
                            echo 'Catégorie : SAVER';
                            break;
                        case 'economy2':
                            echo 'Catégorie : FLEX';
                            break;
                        case 'economy3':
                            echo 'Catégorie : PREMIUM';
                            break;
                        case 'price_business':
                            echo 'Catégorie : BUSINESS';
                            break;
                        };
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo "Nombre de passagers : " . $_SESSION['nbPassengers'] . " " . "passagers";
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo "Prix du vol aller : " . $_SESSION['nbPassengers']*end($oneWayFlight) . " €";
                    ?>
                </div>
            </div>
                <!-- End of OneWay Flight--------------------------------------------------- -->

                <!-- Return Flight--------------------------- -->
            <div class="summaryInformations">
                <h2 class="h2FlightSummary">✈️ Votre vol retour</h2>

                <div class="summaryResults">
                    <?php
                    echo $returnWayFlight['flightNumber2'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo $returnWayFlight['departure_airport_id2'] . "  " . "✈" . "  " . $returnWayFlight['arrival_airport_id2'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo $returnWayFlight['departure_time2'] . "  " . "✈" . "  " . $returnWayFlight['arrival_time2'];
                    ?>
                </div>

                <div class="summaryResults">
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

                <div class="summaryResults">
                    <?php
                    echo $_SESSION['nbPassengers'];
                    ?>
                </div>

                <div class="summaryResults">
                    <?php
                    echo $_SESSION['nbPassengers']*end($returnWayFlight) . " €";
                    ?>
                </div>
            </div>
            <!-- End of Return Flight--------------------------------------------------- -->

            <!-- Owner of the order -->
            <div class="summaryInformations">
                <h2 class="h2FlightSummary">Passager principal</h2>

                    <div class="summaryResults">
                        <?php
                        echo $_SESSION['firstname'];
                        ?>
                    </div>

                    <div class="summaryResults">
                        <?php
                        echo $_SESSION['lastname'];
                        ?>
                    </div>

                    <div class="summaryResults">
                        <?php
                        echo $_SESSION['birthdate'];
                        ?>
                    </div>

                    <div class="summaryResults">
                        <?php
                        echo $_SESSION['email'];
                        ?>
                    </div>

                    <div class="summaryResults">
                        <?php
                        echo $_SESSION['phone'];
                        ?>
                    </div>
            </div>
            <!-- End of Passenger owner--------- -->
            <div class="summaryInformations">            
                <h2 class="h2FlightSummary">
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