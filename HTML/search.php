<?php 
include 'config.php';
session_start();
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
    <title>Search Results</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/menu.css?v=<?php echo time();?>'>
    <link rel = "icon" href = "../image/favicon.png">
    <title>Search Results</title>
    <style>
        /*go back text*/
        .goback{
            text-align:center;
            color:#4abdac;
        }
        .goback a{
            text-decoration:none;
            color:#4abdac;
        }
    </style>
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
                <?php
                if (isset($_SESSION['username'])) {
                    
                echo "<li><a href='cart.php'><i class='fa fa-shopping-cart'></i> cart($_SESSION[total])</a></li>
                <li>
                    <a href='history.php'><i class='fa fa-user-circle-o'></i> $_SESSION[username]</a>
                    <ul>
                        <li>
                            <a href='history.php'>history</a>
                        </li>
                        <li>
                            <a href='logout.php'>logout</a>
                        </li>
                    </ul>
                </li>";
                }
                else{
                    echo "<li>
                    <a href='login.php'><i class='fa fa-user-circle-o'></i> Account</a>
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
                </li>";
                
                }
                ?>
                <li><a href='about.php'>About Us</a></li>
            </ul>
        </nav>
        
    </header>
    <section class='menusection'>
    <h1 class="title">Search results<h1>
    <div class='container'>
        <?php
        if(isset($_POST['searchbutton']))
    {
            $sql="SELECT * FROM food_items where category LIKE '%$_POST[searchbox]%' or name LIKE '%$_POST[searchbox]%' or origin LIKE '%$_POST[searchbox]%' ";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result))
            {
                echo "
                <div class='itemcard'>
                    <div class='image'><img src='../image/$row[image]' alt=''></div>
                    <div class='info'>
                        <h3>$row[name]</h3>
                        <strong class='pricedis'>Category: $row[category]</strong><br>
                        <strong class='price'>&#8377; $row[price]/- for one &#8226; $row[delivery] min</strong><br>
                        <strong class='pricedis'>$row[discount]% OFF</strong>
                        
                        <br>
                        <form action='manage_cart.php' method='post'>
                            <button type='submit' name='Add_To_Cart' class='order'>Add to Cart <i class='fa fa-shopping-cart'></i></button>
                            <input type='hidden' name='Item_Name' value='$row[name]'>
                            <input type='hidden' name='Price' value='$row[price]'>
                            <input type='hidden' name='Delivery' value='$row[delivery]'>
                            <input type='hidden' name='discount' value='$row[discount]'>
                            <input type='hidden' name='image' value='../image/$row[image]'>
                        </form>
                    </div>
                </div>";
            }
    }
    ?>
    </div>
</section>
    <p class='goback'><a href="menu.php">Go back</a></p>
    <footer class='footer'>
  	 <div class='footercontainer'>
  	 	<div class='row'>
  	 		<div class='footer-col'>
  	 			<h4>The olio</h4>
  	 			<ul>
  	 				<li><a href='../index.php'>Home</a></li>
  	 				<li><a href='menu.php'>our menu</a></li>
  	 				<li><a href='about.php'>About us</a></li>
  	 				<li><a href='about.php#privacy_policy'>privacy policy</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>account</h4>
  	 			<ul>
  	 				<li><a href='login.php'>user login</a></li>
  	 				<li><a href='signup.php'>sign up</a></li>
  	 				<li><a href='admin-login.php'>Admin login</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>category</h4>
  	 			<ul>
  	 				<li><a href='menu.php#indiansection'>Indian</a></li>
  	 				<li><a href='menu.php#tamilnadusection'>tamilnadu</a></li>
  	 				<li><a href='menu.php#internationalsection'>international</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>follow us</h4>
  	 			<div class='social-links'>
  	 				<a href=' https://www.facebook.com/profile.php?id=100069065425666' target='_blank'><i class='fab fa-facebook-f'></i></a>
  	 				<a href='https://twitter.com/Agilan44010096?s=09'><i class='fab fa-twitter'></i></a>
  	 				<a href='https://www.instagram.com/agilan_20042003/'><i class='fab fa-instagram'></i></a>
  	 				<a href='https://www.linkedin.com/in/agilan-b-45bb1b1bb' target='_blank'><i class='fab fa-linkedin-in'></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
</body>
</html>