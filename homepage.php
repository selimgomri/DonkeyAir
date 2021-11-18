<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="fancy.css">

    <title>Donkey Airlines</title>
</head>
<body>
    <header>
        <nav class="menu-container"> 
            <div class="logo-container">
                <a class="logo" href=""><img src="/media/DA_Logo2-01.svg" alt="logo"></a>
            </div>    
            <ul class="menu">
                <li class="gerer-menu"> <a href="#">Gérer mes reservations</a></li>
                <li class="donkey-menu"> <a href="#">Donkey Airlines</a></li>
                <li class="contact-menu"> <a href="#">Nous contacter</a></li>
                <li class="connection"> <a class="login" href="/loginpage.php">✈️ Votre espace</a></li>
            </ul>
        </nav>
        <div class="banner">
            <img id="bannerplane" src="/media/aircraft.jpg" alt="aircraftimg"/>
        </div>
    </header>
    <section>
        <div class="flexbox">
            
            <form class="reservation-container" method="post">    

                <h1 class="display-5">Réservez votre vol</h1>

                <label for="choix-depart"></label>
                <input list="airport" type="text" id="choix-depart" placeholder="Départ">
                <datalist id="airport">
                    <option value="Paris CDG">
                    <option value="London">
                    <option value="Barcelona">
                    <option value="Roma">
                </datalist> 

                <label for="choix-retour"></label>
                <input list="airport2" type="text" id="choix-retour" placeholder="Destination">
                    <datalist id="airport2">
                    <option value="Paris CDG">
                    <option value="London">
                    <option value="Barcelona">
                    <option value="Roma">
                </datalist> 
            
                <label for="choix-passagers"></label>
                <input list="airport" type="text" id="choix-passagers" placeholder="Nombre de passagers">
            
                <label>Aller</label>
                <input type="date" id="departure-date" name="departure-date">

                <label>Retour</label>
                <input type="date" id="return-date" name="return-date">

                <input class="validatebtn" type="submit" value="Rechercher parmi les vols">
            </form>
        </div>
    </section>
    <footer>
        <nav>     
            <ul class="footer">
                <li class="aboutme">A propos de nous</li>
                <li class="join">Rejoignez le club Donkey Pegasus</li>
                <li class="faq">FAQ</li>
                <li class="legalmentions">Mentions légales</li>
            </ul>
        </nav>
    </footer>
</body>
</html>