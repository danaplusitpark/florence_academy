<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Florence Academy Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>

    <?php
         
        include("../connection/connection.php");

            error_reporting(0);
            session_start();
            // if($_SESSION['username'] != 'admin'){
            //       header("location:login.php");
            //       die();
            //    }
            if(isset($_POST['submit']))          
                { 
                  $name = $_POST["name"];
                  $description = $_POST["des"];
                  $fname = $_FILES['image']['name'];
                  $temp = $_FILES['image']['tmp_name'];
                  $fsize = $_FILES['image']['size'];
                  $extension = explode('.',$fname);
                  $extension = strtolower(end($extension));  
                  $fnew = uniqid().'.'.$extension;
                  $store = "../../uploads/blog/".basename($fnew);                    
                if($extension == 'jpg'||$extension == 'png'||$extension == 'gif'||$extension == 'jpeg' )
                  {        
                    if($fsize>=100000000)
                        {
                          $error =  '<div class="alert alert-dark alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Max Image Size is 1024kb!</strong> Try different Image.
                                    </div>';
                    }
                    else
                        { 
                        $sql = "INSERT INTO blog (b_img,b_name,b_description) VALUE('".$fnew."', '".$name."' ,'".$description."')";// store the submited data ino the database :images
                          
                        mysqli_query($con, $sql); 
                        move_uploaded_file($temp, $store);
                        $success =  '<div class="alert alert-light alert-dismissible fade show" role="ale">
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      Blog Added Successfully.
                                   </div>';
                              
                        }
                    }
                elseif($extension == '')
                    {
                      $error =  '<div class="alert alert-dark alert-dismissible fade show">
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  <strong>select image</strong>
                                  </div>';
                }
                else
                    {
                      $error =  '<div class="alert alert-dark alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>invalid extension!</strong>png, jpg, Gif are accepted.
                              </div>';
                }
             
          }
            
            $sqlRead = "SELECT * FROM blog order by id desc";
            $resultRead = $con->query($sqlRead);

        ?>  


    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <!-- <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Admin</h5>
                  <!-- <span>Gold Member</span> -->
                </div>
              </div>
              
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/slider1.php">
              <span class="menu-icon">
                <i class="mdi mdi-view-carousel"></i>
              </span>
              <span class="menu-title">Banner Slider1 </span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/slider2.php">
              <span class="menu-icon">
                <i class="mdi mdi-view-carousel"></i>
              </span>
              <span class="menu-title">Banner Slider2</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/blog.php">
              <span class="menu-icon">
                <i class="mdi mdi-tooltip-text"></i>
              </span>
              <span class="menu-title">Blog</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/upcoming_events.php">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-text"></i>
              </span>
              <span class="menu-title">Upcoming Events</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/social_media.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="menu-title">Social Media</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/subcription.php">
              <span class="menu-icon">
                <i class="mdi mdi-note-plus-outline"></i>
              </span>
              <span class="menu-title">Subscription</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/get_in_touch.php">
              <span class="menu-icon">
                <i class="mdi mdi-tag-faces"></i>
              </span>
              <span class="menu-title">Get in Touch</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/news_slider.php">
              <span class="menu-icon">
                <i class="mdi mdi-view-carousel"></i>
              </span>
              <span class="menu-title">News Slider</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/ads_image.php">
              <span class="menu-icon">
                <i class="mdi mdi-image"></i>
              </span>
              <span class="menu-title">Ads Image</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/study_materials.php">
              <span class="menu-icon">
                <i class="mdi mdi-book-open-variant"></i>
              </span>
              <span class="menu-title">Study Materials</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/study_materials_orders.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Study Material Orders</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/contact.php">
              <span class="menu-icon">
                <i class="mdi mdi-phone"></i>
              </span>
              <span class="menu-title">Contact</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/forms/testimonials.php">
              <span class="menu-icon">
                <i class="mdi mdi-star-half"></i>
              </span>
              <span class="menu-title">Testimonials</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <!-- <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              
              
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../../pages/forms/logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- form -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> BLOG  </h3>
              
            </div>
            <div class="row">
            <?php
                        if (!empty($error)) {
                            echo $error;
                        }
                        if (!empty($success)) {
                            echo $success;
                        }

                        if (isset($_GET['success']) && $_GET['success'] == 1) {
                          $successMessage = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                              Blog Deleted Successfully.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>';
                          // Display the success message
                          echo $successMessage;
                        }  

                          if (isset($_GET['updsuccess']) && $_GET['updsuccess'] == 1) {
                          $successMessage = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                              Blog Updated Successfully.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>';
                          // Display the success message
                          echo $successMessage;
                        }

                    ?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Blog Form</h4>
                    
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" required>
                      </div>
                      
                      
                      
                      <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="description here" name="des" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-info me-2" name="submit">Submit</button>
                      <button class="btn btn-dark" >Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          <!--form end-->
          <!-- Banner View -->
        
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Blog List  </h3>
              
            </div>
            <div class="row">
              
              
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Images</h4>
                    
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        if (!mysqli_num_rows($resultRead) > 0) 
                        {
                          echo "<td> No Category Data</td>";
                        }
                        else
                          {
                          while ($rowDate = mysqli_fetch_array($resultRead)) 
                            {
                            echo"<tr>";
                              echo"<td>".$i."</td>";
                              echo"<td>".$rowDate['b_name']."</td>";
                              echo"<td><img src='../../uploads/blog/" . htmlspecialchars($rowDate['b_img']) . "' style='width: 100px; height: 100px;''></td>";
                              echo"<td>".$rowDate['b_description']."</td>";
                              echo"<td>
                                <a class='btn btn-info btn-flat btn-addon btn-xs m-b-10'  style='font-size:15px; padding:5px;'  href='blog_update.php?b_upd=".$rowDate['id']."'><i class='fa fa-edit'></i></a>
                                <a class='btn btn-info btn-flat btn-addon btn-xs m-b-10'  style='font-size:15px; padding:5px;' href='blog_delete.php?b_dlt=".$rowDate['id']."'><i class='fa fa-trash'></i></a>
                              </td>";
                              echo"<td></td>";
                              echo"<td></td>";
                            echo"</tr>";
                            $i++;
                            }
                          }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
              
              
              
              
            </div>
          <!--Banner View End-->

          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>