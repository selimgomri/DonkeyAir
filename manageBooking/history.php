<?php
@require_once "../connectDB.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Vous connecter pour accéder à votre historique de réservation ou bien reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="../fancy.css">
    <title>Historique de vos réservations</title>

</head>

<body>

    <?php
    @require_once '../inc/headerLogin.php';
    array_splice($_SESSION,1, count($_SESSION));
    if (empty($_SESSION['user']['firstname'])) {
        @require_once '../login/login.php';
        exit();
    } else {
        $today=date("Y-m-d H:i");

        $query="SELECT booking_number, email, 
        oneway_flight.flight_number AS flight_number1,
        DATE_FORMAT(oneway_flight.departure_time, '%d/%m/%Y %H:%i') AS departure_time1,
        DATE_FORMAT(oneway_flight.arrival_time, '%d/%m/%Y %H:%i') AS arrival_time1,
        oneway_flight.departure_airport_id AS departure_airport_id1,
        oneway_flight.arrival_airport_id AS arrival_airport_id1,
        return_flight.flight_number AS flight_number2,
        DATE_FORMAT(return_flight.departure_time, '%d/%m/%Y %H:%i') AS departure_time2,
        DATE_FORMAT(return_flight.arrival_time, '%d/%m/%Y %H:%i') AS arrival_time2,
        return_flight.departure_airport_id AS departure_airport_id2,
        return_flight.arrival_airport_id AS arrival_airport_id2,
        price_paid
        FROM user_flight 
        JOIN user ON user_id=user.id
        JOIN flight AS oneway_flight ON flight_id=oneway_flight.id
        LEFT JOIN flight AS return_flight ON returnflight_id=return_flight.id
        WHERE email=:email ";
    }
    ?>

    <main class="backgroundHistory">
        <h1 class="displayConfirmationH1">Vous souhaitez modifier votre réservation ?</h1>
        <h1 class="displayConfirmationH2">Ou consulter vos anciens voyages ?</h1>

        <!-- ON GOING BOOKED FLIGHTS----------------------------------------------------------------------->

        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <div class="flexResults">
                    <h2 class="display-7bis">✈️ Vos prochains vols</h2>
                </div>
                <div class="flexResults">
                    <?php
                    $queryOngoingBooking=$query . "AND oneway_flight.departure_time>:today
                         ORDER BY departure_time1 ASC";
                    //preparation PDO
                    $statement = $pdo->prepare($queryOngoingBooking);
                    $statement->bindValue(':email', $_SESSION['user']['email'], \PDO::PARAM_STR);
                    $statement->bindValue(':today', $today, \PDO::PARAM_STR);
                    $statement->execute();
                    //end of preparation
                    $ongoingBooking=$statement->fetchAll();
                    foreach ($ongoingBooking as $booking) { 
                        ?>
                        <div class="summaryInformations">
                            <div class="h2FlightSummary">
                                <?php
                                echo 'Réservation numéro : ' . $booking['booking_number']; ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                echo '<br> 🛫 VOL ALLER <br>'; 
                                ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                for ($i=2; $i<7; $i++) {
                                    echo $booking[$i];
                                    echo ' ';
                                }
                                ?>
                            </div>
                            <div class="summaryResults">
                                <?php
                                if (!empty($booking[7])) { 
                                    echo '<br> 🛫 VOL RETOUR <br>'; ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                    for ($i=7; $i<12; $i++) {
                                        echo $booking[$i];
                                        echo ' ';
                                    }
                                }
                                ?>
                            </div>
                            <span class="cancelButton-container">
                                <p class="cancelButton-container">Modifier</p>
                                <a class="cancelButton" href="../manageBooking/updateBooking.php?id=<?php echo $booking['booking_number'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </span>
                            <span class="cancelButton-container">
                                <p class="cancelButton-container">Annuler</p>
                                <a class="cancelButton" href="../manageBooking/cancelBooking.php?id=<?php echo $booking['booking_number'] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </span>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- PAST BOOKED FLIGHTS------------------------------------------------------------------------->

        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <div class="flexResults">
                    <h2 class="display-7bis">✈️ Vos réservations passées</h2>
                </div>
                <div class="flexResults">
                    <?php
                    $queryPastBooking=$query . "AND return_flight.departure_time<=:today     
                        ORDER BY departure_time2 DESC";
                    //preparation PDO
                    $statement = $pdo->prepare($queryPastBooking);
                    $statement->bindValue(':email', $_SESSION['user']['email'], \PDO::PARAM_STR);
                    $statement->bindValue(':today', $today, \PDO::PARAM_STR);
                    $statement->execute();
                    //end of preparation
                    $queryPastBooking=$statement->fetchAll();
                    foreach ($queryPastBooking as $booking) { 
                        ?>
                        <div class="summaryInformations">
                            <div class="h2FlightSummary">
                                <?php
                                echo 'Réservation numéro : ' . $booking['booking_number']; ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                echo '<br> 🛫 VOL ALLER <br>'; 
                                ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                for ($i=2; $i<7; $i++) { 
                                    echo $booking[$i];
                                    echo ' '; 
                                }
                                ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                if (!empty($booking[7])) {
                                    echo '<br> 🛫 VOL RETOUR <br>'; 
                                    ?>
                            </div>

                            <div class="summaryResults">
                                <?php
                                for ($i=7; $i<12; $i++) {
                                    echo $booking[$i];
                                    echo ' ';
                                }
                            }
                            ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php @require_once '../inc/footer.html' ?>
    
</body>

</html>