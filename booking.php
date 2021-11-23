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
    <title>Flight results</title>
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
                            <?php echo "VOLS ALLER"; ?>
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
                                <div class="packageResults">Pack1</div>
                                <div class="packageResults">Pack2</div>
                                <div class="packageResults">Pack3</div>
                            </div> </br>
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