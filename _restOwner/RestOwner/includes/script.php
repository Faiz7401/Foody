<?php

require_once('db.inc.php');

// Get the variables.
$id = $_GET['id'];
$chk = $_GET['availability'];
echo $id;
echo $chk;

$conn->query("UPDATE menu SET status_availability ='$chk' WHERE id = $id") or die($conn->error());

?>