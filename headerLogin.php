<header>
    <nav class="menu-container">
        <div class="logo-container">
            <a class="logo" href="/index.php"> <img src="/media/DA_Logo2-01.svg " alt="logo"></a>
        </div>
        <ul class="menu">
            <li> <a href="/index.php">Réservez votre vol</a></li>
            <li> <a href="#">Donkey Airlines</a></li>
            <li> <a href="#">Nous contacter</a></li>
            <?php
            session_start();
            if (!empty($_SESSION['firstname'])) { ?>
            <li> <?php echo "Welcome " . $_SESSION['firstname'] . " "; ?> </li>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            <?php
            } else { ?>
            <li class="connection"> <a class="login" href="/loginpage.php">✈️ Votre espace</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>