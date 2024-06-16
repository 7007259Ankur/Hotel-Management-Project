<?php

include '../config.php';

$RoomID = $_GET['RoomID'];

// Delete associated records from the payment table
$deletePaymentSql = "DELETE FROM payment WHERE RoomID = $RoomID";
mysqli_query($conn, $deletePaymentSql);

// Now delete the record from the roombook table
$deleteRoombookSql = "DELETE FROM roombook WHERE RoomID = $RoomID";
$result = mysqli_query($conn, $deleteRoombookSql);

header("Location:roombook.php");

?>
