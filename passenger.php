<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Pour reserver votre vol au meilleur prix et vers les plus grandes destinations, Donkey Airlines vous propose le meilleur confort et la meilleure expérience à bord. ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">
    <title>Informations passagers</title>
</head>

<body>
    <?php @require_once "header.php"; ?>
    <h1 class="display-5">Informations passagers</h1>
    <form class="reservationContainerLogin">
        <?php
        for ($i=1; $i<$_SESSION['passengers']['nbPassengers']; $i++) { ?>
        <form class="reservationContainerLogin">

            <h2>Passager <?php echo $i ?></h2>
            <label for="firstname"></label>
            <input type="text" autocomplete="on" name="firstname" placeholder="Prénom" required
            <?php 
            if (1==$i) {
                echo 'value=' . $_SESSION['firstname'];
            }
            ?>>
          
            <label for="lastname"></label>
            <input type="text" autocomplete="on" name="lastname" placeholder="Nom" required 
            <?php 
            if (1==$i) {
                echo 'value=' . $_SESSION['lastname'];
            }
            ?>>

            <label for="birthdate"></label>
            <input type="date" autocomplete="on" name="birthdate" placeholder="birthdate" required
            <?php 
            if (1==$i) {
                echo 'value=' . $_SESSION['birthdate'];
            }
            ?>>

            <label for="email"></label>
            <input type="email" autocomplete="on" name="email" placeholder="Adresse email" 
            <?php
            if (1==$i) {
                echo " required value= " . $_SESSION['email'];
            }
            ?>> 

            <label for="phone"></label>
            <input type="tel" autocomplete="on" name="phone" placeholder="Téléphone" 
            <?php
            if (1==$i) {
                echo " required value= " . $_SESSION['phone'];
            }
            ?>>

        </form>
        <?php
        }
        ?>
        <input class="validatebtn" type="submit" value="Suivant">
    </form>

    <?php @require_once "footer.html" ?>
</body>

</html>