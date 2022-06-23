<?php
date_default_timezone_set("Asia/Calcutta");
$servername = "localhost";
$Server_username = "root";
$password = "";
$dbname = "jmgmt";

$conn = new mysqli($servername,$Server_username,$password,$dbname);

if($conn->connect_error){
    die("con failed");
}
?>
