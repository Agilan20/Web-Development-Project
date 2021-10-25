<?php
session_start();
include 'config.php';
//if the user is not logged in
if (!isset($_SESSION['username'])){
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
    <title>My Account</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/history.css?v=<?php echo time();?>'>   
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
    <section class="headersection">
    <div class="headercontent">
            <h3>My account</h3>
            <br>
            <p>Hello <?php echo $_SESSION['username']?>,<br>welcome to your account page. you can view all your personal data here. below your order history has been displayed.</p>
        </div>
        <div class="image">
            <img src="../image/account.png" alt="">
        </div>
    </section>
<section>
<div class="container">
        <h1>My account</h1>
<?php
        
        $sql = "SELECT * FROM registration WHERE email='$_SESSION[email]'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result))
        {
            if(!isset($_POST['change']))
            {
                echo"
                <form method='post' action='#'>
                <table class='myaccounttable'>
                    <tr>
                        <td>
                            <label> Name:</label>
                        </td>
                        <td>
                            <input type='text' name='Username' value='$row[username]' disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>email:</label>
                        </td>
                        <td>
                            <input type='email' name='Email' value='$row[email]' disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>contact:</label>
                        </td>
                        <td>
                            <input type='tel' name='Phoneno' value='$row[phoneno]' disabled>
                        </td>
                    </tr>
                    
                </table>
                <button name='change' class='btn'>change </button>
                <input type='hidden' name='Username' value='$row[username]'>
                <input type='hidden' name='Email' value='$row[email]'>
                <input type='hidden' name='Phoneno' value='$row[phoneno]'>
            </form>
        ";
            }
        
        elseif(isset($_POST['change']))
        {
            echo"
            <form method='post' action='#'>
            <table style='border: 1; text-align: center;'>
                <tr>
                    <td>
                        <label> Name:</label>
                    </td>
                    <td>
                        <input type='text' name='username' value='$_POST[Username]' required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>email:</label>
                    </td>
                    <td>
                        <input type='email' name='email' value='$_POST[Email]' disabled>
                        <input type='hidden' name='email' value='$_POST[Email]'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>contact:</label>
                    </td>
                    <td>
                        <input type='tel' name='phoneno' value='$_POST[Phoneno]' required>
                    </td>
                </tr>
                
            </table>
            <button name='changesconfirm' class='btn'>change </button>
            <p  class='io'><a href='history.php'>cancel changes</a></p>
        </form>";
        }
    }
        ?>
</div>
  <?php
  //getting current time
  $current=date('Y-m-d H:i:s',strtotime('+ 3hours + 30 minutes'));
  // selecting all the rows from order_history table with email id of the user whoe is currently logged in where delivery time has been attained
  $sql="SELECT * FROM order_history WHERE delivery_time>'{$current}' AND email_id='$_SESSION[email]' ORDER BY ordered_time DESC";
  $result=mysqli_query($conn,$sql);
  echo "<h1>Orders Pending</h1>
  <table class='table'>
        <tr>
            <th>Order Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>ordered time</th>
            <th>Product Details</th>
            <th>Cost</th>
            <th>delivery time</th>
            <th>Cancel Order</th>
        </tr>";
  while($row=mysqli_fetch_array($result))
    {
        //displaying in table with cancel option
        echo "
        
        
        <tr>
            
            <td data-label='Order Id'>$row[order_id]</td>
            <td data-label='Name'>$row[customer_name]</td>
            <td data-label='Address'>$row[delivery_address]</td>
            <td data-label='ordered time'>$row[ordered_time]</td>
            <td data-label='Product Details'>$row[order_details]</td>
            <td data-label='Cost'>₹ $row[total_cost]</td>
            <td data-label='delivery time'>$row[delivery_time]</td>
          <td data-label='Cancel'>
            <form onsubmit='return confcancel()' action='#' method='post'>
                <button class='confcancel' type='submit' name='cancelorder'>Cancel Order</button>
                <input type='hidden' value='$row[order_id]' name='Id'>
                </form>
            </td>
        </tr>
    ";
      
    }
    echo "</table>";
    //if no orders are pending
    if(mysqli_num_rows($result)==0)
    {
      
        echo "<div class='emptytable'><p>No orders pending</p></div>";
      
    }
    //orders fulfilled
    $current=date('Y-m-d H:i:s',strtotime('+ 3hours + 30 minutes'));
    // selecting all the rows from order_history table with email id of the user whoe is currently logged in where delivery time has been attained
    $sql="SELECT * FROM order_history WHERE delivery_time<'{$current}' AND email_id='$_SESSION[email]' ORDER BY ordered_time DESC";
    $result=mysqli_query($conn,$sql);
    echo "<h1>Orders Fulfilled</h1>
    <table class='table' id='table2'>
        <tr>
            <th>Order Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>ordered time</th>
            <th>Product Details</th>
            <th>Cost</th>
            <th>Delivery time</th>
        </tr>";
    while($row=mysqli_fetch_array($result))
    {
      
        //displaying in table
        echo "
        
        
        <tr>
            
            <td data-label='Order Id'>$row[order_id]</td>
            <td data-label='Name'>$row[customer_name]</td>
            <td data-label='Address'>$row[delivery_address]</td>
            <td data-label='ordered time'>$row[ordered_time]</td>
            <td data-label='Product Details'>$row[order_details]</td>
            <td data-label='Cost'>₹ $row[total_cost]</td>
          <td data-label='Delivery time'>$row[delivery_time]</td>
        </tr>
    ";
    }
    echo "</table>";
    //if no order is fulfilled
    if(mysqli_num_rows($result)==0)
    { 
        echo "<div class='emptytable'><p>No orders fulfilled</p></div>";
    }
  ?>
  <?php
    //if the user cancels the pending orders
  if(isset($_POST['cancelorder']))
  {
    $sql="DELETE FROM order_history WHERE order_id=$_POST[Id]";
    mysqli_query($conn,$sql);
    if ($result)
        {
            echo"
        <script>
        alert('Order cancelled');
        window.location.href='history.php';
        </script>";
        }
  }
  ?>
  </section>
    <script>
        //a confirmation before order is cancelled
        function confcancel(){
            return confirm('Are you sure you want to cancel?');
        }
        function conf(){
            return confirm('Are you sure you want to confirm the changes?');
        }
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
<?php
if(isset($_POST['changeconfirm']))
{

}
if(isset($_POST['changecancel']))
{
    unset($_POST['changecancel']);
}
if (isset($_POST['changesconfirm']))
{
    $sql="UPDATE `registration` SET `username`='$_POST[username]',`phoneno`='$_POST[phoneno]' WHERE email='$_POST[email]'";
    $_SESSION['username']=$_POST['username'];
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo "<script>
            alert('Account updated');
            window.location.href='history.php';
            </script>";
    }
}
?>
