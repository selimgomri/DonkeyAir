<?php
session_start();
@require_once '../connectDB.php';
$id=$_GET['id'];
$query="DELETE FROM user_flight WHERE booking_number=$id";
$statement = $pdo->exec($query);
header('Location: history.php');


