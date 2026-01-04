<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tiere";

$db  = new mysqli($host, $user, $password, $database);

if($db->connect_error){
    die("Datenbankverbidnung fehlgeschlagen: " . $db->connect_error);
}
?>