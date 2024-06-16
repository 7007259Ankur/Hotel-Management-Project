<?php

include '../config.php';

$RoomID = $_GET['RoomID'];

$roomdeletesql = "DELETE FROM room WHERE RoomID = $RoomID";

$result = mysqli_query($conn, $roomdeletesql);

header("Location:room.php");

?>