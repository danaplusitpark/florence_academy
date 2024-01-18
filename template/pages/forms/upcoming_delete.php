<?php
 include '../connection/connection.php';

// Check if the delete parameter exists in the URL
if (isset($_GET['event_dlt'])) {
    $idToDelete = $_GET['event_dlt'];

    // Delete the record from the database based on the provided ID
    $deleteQuery = "DELETE FROM upcoming_events WHERE id = '$idToDelete'";
    if (mysqli_query($con, $deleteQuery)) {
        // Redirect back to the page after deletion
        header("Location: upcoming_events.php?success=1");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No ID provided for deletion.";
}
?>
