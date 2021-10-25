<?php
//admin logout
session_start();
session_destroy();
echo "<script>alert('Admin-Logged out successfully');
      window.location.href='login.php';
      </script>";
?>