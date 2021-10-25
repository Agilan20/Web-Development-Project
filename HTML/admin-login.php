<?php 
include 'config.php';
session_start();
//if admin has already logged in
if (isset($_SESSION['adminemail'])){
    header("Location:admin_items.php");
}
//if admin form is filled
if (isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM adminlogin WHERE adminlogin='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
        //initializing session variable
		$_SESSION['adminemail']=$row['adminlogin'];
		$_SESSION['adminusername']=$row['adminusername'];
		echo "<script>alert('Logged in successfully');
                window.location.href='admin_items.php';
                </script>";
	} else {
		echo "<script>alert('Invalid Credentials.')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="EN"/>
    <meta name="descriptions" content="The Olio"/>
    <meta name="author" content="Agilan B (2020115005)"/>
    <meta name="keywords" content="the olio,menu,login,signup,admin portal"/>
    <link rel = "icon" href = "../image/favicon.png">
    <title>Admin Login</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
	<link rel='stylesheet' href='../CSS/adminlogin.css?v=<?php echo time();?>'>
</head>
<body>
<header class='header'>
        <div class='title'>
            <a class='logo' href='../index.php'><i class='fas fa-pizza-slice'></i> The <span class='logotitle'>Olio</span></a>
        </div>
            <input type='checkbox' name='checkbox' id='menu-bar'>
            <label for='menu-bar'><i class='fas fa-bars'></i></label>
        <nav class='navbar'>
            <ul>
                <li><a href='../index.php'><i class='fas fa-home'></i> home</a></li>
                <li><a href='menu.php'><i class="fa fa-file"></i> Menu</a></li>              
                <li>
                    <a href=''><i class='fa fa-user-circle-o'></i> Account</a>
                    <ul>
                        <li>
                            <a href='login.php'>User Login</a>
                        </li>
                        <li>
                            <a href='signup.php'>sign up</a>
                        </li>
                        <li>
                            <a href='adminlogin.php'>Admin Login</a>
                        </li>
                        
                    </ul>
                </li>
                <li><a href='about.php'>About Us</a></li>
            </ul>
        </nav>
        
    </header>
    <section class="home" id="home">
        <div class="image">
            <img src="../image/user.png" alt="">
        </div>
        <div class="form">
            <div class="container">
            <h3>Admin Login</h3>
                <form action='#' method='post'>
                <label>Email</label><br>
                <input type="email" name="email" required><br>   
                <label>Password</label><br>
                <input type="password" name="password" required><br>   
                <button name="submit" class="btn">Login</button>
                  </form>
				<p>Are you a user?<a href='login.php'>Login Here.</a>
            </div>
        </div>   
   </section>
</body>
</html>