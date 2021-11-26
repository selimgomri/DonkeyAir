<?php 
$errors =[];

if(!array_key_exists('name',$_POST) ||  $_POST['name'] == ''){
    $errors['name'] = "Vous n'avez pas rensigné votre nom";
}

if(!array_key_exists('lastname',$_POST)  || $_POST['lastname'] == ''){
    $errors['lastname'] = "Vous n'avez pas rensigné votre nom";
}

if(!array_key_exists('firsname',$_POST)  || $_POST['firsname'] == ''){
    $errors['firsname'] = "Vous n'avez pas rensigné votre prenom";
}
if(!array_key_exists('email',$_POST)  || $_POST['email'] == ''){
    $errors['email'] = "Vous n'avez pas rensigné votre email";
}
if(!array_key_exists('pwd',$_POST)  || $_POST['pwd'] == ''){
    $errors['pwd'] = "Vous n'avez pas rensigné votre mot de passe";
}

if(!array_key_exists('exampleFormControlTextarea1', $_POST)  || $_POST['exampleFormControlTextarea1'] == ''){
    $errors['exampleFormControlTextarea1'] = "Vous n'avez pas rensigné votre message";
}
 if(!empty($errors)){
     header('locatio: contact.php');
}
else
 

$message = $_POST['message'];
$header = 'FROM:sie@local.com';

mail('contact@local.com', 'formulaire de contact', $message,);
