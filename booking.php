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
                    if ((''== $_POST['departureAirport'])
                    && (''== $_POST['arrivalAirport'])
                    && (''== $_POST['departureTime']))  {
                    header("Location: index.php");
                    } else {
                        $departureAirport=$_POST['departureAirport'];
                        $arrivalAirport=$_POST['arrivalAirport'];
                        $departureTime=$_POST['departureTime'];

                        $query="SELECT flightNumber, departureAirport, arrivalAirport, departureTime, arrivalTime, price FROM flight WHERE 
                        departureAirport= :departureAirport
                        AND arrivalAirport= :arrivalAirport 
                        AND departureTime>= :departureTime
                        ORDER BY price ASC";

                        //preparation PDO
                        $statement = $pdo->prepare($query);
                        $statement->bindValue(':departureAirport', $departureAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':arrivalAirport', $arrivalAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':departureTime', $departureTime, \PDO::PARAM_STR);

                        $statement->execute();
                        //end of preparation

                        $flights = $statement->fetchAll(); ?>
                        <div class="display-8">
                            <h2> <?php echo "VOLS ALLER"; ?> </h2>
                        </div>
                        <?php
                        if (empty($flights)) {
                            echo "Aucun vol disponible <br>";
                        }

                        foreach ($flights as $values) { ?>
                            <div class="flexResults">
                                <div class="resultBox">
                                    <?php echo $values['flightNumber'] ?>
                                </div>
                                <div class="resultBox"> 
                                    <?php echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport'] ?>
                                </div>
                                <div class="resultBox">
                                    <?php echo $values['departureTime'] . "  " . "✈" . "  " . $values['arrivalTime'] ?>
                                </div>
                                <button id="togglePackageButton">
                                    <?php echo $values['price'] . " € "; ?>
                                </button>
                            </div> 
                            <div class="packageResults-container">
                                <div class="packageResults">
                                    <div class="packageResultTitle1">
                                        <h4>SAVER</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 Aucun bagage inclu</li><br>
                                        <li>💺 Siège attribué à l'enregistrement</li><br>
                                        <li>✔️ 5000 Miles</li><br>
                                        <button id="packageButtonChoice">
                                            <?php echo $values['price'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="packageResults">
                                    <div class="packageResultTitle2">
                                        <h4>FLEX</h4>
                                    </div>
                                    <div class="packageResultContent">
                                        <li>🧳 1 x 23kg</li><br>
                                        <li>💺 Choix du siège</li><br>
                                        <li>✔️ 20000 Miles</li><br>
                                        <button id="packageButtonChoice">
                                            <?php echo $values['price'] . " € "; ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="packageResults">
                                    <div class="packageResultTitle3">
                                        <h4>PREMIUM</h4>
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
                    if (''!=$_POST['returnDate']) {
                        $departureAirport=$_POST['arrivalAirport'];
                        $arrivalAirport=$_POST['departureAirport'];
                        $departureTime=$_POST['returnDate'];

                        $query="SELECT flightNumber, departureAirport, arrivalAirport, departureTime, arrivalTime, price FROM flight WHERE 
                        departureAirport= :departureAirport
                        AND arrivalAirport= :arrivalAirport 
                        AND departureTime>= :departureTime
                        ORDER BY price ASC";
        
                        //preparation PDO
                        $statement = $pdo->prepare($query);
                        $statement->bindValue(':departureAirport', $departureAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':arrivalAirport', $arrivalAirport, \PDO::PARAM_STR);
                        $statement->bindValue(':departureTime', $departureTime, \PDO::PARAM_STR);

                        $statement->execute();
                        //end of preparation

                        $flights = $statement->fetchAll(); ?>
                    
                        <div class="display-8">
                            <?php echo "VOLS RETOUR <br>"; ?>
                        </div>

                        <?php
                        if (empty($flights)) {
                            echo "Aucun vol disponible <br>";
                        }
        
                        foreach ($flights as $values) { ?>
                            <div class="flexResults">
                                <div class="resultBox">
                                    <?php echo $values['flightNumber'] ?>
                                </div>
                                <div class="resultBox"> 
                                    <?php echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport'] ?>
                                </div>
                                <div class="resultBox">
                                    <?php echo $values['departureTime'] . "  " . "✈" . "  " . $values['arrivalTime'] ?>
                                </div>
                                <button id="togglePackageButton">
                                    <?php echo $values['price'] . " € "; ?>
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