<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fancy.css">
    <title>Modification confirmée</title>
</head>

<body>
    <?php
    @require_once '../connectDB.php';
    @require_once '../inc/header.php';
    ?>
    
    <main class="backgroundSummary">
        <div class="displayBoxShadow">
            <div class="bookingResultBoxes">
                <h1 class="displayConfirmationH1"> Votre voyage a bien été modifié !</h1>
                <h2 class="displayConfirmationH2"> ✅ Un e-mail de confirmation vient de vous être envoyé </h2>
            </div>
        </div>
    </main>

    <?php
    @require_once '../inc/footer.html';
    ?>
</body>

</html>