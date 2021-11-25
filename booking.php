<?php
session_start();
@require_once "connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="radiobutton.js"></script>
    <title>Flight results</title>
</head>

<body>

    <?php @require_once 'header.html'?>

    <main class="backgroundBooking">
        <h1 class="display-7">Effectuez une réservation</h1>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <?php
                    if ((''== $_GET['departureAirport'])
                    && (''== $_GET['arrivalAirport'])
                    && (''== $_GET['departureTime'])) {
                        header("Location: index.php");
                    } else {
                        $departureAirport=substr($_GET['departureAirport'], 0, 3);
                        $arrivalAirport=substr($_GET['arrivalAirport'], 0, 3);
                        $departureTime=$_GET['departureTime'];

                        $query="SELECT flight_number, departure_airport.id, arrival_airport.id,  departure_time, arrival_time, economy1 
                        FROM flight 
                        JOIN airport AS departure_airport ON departure_airport_id=departure_airport.id 
                        JOIN airport AS arrival_airport ON arrival_airport_id=arrival_airport.id
                        JOIN price ON price_id=price.id 
                            JOIN price_economy ON price_economy_id=price_economy.id
                        WHERE (departure_airport.id = :departureAirport
                        AND arrival_airport.id = :arrivalAirport 
                        AND departure_time >= :departureTime)
                        ORDER BY economy1 ASC";

                        //preparation PDO
                        $statement = $pdo->prepare($query);
                        $statement->bindValue(':departureAirport', $departureAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':arrivalAirport', $arrivalAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':departureTime', $departureTime, \PDO::PARAM_STR);

                        $statement->execute();
                        //end of preparation

                        $flights = $statement->fetchAll();
                        ?>
                <div class="display-8">
                    <?php
                                echo "VOLS ALLER"; ?>
                </div>
                <?php
                        if (empty($flights)) {
                            echo "Aucun vol disponible <br>";
                        }

                        foreach ($flights as $values) {
                            $values['departureAirport'] = $values[1];
                            unset($values[1]);
                            $values['arrivalAirport'] = $values[2];
                            unset($values[2]);
                            
                             ?>
                <div class="flexResults">
                    <div class="resultBox">
                        <?php
                                        echo $values['flight_number']
                                    ?>
                    </div>
                    <div class="resultBox">
                        <?php
                                        echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport']
                                    ?>
                    </div>
                    <div class="resultBox">
                        <?php
                                        echo $values['departure_time'] . "  " . "✈" . "  " . $values['arrival_time']
                                    ?>
                    </div>
                    <button id="togglePackageButton">
                        <?php
                                        echo $values['economy1'] . " € "; ?>
                    </button>
                </div> <br />
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <?php
                    // Display return flights
                    if (''!=$_GET['returnDate']) {
                        $arrivalAirport=substr($_GET['departureAirport'], 0, 3);
                        $departureAirport=substr($_GET['arrivalAirport'], 0, 3);
                        $departureTime=$_GET['departureTime'];

                       /*  $query="SELECT flight_number, departureAirport, arrivalAirport, departureTime, arrivalTime, price FROM flight WHERE 
                        departureAirport= :departureAirport
                        AND arrivalAirport= :arrivalAirport 
                        AND departureTime>= :departureTime
                        ORDER BY price ASC"; */
        
                        //preparation PDO
                        $statement = $pdo->prepare($query);
                        $statement->bindValue(':departureAirport', $departureAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':arrivalAirport', $arrivalAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':departureTime', $departureTime, \PDO::PARAM_STR);

                        $statement->execute();
                        //end of preparation

                        $flights = $statement->fetchAll(); ?>

                <div class="display-8">
                    <?php
                                echo "VOLS RETOUR <br>"; ?>
                </div>

                <?php
                        if (empty($flights)) {
                            echo "Aucun vol disponible <br>";
                        }
        
                        foreach ($flights as $values) {
                            $values['departureAirport'] = $values[1];
                            unset($values[1]);
                            $values['arrivalAirport'] = $values[2];
                            unset($values[2]); ?>
                <div class="flexResults">
                    <div class="resultBox">
                        <?php
                                        echo $values['flight_number']
                                    ?>
                    </div>
                    <div class="resultBox">
                        <?php
                                        echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport']
                                    ?>
                    </div>
                    <div class="resultBox">
                        <?php
                                        echo $values['departure_time'] . "  " . "✈" . "  " . $values['arrival_time']
                                    ?>
                    </div>
                    <button id="togglePackageButton">
                        <?php
                                        echo $values['economy1'] . " € "; ?>
                    </button>
                </div> <br />
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>

</body>

</html>