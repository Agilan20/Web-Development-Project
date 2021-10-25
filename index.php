<?php 
include './HTML/config.php';
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
    <link rel = "icon" href = "./image/favicon.png">
    <title>Home</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='./CSS/index.css?v=<?php echo time();?>'>
</head>
<body>
<section class="headersection">
<header class='header'>
        <div class='title'>
           
            <a class='logo' href='index.php'><i class='fas fa-pizza-slice'></i> The <span class='logotitle'>Olio</span></a>
        </div>
            <input type='checkbox' name='checkbox' id='menu-bar'>
            <label for='menu-bar'><i class='fas fa-bars'></i></label>
        <nav class='navbar'>
            <ul>
                <li><a href='index.php'><i class='fas fa-home'></i> home</a></li>
                <li><a href='./HTML/menu.php'><i class="fa fa-file"></i> Menu</a></li>
                
                
                <?php
                if (isset($_SESSION['username'])) {
                    
                echo "
                <li><a href='./HTML/cart.php'><i class='fa fa-shopping-cart'></i> cart($_SESSION[total])</a></li>
                <li>
                    <a href='./HTML/history.php'><i class='fa fa-user-circle-o'></i> $_SESSION[username]</a>
                    <ul>
                        <li>
                            <a href='./HTML/history.php'>history</a>
                        </li>
                        <li>
                            <a href='./HTML/logout.php'>logout</a>
                        </li>
                    </ul>
                </li>";
                }
                else{
                    echo "<li>
                    <a href=''><i class='fa fa-user-circle-o'></i> Account</a>
                    <ul>
                        <li>
                            <a href='./HTML/login.php'>User Login</a>
                        </li>
                        <li>
                            <a href='./HTML/signup.php'>sign up</a>
                        </li>
                        <li>
                            <a href='./HTML/admin-login.php'>Admin Login</a>
                        </li>
                        
                    </ul>
                </li>";
                
                }
                ?>
                <li><a href='./HTML/about.php'>About Us</a></li>
            </ul>
        </nav>
        
    </header>
    
    <div class="headercontent">
            <h3>Welcome to <span class='titleblock'>the olio</span></h3>
            <p>Food made with love. in our restaurant you will explore food made by highly experienced chefs. Our food is made with organic material and is healthy. </p>
            <div class='a'><a href='./HTML/menu.php'>Explore</a></div>
        </div>
        <div class="image">
            <img src="./image/index.png" alt="">
        </div>
            </section>
        <!-- -->
        <h1>How we function</h1>
        <div class='container'>
            <div class='itemcard'>
                <div class='image'><img src='./image/order.png' alt=''></div>
                <div class='info'><h3>Order</h3>
                </div>
            </div>
            <div class='itemcard'>
                <div class='image'><img src='./image/deliveryboy.png' alt=''></div>
                <div class='info'><h3>Wait for delivery</h3>
                </div>
            </div>
            <div class='itemcard'>
                <div class='image'><img src='./image/pay.png' alt=''></div>
                <div class='info'><h3>Pay on delivery</h3>
                </div>
            </div>
            <div class='itemcard'>
                <div class='image'><img src='./image/enjoy.png' alt=''></div>
                <div class='info'><h3>Enjoy your food</h3>
                </div>
            </div>
        </div>
<!----> 
            <h1 class='container2h1'>Popular Food items</h1>
            <div class='container2'>
                <div class='itemcard2'>
                    <div class='image'><img src='./image/1.png' alt=''></div>
                    <div class='info2'>
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/2.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/3.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/4.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
            </div>
     <!----> 
            <div class='container3'>
                <div class='itemcard2'>
                    <div class='image'><img src='./image/5.png' alt=''></div>
                    <div class='info2'>
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/6.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/7.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
                <div class='itemcard2'>
                    <div class='image2'><img src='./image/8.png' alt=''></div>
                    <div class='info2'>              
                    </div>
                </div>
            </div>
           <!--footer-->
           <footer class='footer'>
  	 <div class='footercontainer'>
  	 	<div class='row'>
  	 		<div class='footer-col'>
  	 			<h4>The olio</h4>
  	 			<ul>
  	 				<li><a href='index.php'>Home</a></li>
  	 				<li><a href='./HTML/menu.php'>our menu</a></li>
  	 				<li><a href='./HTML/about.php'>About us</a></li>
  	 				<li><a href='./HTML/about.php#privacy_policy'>privacy policy</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>account</h4>
  	 			<ul>
  	 				<li><a href='./HTML/login.php'>user login</a></li>
  	 				<li><a href='./HTML/signup.php'>sign up</a></li>
  	 				<li><a href='./HTML/admin-login.php'>Admin login</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>category</h4>
  	 			<ul>
  	 				<li><a href='./HTML/menu.php#indiansection'>Indian</a></li>
  	 				<li><a href='./HTML/menu.php#tamilnadusection'>tamilnadu</a></li>
  	 				<li><a href='./HTML/menu.php#internationalsection'>international</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class='footer-col'>
  	 			<h4>follow us</h4>
  	 			<div class='social-links'>
  	 				<a href=' https://www.facebook.com/profile.php?id=100069065425666' target='_blank'><i class='fab fa-facebook-f'></i></a>
  	 				<a href='https://twitter.com/Agilan44010096?s=09' target='_blank'><i class='fab fa-twitter'></i></a>
  	 				<a href='https://www.instagram.com/agilan_20042003/' target='_blank'><i class='fab fa-instagram'></i></a>
  	 				<a href='https://www.linkedin.com/in/agilan-b-45bb1b1bb' target='_blank'><i class='fab fa-linkedin-in'></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
            <script>
        const colorchange=document.querySelector('.header');
            window.addEventListener('scroll',()=>{
                if(window.pageYOffset>10){
                    colorchange.classList.add('active');

                }else{
                    colorchange.classList.remove('active');
                }
            });
     </script>
     </body>
     </html>
            
            