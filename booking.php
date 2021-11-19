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
    if ((in_array('', $_POST))) {
       header("Location: homepage.php");
    }
    else {
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

        if (empty($flights)) {
            echo "Pas de résultat";
        }

        foreach($flights as $flights) {
            echo $flights['flightNumber'] . " | " . 
                $flights['departureAirport'] . " | " .
                $flights['arrivalAirport'] . " | " . 
                $flights['departureTime'] . " | " . 
                $flights['arrivalTime'] . " | " . 
                $flights['price'] . " | " . 
            "<br>";
        }

    }
    ?>
    
</body>
</html>