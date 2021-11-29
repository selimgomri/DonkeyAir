#Once you've cloned the repo
1. Open bash in the repo folder (DONKEYAIR) 
2. Enter this command to import the database: mysql -u root -p < DonkeyAirDB.sql 
3. In the folder DONKEYAIR create a file and name it "connectDB.php"
4. Open this file and write in it:
<?php
define('DSN', 'mysql:host=localhost;dbname=donkeyAirDB');
define('USER', 'root');
define('PASS', '');
$pdo = new \PDO(DSN, USER, PASS);
5. If you connect with another user to the database, replace 'root' by 'yourusername', 
also if you have a password replace '' with 'yourpassword'