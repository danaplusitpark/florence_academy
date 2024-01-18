<?php  
     include '../connection/connection.php';
            error_reporting(0);
            session_start();
            // if($_SESSION['username'] != 'admin'){
            //       header("location:login.php");
            //       die();
            //    }
            // Process the uploaded image
                $targetDirectory = "../../uploads/ads/"; // Directory to store the uploaded image
                $targetFile = $targetDirectory . basename($_FILES["new_image"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Check if the file is an image
                $check = getimagesize($_FILES["new_image"]["tmp_name"]);
                if ($check !== false) {
                    // Check and limit the file size if necessary
                    if ($_FILES["new_image"]["size"] > 500000) {
                        $_SESSION['error'] = "Sorry, your file is too large.";
                    } else {
                        // If everything is fine, move the uploaded file to the designated folder
                        if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile)) {
                            // Update the image reference in the database
                            $sql = "UPDATE ads SET ads_img = '$targetFile' WHERE id = '$_GET[id]' ";
                            if ($con->query($sql) === TRUE) {
                                $_SESSION['success'] = "Image updated successfully";
                            } else {
                                $_SESSION['error'] = "Error updating image: " . $con->error;
                            }
                        } else {
                            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    $_SESSION['error'] = "File is not an image.";
                }
                header("Location: ../../pages/forms/ads_image.php");
                exit();
  ?>