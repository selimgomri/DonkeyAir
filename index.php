<?php
@include 'connectDB.php';
$query="SELECT departureAirport, arrivalAirport FROM flight
ORDER BY departureAirport ASC";
$statement = $pdo->query($query);
$airports = $statement->fetchAll();

// creating departure and arrival array with unique airports
foreach ($airports as $values) {
    $departureAirports[]=$values['departureAirport'];
}
$departureAirports=array_unique($departureAirports);
foreach ($airports as $values) {
    $arrivalAirports[]=$values['arrivalAirport'];
}
$arrivalAirports=array_unique($arrivalAirports);
// end of creating departure and arrival array with unique airports

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
    <script src="radiobutton.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>Donkey Airlines</title>
</head>

<body>

<?php @require_once 'header.html' ?>

    <main class="backgroundIndex">
        <div class="flexbox">

            <form class="reservation-container" method="POST" action="booking.php">

                <h1 class="display-5">Réservez votre vol</h1>

                <label for="choix-depart"></label>
                <input list="airport" type="text" id="choix-depart" autocomplete="off" placeholder="Départ" name="departureAirport" required>
                <datalist id="airport">

                    <?php foreach ($departureAirports as $departureAirport) { ?>
                    <option value="<?php echo $departureAirport; ?>">
                        <?php echo $departureAirport; ?>
                    </option>
                    <?php } ?>
                </datalist>

                <label for="choix-retour"></label>
                <input list="airport2" type="text" id="choix-retour" autocomplete="off" placeholder="Destination" name="arrivalAirport" required>
                <datalist id="airport2">

                    <?php foreach ($arrivalAirports as $arrivalAirport) { ?>
                    <option value="<?php echo $arrivalAirport; ?>">
                        <?php echo $arrivalAirport; ?>
                    </option>
                    <?php } ?>
                </datalist></br>

                <input class="radioButton" type="radio" onclick="javascript:oneWayReturn();" name="radiobutton" id="oneWay" checked> <strong> Aller Retour </strong>

                <input class="radioButton" type="radio" onclick="javascript:oneWayReturn();" name="radiobutton" id="oneWay"> <strong> Aller Simple </strong> </br>


                <label class="datePicker"><strong>Aller</strong></label>
                <input type="date" id="departure-date" name="departureTime" required>

                <span id="ifChecked" style="visibility:visible">
                    <label><strong>Retour</strong></label>
                    <input type="date" id="return-date" name="returnDate">
                </span>
                <span class="selectPassengers">
                    <select name="passengers" id="passengers">
                        <option value="1">1 passager</option>
                        <option value="2">2 passagers</option>
                        <option value="3">3 passagers</option>
                        <option value="4">4 passagers</option>
                        <option value="5">5 passagers</option>
                        <option value="6">6 passagers</option>
                        <option value="7">7 passagers</option>
                        <option value="8">8 passagers</option>
                    </select> 
                </span>


                <input class="validatebtn" type="submit" value="Rechercher parmi les vols">
            </form>
        </div>
    </main>

<?php @require_once 'footer.html' ?>

</body>

</html>