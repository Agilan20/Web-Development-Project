<?php
session_start();
include 'config.php';
//if admin is not logged in
if (!isset($_SESSION['adminemail'])){
  header("Location:admin-login.php");
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
    <title>Admin History</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/admin_history.css?v=<?php echo time();?>'>
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
                
                
                <?php
                //if admin is logged in
                if (isset($_SESSION['adminusername'])) {
                    
                echo "<li><a href='admin_items.php'><i class='fa fa-file'></i> Food Items</a></li>
                
                <li><a href='admin_history.php'><i class='fa fa-shopping-cart'></i> Order History</a></li>
                <li>
                    <a href=''><i class='fa fa-user-circle-o'></i>Admin: $_SESSION[adminusername]</a>
                    <ul>
                        <li>
                            <a href='admin-logout.php'>logout</a>
                        </li>
                    </ul>
                </li>";
                }
                ?>
                
            </ul>
        </nav>
        
    </header>

<section>
<?php
    //getting current time
  $current=date('Y-m-d H:i:s',strtotime('+ 3hours + 30 minutes'));
  // selecting all the rows from order_history table where delivery time has not yet been attained
  $sql="SELECT * FROM order_history WHERE delivery_time>'{$current}' ORDER BY ordered_time DESC";
  $result=mysqli_query($conn,$sql);
  echo "<h1>Orders Pending</h1>
  <table class='table'>
        <tr>
        <th>Order Id</th>
        <th>Email</th>
        <th>Address</th>
        <th>ordered time</th>
        <th>Product Details</th>
        <th>Total amount</th>
        <th>Delivery time</th>
        </tr>";
  while($row=mysqli_fetch_array($result))
    {
        //displaying in table
        echo "
        
        
        <tr>
            
        <td data-label='Order Id'>$row[order_id]</td>
        <td data-label='Name'>$row[email_id]</td>
        <td data-label='Address'>$row[delivery_address]</td>
        <td data-label='ordered time'>$row[ordered_time]</td>
        <td data-label='Product Details'>$row[order_details]</td>
        <td data-label='Total amount'>₹ $row[total_cost]</td>
        <td data-label='Delivery time'>$row[delivery_time]</td>
        </tr>
    ";
      
    }
    echo "</table>";
    if(mysqli_num_rows($result)==0)
    {
      //if no orders is pending
        echo "<div class='emptytable'><p>No orders pending</p></div>";
      
    }
    //getting current time
    $current=date('Y-m-d H:i:s',strtotime('+ 3hours + 30 minutes'));
    // selecting all the rows from order_history table where delivery time has been attained
    $sql="SELECT * FROM order_history WHERE delivery_time<'{$current}' ORDER BY ordered_time DESC";
    $result=mysqli_query($conn,$sql);
    echo "<h1>Orders Fulfilled</h1>
    <table class='table'>
    <tr>
        <th>Order Id</th>
        <th>Email</th>
        <th>Address</th>
        <th>ordered time</th>
        <th>Product Details</th>
        <th>Total amount</th>
        <th>Delivery time</th>
    </tr>
    ";
    while($row=mysqli_fetch_array($result))
    {
      
        //displaying in table
        echo "
        
        
        <tr>
            
            <td data-label='Order Id'>$row[order_id]</td>
            <td data-label='Name'>$row[email_id]</td>
            <td data-label='Address'>$row[delivery_address]</td>
            <td data-label='ordered time'>$row[ordered_time]</td>
            <td data-label='Product Details'>$row[order_details]</td>
            <td data-label='Total amount'>₹ $row[total_cost]</td>
            <td data-label='Delivery time'>$row[delivery_time]</td>
        </tr>
    "; 
    }
    echo "</table>";
    if(mysqli_num_rows($result)==0)
    { 
        //if no orders has been fulfilled yet
        echo "<div class='emptytable'><p>No orders fulfilled</p></div>";
    }
  ?>
  </section>
</body>
</html>