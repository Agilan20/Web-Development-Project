

<?php
session_start();
include "config.php"; 
//storing the cart of the particular user in the table

$users_str = serialize($_SESSION['cart']);
$sql="UPDATE `carthistory` SET `username`='$_SESSION[email]',`cartdetails`='".$users_str."' WHERE `username`='$_SESSION[email]'";
mysqli_query($conn,$sql); 
//destroying the session
session_destroy();
echo "<script>alert('Logged out successfully');
      window.location.href='login.php';
      </script>";      
?>