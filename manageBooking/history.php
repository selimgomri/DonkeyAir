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
    @require_once '../headerLogin.php';
    array_splice($_SESSION,1, count($_SESSION));
    if (empty($_SESSION['user']['firstname'])) {
        @require_once '../login.php';
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
        <h1 class="display-7">Historique de vos réservations</h1>

        <!-- ON GOING BOOKED FLIGHTS----------------------------------------------------------------------->
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <div class="flexResults">
                    <h2 class="display-6">Réservations en cours</h2>
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
                    foreach ($ongoingBooking as $booking) { ?>
                        <div>
                            <?php
                            echo '<br> <br> Réservation numéro: ' . $booking['booking_number'];
                            echo '<br> VOL ALLER <br>';
                            for ($i=2; $i<7; $i++) {
                                echo $booking[$i];
                                echo ' ';
                            }
                            if (!empty($booking[7])) {
                                echo '<br> VOL Retour <br>';
                                for ($i=7; $i<12; $i++) {
                                    echo $booking[$i];
                                    echo ' ';
                                }
                            }
                            ?>
                            <a class="cancelButton" href="updateBooking.php?id=<?php echo $booking['booking_number'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="cancelButton" href="cancelBooking.php?id=<?php echo $booking['booking_number'] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
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
                    <h2 class="display-6">Réservations passées</h2>
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
                        echo '<br> <br> Réservation numéro: ' . $booking['booking_number'];
                        echo '<br> VOL ALLER <br>';
                        for ($i=2; $i<7; $i++) {
                            echo $booking[$i];
                            echo ' ';
                        }
                        if (!empty($booking[7])) {
                            echo '<br> VOL RETOUR <br>';
                            for ($i=7; $i<12; $i++) {
                                echo $booking[$i];
                                echo ' ';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>

    <?php @require_once '../footer.html' ?>
</body>

</html>