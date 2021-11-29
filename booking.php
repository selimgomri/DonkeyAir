<?php
@require_once "connectDB.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="fancy.css">
    <title>Reservez votre vol aller-retour au meilleur prix avec Donkey Airlines</title>

</head>

<body>

    <?php
    @require_once 'header.php';
    array_splice($_SESSION,1, count($_SESSION));
    if (empty($_SESSION['user']['firstname'])) {
        @require_once 'login.php';
        exit();
    }
    ?>

    <main class="backgroundBooking">
        <h1 class="display-7">Effectuez une réservation</h1>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <?php
                $today=date(("Y-m-d H:i:s"));
                if (((''== $_GET['departureAirport'])
                && (''== $_GET['arrivalAirport'])
                && (''== $_GET['departureTime']))
                || (($_GET['departureTime'])<=$today)) {
                    header("Location: index.php");
                } else {
                    $_SESSION['nbPassengers']=$_GET['nbPassengers'];

                    $departureAirport=substr($_GET['departureAirport'], 0, 3);
                    $arrivalAirport=substr($_GET['arrivalAirport'], 0, 3);
                    $departureTime=$_GET['departureTime'];

                    $query="SELECT flight.id, flight_number,
                    departure_airport_id,
                    arrival_airport_id,
                    DATE_FORMAT(departure_time, '%d/%m/%Y %H:%i') AS departure_time,
                    DATE_FORMAT(arrival_time, '%d/%m/%Y %H:%i') AS arrival_time,
                    economy1, economy2, economy3, price_business
                    FROM flight 
                    JOIN price ON price_id=price.id 
                        JOIN price_economy ON price_economy_id=price_economy.id
                    WHERE (departure_airport_id = :departureAirport
                    AND arrival_airport_id = :arrivalAirport 
                    AND DATE_FORMAT(departure_time, '%d/%m/%Y') = DATE_FORMAT(:departureTime, '%d/%m/%Y')) 
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

                    <div>
                        <h2 class="display-8">VOLS ALLER</h2>
                    </div>

                    <?php
                    if (empty($flights)) {
                        echo "Aucun vol disponible <br>";
                    }

                    foreach ($flights as $values) { 
                    ?>
                        <form method="post" action="
                            <?php
                            if (empty($_GET['returnDate'])) {
                                echo 'passenger.php';
                            } else {
                                echo '#returnFlights';
                            }
                            ?>">
                            <div class="flexResults">
                                <div class="resultBox">
                                    <input type="hidden" name="flightNumber" value="<?php echo $values['flight_number']; ?>">
                                    <?php echo $values['flight_number']; ?>
                                </div>

                                <div class="resultBox">
                                    <input type="hidden" name="departure_airport_id" value=<?php echo $values['departure_airport_id']; ?>>
                                        <?php echo $values['departure_airport_id'] . "  " . "✈" . "  "; ?>
                                    <input type="hidden" name="arrival_airport_id" value="<?php echo $values['arrival_airport_id']; ?>">
                                        <?php echo $values['arrival_airport_id']; ?>
                                </div>

                                <div class="resultBox">
                                    <input type="hidden" name="departure_time" value="<?php echo $values['departure_time']; ?>">
                                        <?php echo $values['departure_time'] . "  " . "✈" . "  "; ?>
                                    <input type="hidden" name="arrival_time" value="<?php echo $values['arrival_time']; ?>">
                                        <?php echo $values['arrival_time']; ?>
                                </div>

                                <button class="togglePackageButton" onclick="togglePackageResults(event)" type="button">
                                    <?php echo $values['economy1'] . " € "; ?>
                                    <p class="economyButton">Meilleur prix</p>
                                </button>
                            </div>
                            <div class="packageResults-container hidden">
                                <div class="packageResults">
                                    <div class="packageResultTitle1">
                                        <h4>SAVER</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg</li><br>
                                        <li>💺 Siège attribué</li><br>
                                        <li>✔️ 5000 Miles</li><br>
                                        <li id="saverColor">🔰 Assurance SAVER</li><br>
                                        <button id="packageButtonChoice1" type="submit" name='economy1' value="<?php echo $values['economy1']; ?>">
                                            <?php echo $values['economy1'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="packageResults">
                                    <div class="packageResultTitle2">
                                        <h4>FLEX</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg / 1 x 23kg</li><br>
                                        <li>💺 Choix du siège</li><br>
                                        <li>✔️ 20000 Miles</li><br>
                                        <li id="flexColor">🔰 Assurance FLEX</li><br>
                                        <button id="packageButtonChoice2" type="submit" name='economy2' value="<?php echo $values['economy2']; ?>">
                                            <?php echo $values['economy2'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="packageResults">
                                    <div class="packageResultTitle3">
                                        <h4>PREMIUM</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 7kg / 2 x 23kg</li><br>
                                        <li>💺 Siège PREMIUM</li><br>
                                        <li>✔️ 50000 Miles</li><br>
                                        <li id="premiumColor">🔰 Assurance PREMIUM</li><br>
                                        <button id="packageButtonChoice3" type="submit" name='economy3' value="<?php echo $values['economy3']; ?>">
                                            <?php echo $values['economy3'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="packageResults">
                                    <div class="packageResultTitle4">
                                        <h4>BUSINESS</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 2 x 7kg / 2 x 23kg</li><br>
                                        <li>💺 Siège BUSINESS</li><br>
                                        <li>✔️ 80000 Miles</li><br>
                                        <li id="businessColor">🔰 Assurance BUSINESS</li><br>
                                        <button id="packageButtonChoice4"  type="submit" name='price_business' value="<?php echo $values['price_business']; ?>">
                                            <?php echo $values['price_business'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </br>
                        </form>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
        $_SESSION['oneWayFlight']=$_POST;
        
//-------------------Display return flights ------------------------------------------

        if (''!=$_GET['returnDate']) { ?>
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <?php
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

                $flights = $statement->fetchAll(); 
                ?>

                <div>
                    <h2 class="display-8" id="returnFlights"> <?php echo "VOLS RETOUR"; ?> </h2>
                </div>

                <?php
                if (empty($flights)) {
                    echo "Aucun vol disponible <br>";
                }

                foreach ($flights as $values) { 
                ?>
                <form method="get" action="passenger.php">
                    <div class="flexResults">
                        <div class="resultBox">
                            <input type="hidden" name="flightNumber2" value="<?php echo $values['flight_number']; ?>">
                            <?php echo $values['flight_number']; ?>
                        </div>

                        <div class="resultBox">
                            <input type="hidden" name="departure_airport_id2" value="<?php echo $values['departure_airport_id']; ?>">
                                <?php echo $values['departure_airport_id'] . "  " . "✈" . "  "  ?>
                            <input type="hidden" name="arrival_airport_id2" value="<?php echo $values['arrival_airport_id']; ?>">
                            <?php echo $values['arrival_airport_id']; ?>
                        </div>

                        <div class="resultBox">
                            <input type="hidden" name="departure_time2" value="<?php echo $values['departure_time']; ?>">
                                <?php echo $values['departure_time'] . "  " . "✈" . "  "; ?>
                            <input type="hidden" name="arrival_time2" value="<?php echo $values['arrival_time']; ?>">
                                <?php echo $values['arrival_time']; ?>
                        </div>

                        <button class="togglePackageButton" onclick="togglePackageResults(event)" type="button">
                            <?php echo $values['economy1'] . " € "; ?>
                            <p class="economyButton">Meilleur prix</p>
                        </button>
                    </div>
                    <div class="packageResults-container hidden">
                        <div class="packageResults">
                            <div class="packageResultTitle1">
                                <h4>SAVER</h4>
                            </div>
                            <div class="packageResultContent">
                                <li>🧳 1 x 7kg</li><br>
                                <li>💺 Siège attribué</li><br>
                                <li>✔️ 5000 Miles</li><br>
                                <li id="saverColor">🔰 Assurance SAVER</li><br>
                                <button id="packageButtonChoice1" type="submit" name='economy1_2' value="<?php echo $values['economy1']; ?>">
                                    <?php echo $values['economy1'] . " € "; ?>
                                </button>
                            </div>
                        </div>
                        <div class="packageResults">
                            <div class="packageResultTitle2">
                                <h4>FLEX</h4>
                            </div>
                            <div class="packageResultContent">
                                <li>🧳 1 x 7kg / 1 x 23kg</li><br>
                                <li>💺 Choix du siège</li><br>
                                <li>✔️ 20000 Miles</li><br>
                                <li id="flexColor">🔰 Assurance FLEX</li><br>
                                <button id="packageButtonChoice2" type="submit" name='economy2_2' value="<?php echo $values['economy2']; ?>">
                                    <?php echo $values['economy2'] . " € "; ?>
                                </button>
                            </div>
                        </div>
                        <div class="packageResults">
                            <div class="packageResultTitle3">
                                <h4>PREMIUM</h4>
                            </div>
                            <div class="packageResultContent">
                                <li>🧳 1 x 7kg / 2 x 23kg</li><br>
                                <li>💺 Siège PREMIUM</li><br>
                                <li>✔️ 50000 Miles</li><br>
                                <li id="premiumColor">🔰 Assurance PREMIUM</li><br>
                                <button id="packageButtonChoice3" type="submit" name='economy3_2' value="<?php echo $values['economy3']; ?>">
                                    <?php echo $values['economy3'] . " € "; ?>
                                </button>
                            </div>
                        </div>
                        <div class="packageResults">
                            <div class="packageResultTitle4">
                                <h4>BUSINESS</h4>
                            </div>
                            <div class="packageResultContent">
                                <li>🧳 2 x 7kg / 2 x 23kg</li><br>
                                <li>💺 Siège BUSINESS</li><br>
                                <li>✔️ 80000 Miles</li><br>
                                <li id="businessColor">🔰 Assurance BUSINESS</li><br>
                                <button id="packageButtonChoice4"  type="submit" name='price_business2' value="<?php echo $values['price_business']; ?>">
                                    <?php echo $values['price_business'] . " € "; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    </br>
                </form>
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