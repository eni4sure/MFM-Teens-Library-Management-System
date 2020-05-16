<?php 
$servername = "mfmteens.org";
$usernames   = "rgozmcih";
$password   = "bnh@..,/;;/'\de";
$dbname     = "rgozmcih_mfmteenlibrary";

$connection = new mysqli($servername, $usernames, $password, $dbname);

if($connection->connect_error){
	die($connection->connect_error);
}
?>