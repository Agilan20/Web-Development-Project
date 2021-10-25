<?php 
session_start();
//database connection
include 'config.php';
//if already logged in
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
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
    <title>Order Details</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/info.css?v=<?php echo time();?>'>

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
                    
                echo "
                <li><a href='cart.php'><i class='fa fa-shopping-cart'></i> cart($_SESSION[total])</a></li>
                <li>
                    <a href='history.php'><i class='fa fa-user-circle-o'></i> $_SESSION[username]</a>
                    <ul>
                        <li>
                            <a href='history.php'>My Account</a>
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
    <section class="home" id="home">
        <div class="image">
            <img src="../image/info.jpg" alt="">
        </div>
        <div class="form">
            
            <div class="container">
            <h3>Place Order</h3>
            <?php
                $sql = "SELECT * FROM registration WHERE email='$_SESSION[email]'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($result))
                {
                echo"
                <form onsubmit='return conf()' action='#' method='post'>
                <label>Name</label><br>
                <input type='text' name='username' value='$row[username]' required> <br>   
                <label>Email</label><br>
                <input type='email' value='$row[email]' disabled>
                <input type='hidden' name='email' value='$row[email]'><br>   
                <label>Phone</label><br>
                <input type='tel' name='phoneno' value='$row[phoneno]' required><br>  
                <label>Address</label><br>
                <textarea name='address' required></textarea><br> 
                <input type='checkbox' name='save' id='checkbox' value='Submit' checked disabled>
                    <label for='checkbox'>Pay on delivery</label>
                <button name='payment' class='btn'>Place Order</button>
                  </form>
                  <a href='cart.php'>Go back</a>
				";
                }
                ?>
            </div>
        </div>   
   </section>
   <script>
       function conf()
       {
           return confirm('Are you sure you want to place order?');
       }
    </script>
</body>
</html>
<?php
//when payment is confirmed
if(isset($_POST['payment']))
{
  $a='';
  $b=[];
  $total=0;
  foreach($_SESSION['cart'] as $key => $value)
  {

      $a=$a.$value['Item_Name'].'('.$value["Quantity"].') ';
      array_push($b,$value['time']);
  }
  $total=$_SESSION['cost'];
$current=date("Y-m-d H:i:s",strtotime('+ 3hours + 30 minutes'));
$addtime=date("Y-m-d H:i:s",strtotime('+'.max($b).' minutes',strtotime($current)));
$sql="INSERT INTO `order_history`(`order_id`, `customer_name`, `email_id`, `contact`, `delivery_address`, `order_details`, `total_cost`, `ordered_time`, `delivery_time`) 
    VALUES (NULL,'$_POST[username]','$_POST[email]','$_POST[phoneno]','$_POST[address]','$a','$total','$current','$addtime')";
mysqli_query($conn,$sql);
$_SESSION['cart']=Array();
$_SESSION['total']=0;
//when order button is clicked
echo "<script>
        alert('Order placed successfully');
        window.location.href='history.php';
      </script>";
}
?>
