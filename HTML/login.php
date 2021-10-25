<?php 
include 'config.php';
error_reporting(0);
session_start();
//if already logged in
if (isset($_SESSION['username'])){
    header("Location:menu.php");
}
//if login form is filled
if (isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['email']=$row['email'];
        $_SESSION['total']=0;
		//retaining the cart history of the user from the table
		$sql = mysqli_query($conn,"SELECT * FROM carthistory where username='$_SESSION[email]'");
		while($row = mysqli_fetch_assoc($sql)){
            $arraycart=$row['cartdetails'];
   			$_SESSION['cart']=unserialize($arraycart);
		}
        if (!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key => $value)
        {
            $_SESSION['total']+=$value['Quantity'];
        }
        }
        else{
            $_SESSION['total']=0;
        }
        if(!empty($_POST['cookie']))
        {
            setcookie('name',$email,time()+(7*24*60*60));
            setcookie('password',$password,time()+(7*24*60*60));
        }
		echo "<script>alert('Logged in successfully');
         window.location.href='login.php';
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
    <title>Login</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/loginform.css?v=<?php echo time();?>'>
</head>
<body>
	<header class='header'>
        <div class='title'>
           
            <a class='logo' href=''><i class='fas fa-pizza-slice'></i> The <span class='logotitle'>Olio</span></a>
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
                            <a href='admin-login.php'>Admin Login</a>
                        </li>
                        
                    </ul>
                </li>
                <li><a href='about.php'><i class='fa fa-info'></i> About Us</a></li>
            </ul>
        </nav>
        
    </header>
    <section class="home" id="home">
        <div class="image">
            <img src="../image/user.png" alt="">
        </div>
        <div class="form">
            <div class="container">
            <h3>Login</h3>
                <form action='#' method='post'>
                <label>Email</label><br>
                <input type="email" name="email" value="<?php if (isset($_COOKIE['name'])){echo $_COOKIE['name'];}?>" required><br>   
                <label>Password</label><br>
                <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" required><br>   
                <button name="submit" class="btn">Login</button>
                <input type="checkbox" name='cookie'>
                <label>Remember me</label>
                  </form>
				<p>Don't have an account?<a href='signup.php'>Sign up here.</a>
                <p>Are you an admin?<a href='admin-login.php'>Login Here.</a>
            </div>
        </div>   
   </section>
</body>
</html>


