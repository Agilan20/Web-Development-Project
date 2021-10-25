<?php
session_start();
include 'config.php';
//if user is not logged in
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
    <title>My Cart</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/cart.css?v=<?php echo time();?>'>
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
                            <a href='history.php'>my account</a>
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
    <section class="headersection">
    <div class="headercontent">
            <h3>my cart</h3>
            <br>
            <p>Hello <span class='username'><?php echo $_SESSION['username']?></span>,<br>Your cart has been displayed here. you can add, remove and edit the items as you wish. You can also proceed to payment after the cart is finalised.</p>
        </div>
        <div class="image">
            <img src="../image/mycart.png" alt="">
        </div>
    </section>
<div class='container'>
	<h1>Shopping Cart</h1>
    <?php
            //if the cart is empty
            if(!isset($_SESSION['cart']) or count($_SESSION['cart'])==0){
                
            echo "<div class='emptycart'><img src='../image/empty_cart.png' alt=''></div>";       
            }
            //if the cart is not empty
            else
            {
                echo"
                <div class='cart'>
                <div class='sidebar'>
                <img src='../image/thinking.jpg' alt='' class='decision'>
                <a href='info.php'>Proceed to Checkout</a>
                <a href='menu.php'>Continue shopping</a>
            </div>
                <div class='products'>
                    ";
                    //displaying the details of product in cart
                $subtotal=0;
                if (isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                        
                        //calculating the price after reducing the discount
                        $sr=$value['Price']-$value['Price']*($value['discount']/100);
                        //multiplying with the number of quantity
                        $item_price=$sr*$value['Quantity'];
                        //calculating the amount without tax and delivery charges
                        $subtotal=$subtotal+$item_price;
                        $tax=$subtotal*0.1;
                        $subtotalfinal=$subtotal+$tax;
                        //delivery charges
                        if($subtotalfinal<500){
                            //50 if total is <500
                            $deliverycharge=50;
                        }
                        else{
                            //0 if total is >500
                            $deliverycharge=0;
                        }
                        //calculating the total cost
                        $total=$subtotal+$tax+$deliverycharge;
                        echo"
                        
                        <div class='product'>
                    <img class='product-image' src='$value[image]' alt=''>
                    <div class='product-info'>
					<h3 class='product-name'>$value[Item_Name] ($value[discount] % off)</h3>
                    <h4 class='product-offer'><span>₹$value[Price]</span> ₹$sr</h4>
					<h4 class='product-price'>₹$sr x $value[Quantity] = ₹$item_price</h4>
					
					<div class='product-quantity'>
						Qnt: ";
                        //decrement button converted to delete button if quantity is 1
                        if ($value['Quantity']>1)
                        {
                            echo"
                        <form action='#' method='post'>
						<button type='submit' name='decrement_Item' class='decrement'>-</button>
                        <input type='hidden' value='$value[Item_Name]' name='itemname'>
                        </form>";
                        }
                        else{
                            echo "<form action='manage_cart.php' method='post'>
                            <button type='submit' name='Remove_Item' class='product-delete'>
                            <i class='fa fa-trash'></i>
                            
                            </button>
                            <input type='hidden' value='$value[Item_Name]' name='itemname'>
                            </form>  ";
                        }
                        //increment button
                        echo "
                        <input value='$value[Quantity]' name='quan' type='text' disabled class='quan'>
                        

                        <form action='#' method='post'>
						<button type='submit' name='increment_Item' class='increment'>+</button>
                        
                        <input value='$value[Quantity]' name='quan' type='hidden'>
                        <input type='hidden' value='$value[Item_Name]' name='itemname'>
                        </form>
						
					</div>
					<form action='manage_cart.php' method='post'>
					<button type='submit' name='Remove_Item' class='product-remove'>
					<i class='fa fa-trash'></i>
					</button>
                    <input type='hidden' value='$value[Item_Name]' name='itemname'>
                    </form>
				</div>
			</div>";
                        
                    }
                    //cart total summary
                    echo"
			</div>
            
            <div class='sidebar' id='cartpayment'>
            <h1>Summary</h1>
                <p>
                    <span>Total Price</span>
                    <span>₹ $subtotal</span>
                </p>
                <p>
                    <span>tax(G.S.T+S.G.S.T)</span>
                    <span>₹ $tax</span>
                </p>
                <p>
                    <span>Delivery</span>
                    <span>₹ $deliverycharge</span>
                </p>
                <p class='total'>
                    <span class='totaltext'>Total Price</span>
                    <span>₹ $total</span>
                </p>
                
                
            </div>
        </div>";
        $_SESSION['cost']=$total;
                }
            }

            
    ?>
</div>
<?php
//decrement button
if(isset($_POST['decrement_Item']))
    {
    foreach($_SESSION['cart'] as $key => $value)
    {
        if ($value['Item_Name']==$_POST['itemname'])
        {
            $_SESSION['cart'][$key]['Quantity']=$value['Quantity']-1;
            $_SESSION['total']-=1;
            echo "<script>
            alert('Item quanitity decremented');
            window.location.href='cart.php';
            </script>";
        }
    }
}
//increment button
if(isset($_POST['increment_Item']))
{   
    foreach($_SESSION['cart'] as $key => $value)
    {
        if ($value['Item_Name']==$_POST['itemname'])
        {
            $_SESSION['cart'][$key]['Quantity']=$value['Quantity']+1;
            $_SESSION['total']+=1;
            echo "<script>
            alert('Item quanitity incremented');
            window.location.href='cart.php';
            </script>";
        }
    }
}
?>
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
