<?php

require_once 'kapcsolat.php';

$kapcs = mysqli_connect(HOST, USER, PW, AB) or die ("Sikertelen kapcsolódás");

$kereses = "SELECT * FROM `ugyfel`;" or die("Nincs adat"); 

$sql = mysqli_query($kapcs, $kereses) or die("Sikertelen lekérdezés");

$figyelt= array();
$kapottfajl = array();
$uj = array();

if (mysqli_num_rows($sql) > 0){ 
while ($row = mysqli_fetch_array($sql))
    { 
    echo $row[1]."<br>";
    $figyelt[]=$row[1];  
    }
}

for ($x = 0; $x < count($figyelt); $x++) {
    echo $figyelt[$x];
    echo "<br>";
}

$kapottfajl = file("proba.txt");
foreach ($kapottfajl as $value) {
    echo $value . "<br>";
}

$txt =" ";
for ($x = 0; $x < count($uj); $x++) {
    $txt .= $uj[$x]."\r\n";
}
$myfile5 = fopen("uj.txt", "w");
fwrite($myfile5, $txt);
fclose($myfile5);


     