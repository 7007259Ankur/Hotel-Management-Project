<?php

include '../config.php';

// Check if RoomID is set in the URL
if(isset($_GET['RoomID'])) {
    // Get the RoomID from the URL
    $RoomID = $_GET['RoomID'];

    // Prepare the delete SQL statement using a prepared statement
    $deletesql = "DELETE FROM payment WHERE RoomID = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $deletesql);

    // Bind the RoomID parameter
    mysqli_stmt_bind_param($stmt, "i", $RoomID);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect back to the payment page
    header("Location: payment.php");
} else {
    // Redirect back to the payment page if RoomID is not set in the URL
    header("Location: payment.php");
}

?>
