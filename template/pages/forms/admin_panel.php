<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome to the Admin Panel</h2>
    <!-- Your admin panel content goes here -->
    <p>This is the protected area for admins.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
