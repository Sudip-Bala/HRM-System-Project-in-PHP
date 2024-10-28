<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "hrm_system";

// Database connection
$conn = new mysqli($hostName,$dbUser,  $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
        die("Something Went Wrong;");
}

?>

