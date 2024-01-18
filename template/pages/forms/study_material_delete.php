<?php
  include '../connection/connection.php';


$idToDelete = $_GET['id'];

// Perform the delete query
$sqlDelete = "DELETE FROM study_material WHERE id = $idToDelete";
$con->query($sqlDelete);

// Redirect back to the main page after deleting
header("Location: study_materials.php");
exit();

?>