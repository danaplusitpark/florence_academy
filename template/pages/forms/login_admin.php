<?php
    session_start();
  include_once("../connection/connection.php");  


  if($_SESSION['SessionVerified'] != true){
    header("location:login_form.php");
    die();
 }

  if(isset($_POST['submit']))
  {
    $username=$_POST["username"];
    $password=$_POST["password"];
      $sql = "SELECT * FROM `adminlogin` WHERE username='$username' and password='$password'";
      
      $result=mysqli_query($con,$sql);
      if(mysqli_num_rows($result) > 0){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        echo ("<script LANGUAGE='JavaScript'>
            
            window.location.href='index.php';
            </script>");
        
      }else{
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Invalied Login...');
            window.location.href='login.php';
             </script>");
      }
    }
    
?>