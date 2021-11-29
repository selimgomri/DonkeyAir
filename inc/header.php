<header>
    <nav class="menu-container">
        <div class="logo-container">
            <a href="../index.php"></a>
        </div>
        <ul class="menu">
            <li> <a href="../manageBooking/history.php">Gérer mes reservations</a></li>
            <li> <a href="#">Donkey Airlines</a></li>
            <li> <a href="#">Nous contacter</a></li>
            <?php
            session_start();
            if (!empty($_SESSION['user']['firstname'])) { ?>
                <li> <?php echo "Welcome " . $_SESSION['user']['firstname'] . " "; ?> </li>
                <a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i></a>
            <?php
            } else { ?>
                <li class="connection"> <a class="login" href="../login/loginpage.php">✈️ Votre espace</a></li>
            <?php
            }
            ?> 
        </ul>
    </nav>
</header>