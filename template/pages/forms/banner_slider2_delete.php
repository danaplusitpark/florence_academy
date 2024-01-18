<?php
include("../connection/connection.php");

// Check if the delete parameter exists in the URL
if (isset($_GET['dlt'])) {
    $idToDelete = $_GET['dlt'];

    // Delete the record from the database based on the provided ID
    $deleteQuery = "DELETE FROM banner_slider2 WHERE id = '$idToDelete'";
    if (mysqli_query($con, $deleteQuery)) {
        // Redirect back to the page after deletion
        header("Location: slider2.php?success=1");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No ID provided for deletion.";
}
?>