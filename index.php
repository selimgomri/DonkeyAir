<?php
@require_once 'connectDB.php';
$query="SELECT id, airport_city FROM airport ORDER BY airport_city ASC";
$statement = $pdo->query($query);
$airports = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="fancy.css">
    <title>Reservez votre vol aller-retour au meilleur prix avec Donkey Airlines</title>
</head>

<body>
    <?php 
    @require_once 'header.php';
    array_splice($_SESSION,1, count($_SESSION));
    ?>
    <main class="backgroundIndex">
        <div class="flexbox">

            <form class="reservation-container" method="GET" action="booking.php">

                <h1 class="display-6">Réservez votre vol</h1>

                <label for="choix-depart"></label>
                <input list="airport" type="text" id="choix-depart" autocomplete="off" placeholder="Départ"
                    name="departureAirport" required>
                <datalist id="airport">

                    <?php foreach ($airports as $airport) { ?>
                    <option value="<?php
                        
                        foreach ($airport as $key => $departureAirport) {
                            if (!is_int($key)) {
                                echo $departureAirport . " ";
                            }
                        }
                        ?>">
                    </option>
                    <?php } ?>

                </datalist>

                <label for="choix-retour"></label>
                <input list="airport2" type="text" id="choix-retour" autocomplete="off" placeholder="Destination"
                    name="arrivalAirport" required>
                <datalist id="airport2">
                    <?php foreach ($airports as $airport) { ?>
                    <option value="<?php
                        
                        foreach ($airport as $key => $arrivalAirport) {
                            if (!is_int($key)) {
                                echo $arrivalAirport . " ";
                            }
                        }
                        ?>">
                    </option>
                    <?php } ?>
                </datalist></br>


                <input class="radioButton" type="radio" onclick="javascript:oneWayReturn();" name="radiobutton" id="oneWay" checked> 
                 <strong> Aller-Retour </strong>


                <input class="radioButton" type="radio" onclick="javascript:oneWayReturn();" name="radiobutton"
                    id="oneWay"> <strong> Aller Simple </strong> </br>


                <label class="datePicker"><strong>Aller</strong></label>
                <input type="date" id="departure-date" name="departureTime" required>

                <span id="ifChecked" style="visibility:visible">
                    <label class="datePicker"><strong>Retour</strong></label>
                    <input type="date" id="return-date" name="returnDate">
                </span>
                <span class="selectPassengers">
                    <select name="nbPassengers" id="nbPassengers">
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