<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = " ";
$dbName = "foody";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    die('Could not Connect My Sql:' .mysql_error());
}
?>