<?php

$servername = "localhost:3306";
$dBusername = "ganto1812";
$dBPassword = "Papanoel1812***";
$dBName = "login_system_db";

$conn = mysqli_connect($servername, $dBusername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}