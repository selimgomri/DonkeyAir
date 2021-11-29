<?php
@require_once "../connectDB.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vous connecter pour accéder à votre historique de réservation ou bien reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="../fancy.css">
    <title>Modification de votre réservation</title>
</head>

<body>
    <?php
    @require_once "../inc/headerLogin.php";
    $bookingToEditId=$_GET['id'];
    $query="SELECT booking_number,
    oneway_flight.flight_number AS flight_number1,
    DATE_FORMAT(oneway_flight.departure_time, '%d/%m/%Y %H:%i') AS departure_time1,
    DATE_FORMAT(oneway_flight.arrival_time, '%d/%m/%Y %H:%i') AS arrival_time1,
    oneway_flight.departure_airport_id AS departure_airport_id1,
    oneway_flight.arrival_airport_id AS arrival_airport_id1,
    return_flight.flight_number AS flight_number2,
    DATE_FORMAT(return_flight.departure_time, '%d/%m/%Y %H:%i') AS departure_time2,
    DATE_FORMAT(return_flight.arrival_time, '%d/%m/%Y %H:%i') AS arrival_time2,
    return_flight.departure_airport_id AS departure_airport_id2,
    return_flight.arrival_airport_id AS arrival_airport_id2
    FROM user_flight 
    JOIN flight AS oneway_flight ON flight_id=oneway_flight.id
    LEFT JOIN flight AS return_flight ON returnflight_id=return_flight.id
    WHERE booking_number=:bookingToEditId";
    //preparation PDO
    $statement = $pdo->prepare($query);
    $statement->bindValue(':bookingToEditId', $bookingToEditId, \PDO::PARAM_STR);
    $statement->execute();
    //end of preparation
    $booking=$statement->fetchAll();
    $booking=$booking[0];
    ?>
    
    <main class="backgroundLogin">
        <form class="reservation-container" method="post" action="../manageBooking/updatedSuccessfully.php">

        <h1 class="display-6">Modifier votre réservation</h1>
        <?php
        foreach($booking as $key => $value) {
            if (('departure_time1'==$key
            || 'departure_time2'==$key
            || 'arrival_time1'==$key 
            || 'arrival_time2'==$key)
            && $value != null) {
                $formattedDate=strtotime($value);
                $formattedDate=date('Y-m-d',$formattedDate);
                ?>
                <label class=""></label>
                <input type="date" name="<?php echo $key ?>" value="<?php echo $formattedDate ?>">
            <?php 
            } else if ($value!=$booking['departure_time1'] 
            && $value!=$booking['departure_time2']
            && $value!=$booking['arrival_time1']
            && $value!=$booking['arrival_time2']
            && is_int($key)) {
            ?>  
                <span class=""> <?php echo $value; echo ' '; ?> </span> 
            <?php
               
            }
        }
        ?>
        <input class="validatebtn" type="submit" value="Confirmer la modification">
        </form>
     </main>

    <?php require_once "../inc/footer.html"; ?>

</body>
</html>