<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link rel="stylesheet" href="fancy.css">
    <title>Informations passagers</title>
</head>

<body>
    <?php @require_once "header.php"; ?>
        
    <main class="backgroundPassengers">
        <div class="reservationContainerLogin">
            <h1 class="display-6">Informations
                <?php
                if (empty($_SESSION['oneWayFlight'])) {
                    $_SESSION['oneWayFlight']=$_POST;
                } else {
                    $_SESSION['returnFlight']=$_GET;
                }
                if (1==$_SESSION['nbPassengers']) {
                    echo 'passager';
                } else {
                    echo 'passagers';
                }
                ?>
            </h1>
            <form class="" method="post" action="summary.php">
                <?php
                for ($i=1; $i<=$_SESSION['nbPassengers']; $i++) { 
                ?>
                    <div class="passengerInformations">
                    
                        <h2 class="h2Passengers">Passager <?php echo $i ?></h2>
                        <label for="firstname"></label>
                        <input type="text" autocomplete="on" name="firstname<?php echo $i ?>" placeholder="Prénom" required 
                            <?php
                            if (1==$i) {
                                echo 'value="' . $_SESSION['firstname'] . '"';
                            }
                            ?>
                        >
    
                        <label for="lastname"></label>
                        <input type="text" autocomplete="on" name="lastname<?php echo $i ?>" placeholder="Nom" required 
                            <?php
                            if (1==$i) {
                                echo 'value="' . $_SESSION['lastname'] . '"';
                            }
                            ?>
                        >
    
                        <label for="birthdate"></label>
                        <input type="date" autocomplete="on" name="birthdate<?php echo $i ?>" placeholder="birthdate" required 
                            <?php
                            if (1==$i) {
                                echo 'value="' . $_SESSION['birthdate'] . '"';
                            }
                            ?>
                        >
    
                        
                                <label for="email"></label>
                                <input type="email" autocomplete="on" name="email<?php echo $i ?>" placeholder="E-mail (facultatif)" 
                                    <?php
                                    if (1==$i) {
                                        echo ' required value="' . $_SESSION['email'] . '"';
                                    }
                                    ?>
                                >
                            
                            
                            
                                <label for="phone"></label>
                                <input type="tel" autocomplete="on" name="phone<?php echo $i ?>" placeholder="Téléphone (facultatif)" 
                                    <?php
                                    if (1==$i) {
                                        echo ' required value="' . $_SESSION['phone'] . '"';
                                    }
                                    ?>
                                >
                    </div>
                <?php
                }
                ?>
                <input class="validatebtn" type="submit" value="Confirmer les passagers">
            </form>
        </div>
    </main>

    <?php @require_once "footer.html" ?>
</body>

</html>