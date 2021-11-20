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
        <div class="title">
            <h1 class="display-7">Effectuez une réservation</h1>
        </div>
        <div class="displayBoxShadow">
            <div class="reservationContainerLogin">
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

                    $flights = $statement->fetchAll();
                    echo "VOL ALLER <br>";
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

        <div class="displayBoxShadow">
            <div class="reservationContainerLogin">
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
                    echo "VOL RETOUR <br>";
                    if (empty($flights)) {
                        echo "Pas de résultat <br>";
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