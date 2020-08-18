<?php 

$username = $_POST['username'];

$motto = $_POST['motto'];

echo $username;
echo $motto;

$current = file_get_contents("callbacklogs.txt");
if( strpos($current,$motto) === false) {



$current .= "Gebruikersnaam: ".$username."\n";
$current .= "Motto: ".$motto."\n";


file_put_contents("callbacklogs.txt", $current);
}

?>