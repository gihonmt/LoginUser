<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "database_login";

$konek_database = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($konek_database));