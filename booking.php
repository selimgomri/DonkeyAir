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
    <title>Flight results</title>
</head>

<body>
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
    }
    ?>

</body>

</html>