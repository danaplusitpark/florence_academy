<?php
 include '../connection/connection.php';

// Check if the delete parameter exists in the URL
if (isset($_GET['dltid'])) {
    $idToDelete = $_GET['dltid'];

    // Delete the record from the database based on the provided ID
    $deleteQuery = "DELETE FROM social_media WHERE id = '$idToDelete'";
    if (mysqli_query($con, $deleteQuery)) {
        // Redirect back to the page after deletion
        header("Location: social_media.php?success=1");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No ID provided for deletion.";
}
?>
