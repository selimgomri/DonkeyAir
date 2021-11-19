<?php

// DB CONNECTION
$servername = "localhost";
$username = "root";
$password = "Sierra210Mike!";
$db = "Donkey_Airlines";

$connection = mysqli_connect($servername, $username, $password);
mysqli_select_db($connection, $db);

?>