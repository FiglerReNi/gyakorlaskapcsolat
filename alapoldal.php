<?php

$nev = test_input($_POST["name"]);
$email = test_input($_POST["email"]);


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo $nev."<br>";
echo $email."<br>";


//if(!filter_var($email, FILTER_VALIDATE_EMAIL)); e-mail ellenőrzés
//if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)); URL ellenőrzés
