<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fancy.css">
    <title>Confirmation de votre réservation</title>
</head>

<body>
    <?php
    @require_once '../connectDB.php';
    @require_once '../inc/header.php';
    
    //preparation PDO
    function preparationPDO(string $query, string $elementOfArray, PDO $pdo)
    {
        $statement = $pdo->prepare($query);
        $statement->bindValue(':key', $elementOfArray, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
    //end of preparation

    if (empty($_SESSION['user']['firstname'])) {
        @require_once '../login/login.php';
        exit();
    } else {
        //storing $_SESSION arrays about the flights for better use of it
        $oneWayFlight=$_SESSION['oneWayFlight'];
        if (!empty($_SESSION['returnFlight'])) {
            $returnWayFlight=$_SESSION['returnFlight'];
        }
        $passengersInformation=$_SESSION['passengersInformation'];
        // end of storage

        $queryUser="SELECT id, email from user WHERE email=:key";
        $user = preparationPDO($queryUser, $_SESSION['user']['email'], $pdo);
        $userId=$user[0]['id'];

        $queryFlight="SELECT id, flight_number from flight WHERE flight_number=:key";
        $flight = preparationPDO($queryFlight, $oneWayFlight['flightNumber'], $pdo);
        $flightId=$flight[0]['id'];
        
        if (!empty($returnWayFlight)) {
            $queryReturnFlight="SELECT id, flight_number from flight WHERE flight_number=:key";
            $returnFlight = preparationPDO($queryReturnFlight, $returnWayFlight['flightNumber2'], $pdo);
            $returnFlightId=$returnFlight[0]['id'];
        } else {
            $returnFlightId='NULL';
        }

        
        if (!empty($returnWayFlight)) {
            $pricePaid=(end($oneWayFlight)+end($returnWayFlight))*$_SESSION['nbPassengers'];
        } else {
            $pricePaid=end($oneWayFlight)*$_SESSION['nbPassengers'];
        }

        //Adding the booking to the database
        $query="INSERT INTO user_flight (user_id, flight_id, returnflight_id, price_paid) VALUES ($userId, $flightId, $returnFlightId, $pricePaid)";
        $statement = $pdo->exec($query);
    }
    
    // send mail
    /* $to      = $_SESSION['user']['email'];
    $subject = 'Réservation confirmée';
    $message = 'Votre réservation a bien été confirmée';
    $headers = 'From: noreply@donkeyair.com'       . "\r\n" .
                'Reply-To: noreply@donkeyair.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    $mail=mail($to, $subject, $message, $headers);
    var_dump($mail); */
    
    ?>
    
    <main class="backgroundSummary">
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <h1 class="displayConfirmationH1"> Merci pour votre réservation et bon voyage !</h1>
                <h2 class="displayConfirmationH2"> ✅ Un e-mail de confirmation vient de vous être envoyé </h2>
            </div>
        </div>
    </main>

    <?php 
    @require_once '../inc/footer.html';
    array_splice($_SESSION,1, count($_SESSION)); 
    ?>

</body>

</html>