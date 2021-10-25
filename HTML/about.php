<?php
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
    <link rel = "icon" href = "../image/favicon.png">
    <title>About Us</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/feedback.css?v=<?php echo time();?>'>
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
                
                
                <?php
                //after user is logged in
                if (isset($_SESSION['username'])) {
                    
                echo "
                <li><a href='cart.php'><i class='fa fa-shopping-cart'></i> cart($_SESSION[total])</a></li>
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
                            <a href='admin-login.php'>Admin Login</a>
                        </li>
                        
                    </ul>
                </li>";
                
                }
                ?>
                <li><a href='about.php'>About Us</a></li>
            </ul>
        </nav>  
    </header>
    <section class='sec1'>
    <h1>Contact</h1>
    <div class='container1'>
        <div class='card'>
            <div class='image'><a href='https://www.instagram.com/agilan_20042003/' target='_blank'><img src='../image/instagram.png' alt=''></a></div>
        </div>
        <div class='card'>
            <div class='image'><a href='https://twitter.com/Agilan44010096?s=09' target='_blank'><img src='../image/twitter.png' alt=''></a></div>
        </div>
        <div class='card'>
            <div class='image'><a href=' https://www.facebook.com/profile.php?id=100069065425666' target='_blank'><img src='../image/facebook.png' alt=''></a></div>
        </div>
        <div class='card'>
            <div class='image'><a href='https://www.linkedin.com/in/agilan-b-45bb1b1bb' target='_blank'><img src='../image/linkedin.png' alt=''></a></div>
        </div>
        </div>
        <h1>corporate enquiry</h1>
        <div class="home" id="home">

            <div class="content">
                <h3>food made with love</h3>
                <p>At The olio’s we understand the growing concerns regarding food safety and hygiene. That’s why we take all the necessary precautions and follow strict safety ad hygiene protocols while making delivering your food. So, you can enjoy your safe virtual celebrations with the safest ever virtual feast.</p>
                <div class='container'>
                <div class='feedbackcard'>
                <div class='image'><img src='../image/about1.png' alt=''></div>
                </div>
                <div class='feedbackcard'>
                <div class='image'><img src='../image/about2.png' alt=''></div>
                </div>
                </div>
            </div>
        
            <div class="container2">
                <h1>Feedback or query</h1>
                <form action="mailto:agilan20042003@gmail.com" method='post' enctype="text/plain">
                <label>Name</label><br>
                <input type='text' name='Name' required> <br>   
                <label>Email</label><br>
                <input type='email' name='Email'  required>   
                <label>Phone</label><br>
                <input type='tel' name='Contact' required><br>  
                <label>Feedback/Query</label><br>
                <textarea name='Feedback/Query' required></textarea><br> 
                <button class='btn'>Submit</button>
                  </form>
            </div>
        
        </div>
      <div class='sec3' id='privacy_policy'>
      <h1>Privacy policy</h1>  
    <div class='container3'>
    <img src='../image/privacy-policy.png' alt=''>
            <div class='privacypolicy'>
                <h3>YOUR CONSENT</h3>
                <p>By using the the olio's Platform and the Services, you agree and consent to the collection, transfer, use, storage, disclosure and sharing of your information as described and collected by us in accordance with this Policy.  If you do not agree with the Policy, please do not use or access the the olio's Platform.</p>
                <h3>INFORMATION WE COLLECT FROM YOU</h3>
                <p>Information you give us - This includes information submitted when you:<br>
                    1. Create or update your olio account, which may include your name, email, phone number, password and address.<br>
                    2. Provide content to us, which may include reviews, ordering details and history.<br>
                    3. Use our Services, we may collect and store information about you to process your requests and automatically complete forms for future orders, your phone number, address, email.<br>
                </p>
            </div>
        </div>
        </div>
           
</section>
<!--footer-->
<footer class='footer'>
  	 <div class='footercontainer'>
  	 	<div class='row'>
  	 		<div class='footer-col'>
  	 			<h4>The olio</h4>
  	 			<ul>
  	 				<li><a href='../index.php'>Home</a></li>
  	 				<li><a href='menu.php'>our menu</a></li>
  	 				<li><a href='#'>About us</a></li>
  	 				<li><a href='#privacy_policy'>privacy policy</a></li>
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
  	 				<a href='https://twitter.com/Agilan44010096?s=09' target='_blank'><i class='fab fa-twitter'></i></a>
  	 				<a href='https://www.instagram.com/agilan_20042003/' target='_blank'><i class='fab fa-instagram'></i></a>
  	 				<a href='https://www.linkedin.com/in/agilan-b-45bb1b1bb' target='_blank'><i class='fab fa-linkedin-in'></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
</body>
</html>