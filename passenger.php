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
            <h1 class="display-7">Informations
            <?php
            $_SESSION['returnFlight']=$_POST;
            if (1==$_SESSION['nbPassengers']) {
                echo 'passager';
            } else {
                echo 'passagers';
            }
            ?>
        </h1>
        <form class="reservationContainerLogin" method="post" action="summary.php">
            <?php
            for ($i=1; $i<=$_SESSION['nbPassengers']; $i++) { ?>
            <div class="reservationContainerLogin">

                <h2>Passager <?php echo $i ?></h2>
                <label for="firstname"></label>
                <input type="text" autocomplete="on" name="firstname<?php echo $i ?>" placeholder="Prénom" required <?php
                if (1==$i) {
                    echo 'value=' . $_SESSION['firstname'];
                }
                ?>>

                <label for="lastname"></label>
                <input type="text" autocomplete="on" name="lastname<?php echo $i ?>" placeholder="Nom" required <?php
                if (1==$i) {
                    echo 'value=' . $_SESSION['lastname'];
                }
                ?>>

                <label for="birthdate"></label>
                <input type="date" autocomplete="on" name="birthdate<?php echo $i ?>" placeholder="birthdate" required <?php
                if (1==$i) {
                    echo 'value=' . $_SESSION['birthdate'];
                }
                ?>>

                <div class="formatFacultatif">
                    <div class="columnFormatFacultatif">
                        <label for="email"></label>
                        <input type="email" autocomplete="on" name="email<?php echo $i ?>" placeholder="Adresse email" <?php
                if (1==$i) {
                    echo " required value= " . $_SESSION['email'];
                }
                ?>>
                        <?php
                if ($i>1) { ?>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            facultatif
                        </small>
                        <?php
                }
                ?>
                    </div>

                    <div class="columnFormatFacultatif">
                        <label for="phone"></label>
                        <input type="tel" autocomplete="on" name="phone<?php echo $i ?>" placeholder="Téléphone" <?php
                if (1==$i) {
                    echo " required value= " . $_SESSION['phone'];
                }
                ?>>
                        <?php
                if ($i>1) { ?>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            facultatif
                        </small>
                        <?php
                }
                ?>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
            <input class="validatebtn" type="submit" value="Suivant">

        </form>
    </main>

    <?php @require_once "footer.html" ?>
</body>

</html>