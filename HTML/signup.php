<?php 
session_start();
//database connection
include 'config.php';
//if already logged in
if (isset($_SESSION['username'])) {
    header("Location:menu.php");
}
//if sign up form is submitted
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phoneno=$_POST['phoneno'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	//whether the passwords match
	if ($password == $cpassword) {
		$sql = "SELECT * FROM registration WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		//check whether the email already exist
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO registration (username, email,phoneno,password)
					VALUES ('$username', '$email','$phoneno', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) 
			{
				//assigning a cart array for each user at beginning of opeing an account
				$_SESSION['cart']=Array();
				$users_str = serialize($_SESSION['cart']);
				$sql = "INSERT INTO carthistory (username,cartdetails) VALUES('$email','".$users_str."')";
				mysqli_query($conn,$sql); 
				echo "<script>alert('User registration completed successfully');
                window.location.href='login.php';
                </script>";
				$username = "";
				$email = "";
				$phoneno="";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something went wrong.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Passwords do not Match.')</script>";
	}
}
?>
<!DOCTYPE html>
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
    <title>Sign Up</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/signup.css'>
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
                <li><a href='about.php'><i class='fas fa-info'></i> About Us</a></li>
            </ul>
        </nav>
        
    </header>
    <section class="home" id="home">
        <div class="image">
            <img src="../image/user.png" alt="">
        </div>
        <div class="form">
            
            <div class="container">
            <h3>Sign Up</h3>
                <form action='#' method='post' name='signupform' onsubmit='return validation()'>
                <label>Name</label><br>
                <input type="text" name="username" > <br> 
                <p id='namevalidation'></p>  
                <label>Email</label><br>
                <input type="email" name="email" ><br> 
                <p id="emailvalidation"></p>  
                <label>Phone</label><br>
                <input type="tel" name="phoneno" ><br>  
                <p id="phonevalidation"></p> 
                <label>Password</label><br>
                <input type="password" name="password" ><br> 
                <p id="passwordvalidation"></p>  
                <label>confirm Password</label><br>
                <input type="password" name="cpassword" >
                <p id="cpasswordvalidation"></p>  
                <button name="submit" class="btn">Sign Up</button>
                  </form>
				<p>Already have an account?<a href='login.php'>Login here.</a>
            </div>
        </div>   
   </section>
   <script>
       function validation(){
            let a=document.forms['signupform']['username'].value;
            let b=document.forms['signupform']['email'].value;
            let c=document.forms['signupform']['phoneno'].value;
            let d=document.forms['signupform']['password'].value;
            let e=document.forms['signupform']['cpassword'].value;
            var emailvalid=/\S+@\S+\.\S+/;
            var x=0;
            if(a==''){
                document.getElementById('namevalidation').innerHTML='Name should not empty';
                x=1;
            }
            if(b==''){
                document.getElementById('emailvalidation').innerHTML='Email should not empty';
                x=1;
            }
            
            if(c==''){
                document.getElementById('phonevalidation').innerHTML='phone number should not empty';
                x=1;
            }
            if(d==''){
                document.getElementById('passwordvalidation').innerHTML='password should not empty';
                x=1;
            }
            if(d!=e){
                document.getElementById('passwordvalidation').innerHTML='Passwords do not match';
                return false;
            }
            
            if (x!=0){
                return false;
            }
       }
   </script>

</body>
</html>