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
    <meta name="description" content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <title>Reservez votre vol aller-retour au meilleur prix avec Donkey Airlines</title>

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

                        $query="SELECT flight.id, flight_number, departure_airport.id departure_airport_id, arrival_airport.id arrival_airport_id,  departure_time, arrival_time, economy1 
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

                        $flights = $statement->fetchAll(); ?>
                        <div>
                            <h2 class="display-8"> <?php echo "VOLS ALLER"; ?> </h2>
                        </div>
                        <?php
                        if (empty($flights)) {
                            echo "Aucun vol disponible <br>";
                        }

                        foreach ($flights as $values) {
                            $values['departureAirport'] = $values[1];
                            unset($values[1]);
                            $values['arrivalAirport'] = $values[2];
                            unset($values[2]);?>
                            <div class="flexResults">
                                <div class="resultBox">
                                    <?php echo $values['flight_number'] ?>
                                </div>
                                <div class="resultBox"> 
                                    <?php echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport'] ?>
                                </div>
                                <div class="resultBox">
                                    <?php echo $values['departure_time'] . "  " . "✈" . "  " . $values['arrival_time'] ?>
                                </div>
                                <button id="togglePackageButton">
                                    <?php echo $values['economy1'] . " € "; ?>
                                </button>
                            </div> 
                            <div class="packageResults-container">
                                <div class="hide packageResults<?php echo $values['id']; ?>">
                                    <div class="packageResultTitle1">
                                        <h4>SAVER</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg</li><br>
                                        <li>💺 Siège attribué</li><br>
                                        <li>✔️ 5000 Miles</li><br>
                                        <li id="saverColor">🔰 Assurance SAVER</li><br>
                                        <button id="packageButtonChoice1" type="submit">
                                            <?php echo $values['economy1'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="hide packageResults<?php echo $values['id']; ?>">
                                    <div class="packageResultTitle2">
                                        <h4>FLEX</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg / 1 x 23kg</li><br>
                                        <li>💺 Choix du siège</li><br>
                                        <li>✔️ 20000 Miles</li><br>
                                        <li id="flexColor">🔰 Assurance FLEX</li><br>
                                        <button id="packageButtonChoice2" type="submit">
                                            <?php echo $values['economy1'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="hide packageResults<?php echo $values['id']; ?>">
                                    <div class="packageResultTitle3">
                                        <h4>PREMIUM</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg / 2 x 23kg</li><br>
                                        <li>💺 Siège PREMIUM</li><br>
                                        <li>✔️ 50000 Miles</li><br>
                                        <li id="premiumColor">🔰 Assurance PREMIUM</li><br>
                                        <button id="packageButtonChoice3"  type="submit">
                                            <?php echo $values['economy1'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </br>

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
        
                        //preparation PDO
                        $statement = $pdo->prepare($query);
                        $statement->bindValue(':departureAirport', $departureAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':arrivalAirport', $arrivalAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':departureTime', $departureTime, \PDO::PARAM_STR);

                        $statement->execute();
                        //end of preparation

                        $flights = $statement->fetchAll(); ?>
                    
                        <div>
                            <h2 class="display-8"> <?php echo "VOLS RETOUR"; ?> </h2>
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
                                    <?php echo $values['flight_number'] ?>
                                </div>
                                <div class="resultBox"> 
                                    <?php echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport'] ?>
                                </div>
                                <div class="resultBox">
                                    <?php echo $values['departure_time'] . "  " . "✈" . "  " . $values['arrival_time'] ?>
                                </div>
                                <button id="togglePackageButton">
                                    <?php echo $values['economy1'] . " € "; ?>
                                </button>
                            </div> </br>

                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </main>

    <?php @require_once 'footer.html' ?>


    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="animations.js"></script>

</body>

</html>