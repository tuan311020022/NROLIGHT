<?php
$username_mysql = "nroshin1_adshine";
$password_mysql = "vnm.ntp.20901";
$servername = "103.200.23.179";
$dbname = "nroshin1_shine";

// Create connection
// MySQLi Object-oriented
$connect = new mysqli($servername, $username_mysql, $password_mysql, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>