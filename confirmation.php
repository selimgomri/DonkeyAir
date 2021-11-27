<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fancy.css">
    <title>Confirmation de votre réservatio</title>
</head>

<body>
    <?php
    @require_once 'connectDB.php';
    @require_once 'header.php';
    //preparation PDO
    function preparationPDO(string $query, string $elementOfArray, PDO $pdo)
    {
        $statement = $pdo->prepare($query);
        $statement->bindValue(':key', $elementOfArray, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
    //end of preparation

    if (empty($_SESSION['firstname'])) {
        @require_once 'login.php';
        exit();
    } else {
        //storing $_SESSION arrays about the flights for better use of it
        $oneWayFlight=$_SESSION['oneWayFlight'];
        $returnWayFlight=$_SESSION['returnFlight'];
        $passengersInformation=$_SESSION['passengersInformation'];
        // end of storage

        $queryUser="SELECT id, email from user WHERE email=:key";
        $user = preparationPDO($queryUser, $_SESSION['email'], $pdo);
        $userId=$user[0]['id'];

        $queryFlight="SELECT id, flight_number from flight WHERE flight_number=:key";
        $flight = preparationPDO($queryFlight, $oneWayFlight['flightNumber'], $pdo);
        $flightId=$flight[0]['id'];

        $queryReturnFlight="SELECT id, flight_number from flight WHERE flight_number=:key";
        $returnFlight = preparationPDO($queryReturnFlight, $returnWayFlight['flightNumber2'], $pdo);
        $returnFlightId=$returnFlight[0]['id'];

        $pricePaid=(end($oneWayFlight)+end($returnWayFlight))*$_SESSION['nbPassengers'];

        //Adding the booking to the database
        $query="INSERT INTO user_flight (user_id, flight_id, returnflight_id, price_paid) VALUES ($userId, $flightId, $returnFlightId, $pricePaid)";
        $statement = $pdo->exec($query);
    }
    ?>
    
    <?php @require_once 'footer.html' ?>
</body>

</html>