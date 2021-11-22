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
    <header>
        <nav class="menu-container"> 
            <div class="logo-container">
                <a class="logo" href=""><img src="/media/DA_Logo2-01.svg" alt="logo"></a>
            </div>    
            <ul class="menu">
                <li class="gerer-menu"> <a href="/index.php">Réserver un vol</a></li>
                <li class="donkey-menu"> <a href="#">Donkey Airlines</a></li>
                <li class="contact-menu"> <a href="#">Nous contacter</a></li>
                <li class="connection"> <a class="login" href="/loginpage.php">✈️ Votre espace</a></li>
            </ul>
        </nav>
    </header>
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
                        <?php
                    echo "VOLS ALLER";
                        ?>
                    </div>
                    <?php
                    if (empty($flights)) {
                        echo "Aucun vol disponible <br>";
                    }

                    foreach ($flights as $values) { ?>
                        <div class="flexResults">
                            <div class="resultBox">
                                <?php
                                    echo $values['flightNumber']
                                ?>
                            </div>
                            <div class="resultBox"> 
                                <?php
                                    echo $values['departureAirport'] . "  " . "✈" . "  " . $values['arrivalAirport']
                                ?>
                            </div>
                            <div class="resultBox">
                                <?php
                                    echo $values['departureTime'] . "  " . "✈" . "  " . $values['arrivalTime']
                                ?>
                            </div>
                            <button id="togglePackageButton">
                                <?php
                                    echo $values['price'] . " € ";
                        } 
                    }
                    ?>
                    </button>
                </div>
            </div>
        </div>
    </main>

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

                    $flights = $statement->fetchAll();
                    echo "VOLS RETOUR <br>";
                    if (empty($flights)) {
                        echo "Aucun vol disponible <br>";
                    }
    
                    foreach ($flights as $values) {
                        echo $values['flightNumber'] . " | " .
                            $values['departureAirport'] . " | " .
                            $values['arrivalAirport'] . " | " .
                            $values['departureTime'] . " | " .
                            $values['arrivalTime'] . " | " .
                            $values['price'] . " | " .
                        "<br>";
                    }
                }
                ?>
            </div>
        </div>

    <footer>
        <nav>     
            <ul class="footer">
                <li class="aboutme">A propos de nous</li>
                <li class="join">Rejoignez le club Donkey Pegasus</li>
                <li class="faq">FAQ</li>
                <li class="legalmentions">Mentions légales</li>
            </ul>
        </nav>
    </footer>
</body>

</html>