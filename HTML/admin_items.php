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
    <title>Admin-Food items</title>
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS/admin_items.css?v=<?php echo time();?>'>
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
                if (isset($_SESSION['adminusername'])) {
                    
                echo "<li><a href='admin_items.php'><i class='fa fa-file'></i> Food Items</a></li>            
                <li><a href='admin_history.php'><i class='fa fa-history'></i> Order History</a></li>
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
    <section class='sec2'>
    <h1>Food items</h1>          
    <div class='container'>
    <div class='additemform'>
      <!--Add item-->
      <h1>Add item</h1>
    <form action='#' method='post' enctype="multipart/form-data">
      <label>Name</label><br>
      <input type='text' name='Name' required><br>
      <label>Price</label><br>
      <input type='text' name='Price' required><br>
      <label>Image</label><br>
      <input type='file' name='image' required><br>
      <label>Category</label><br>
      <input type='text' name='Category' required><br>
      <label>Origin</label><br>
      <input type='text' name='Origin' required><br>
      <label>Discount</label><br>
      <input type='text' name='Discount' required><br>
      <label>Delivery Time in min</label><br>
      <input type='text' name='Delivery' required><br>
      <button type='submit' name='add_Item'>
      <i class='fa fa-pencil'></i>
      <span class='edit'>Add</span>
      </button>
      <input type='hidden' value='$row[name]' name='itemname'>
    </form>
    <form onsubmit='return additemcancel()' action='#' method='post' >
        <button name='additemclear'>Cancel</button>
    </form>
                        
         <!--product display with edit and remove option-->               
    
    </div>
		<div class='products'>
        
        <?php
            $sql="SELECT * FROM food_items";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result))
            { 
                echo"
                <div class='product'>
          <img src='../image/$row[image]' alt=''>
          <div class='product-info'>
            <h3 class='product-name'>$row[name]($row[discount]% off)</h3>
            <h4 class='product-price'>price: ₹ $row[price] &#8226; $row[delivery] min</h4>

					<div class='product-edit'>
						<form action='#' method='post'>
            <input type='hidden' name='Id' value='$row[id]'>
            <button type='submit' class='editbutton' name='editfrombox'> <i class='fa fa-pencil'></i> Edit</button>
            </form>
					</div>

          <form onsubmit='return conf()' action='#' method='post'>
					<button type='submit' name='Remove_Item' class='product-remove'>
					<i class='fa fa-trash'></i>
					<span class='remove'>Remove</span>
					</button>
          <input type='hidden' value='$row[id]' name='Id'>
          </form>
        </div>
			</div>";
            }
        ?>
        
    </div>
    <!--product editing-->
    <div class='edititemform'>
      <h1>Edit item</h1>
    <?php
    //if edit button in product display is clicked with clear button
    if(isset($_POST['editfrombox']))
    {
      $sql="SELECT * FROM food_items WHERE id=$_POST[Id]";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result))
      {
        echo "<form onsubmit='return conf2()' action='#' method='post'>
        <label>Id</label><br>
        <input type='text' name='Id' value='$row[id]' disabled><br>
        <input type='hidden' name='Id' value='$row[id]'>
        <label>Name</label><br>
        <input type='text' name='Name' value='$row[name]' required><br>
        <label>Price</label><br>
        <input type='text' name='Price' value='$row[price]' required><br>
        <label>Category</label><br>
        <input type='text' name='Category' value='$row[category]' required><br>
        <label>Origin</label><br>
        <input type='text' name='Origin' value='$row[origin]' required><br>
        <label>Discount</label><br>
        <input type='text' name='Discount' value='$row[discount]' required><br>
        <label>Delivery</label><br>
        <input type='text' name='Delivery' value='$row[delivery]' required><br>
        
        <button type='submit' name='edit_Item'>
        <i class='fa fa-pencil'></i>
        <span class='edit'>Edit</span>
        </button>
        </form>

        <form action='#' method='post' onsubmit='return edititemcancel()'>
        <button name='edititemclear'>Cancel</button></form>";
      }
    }
    //Editing product by providing all inputs with clear button
    else{
      echo"<form onsubmit='return conf2()' action='#' method='post'>
    <label>Id</label><br>
    <input type='text' name='Id' required><br>
    <label>Name</label><br>
    <input type='text' name='Name' required><br>
    <label>Price</label><br>
    <input type='text' name='Price'  required><br>
    <label>Category</label><br>
    <input type='text' name='Category' required><br>
    <label>Origin</label><br>
    <input type='text' name='Origin' required><br>
    <label>Discount</label><br>
    <input type='text' name='Discount' required><br>
    <label>Delivery</label><br>
    <input type='text' name='Delivery' required><br>
    <button type='submit' name='edit_Item'>
    <i class='fa fa-pencil'></i>
    <span class='edit'>Edit</span>
    </button>
    </form>
    <form action='#' method='post' onsubmit='return additemcancel()'>
        <button name='edititemclear'>Cancel</button></form>";
    }      
    ?>        
     </div>
  </div>
    </section>

     <?php
     //when edit form is submitted
     if(isset($_POST['edit_Item']))
     {
        $sql="UPDATE `food_items` SET `name`='$_POST[Name]',`price`='$_POST[Price]',`category`='$_POST[Category]',
        `origin`='$_POST[Origin]',`delivery`='$_POST[Delivery]',`discount`='$_POST[Discount]' where id=$_POST[Id]" ;
        
        $result=mysqli_query($conn,$sql);
        $sql="SELECT * FROM `food_items` WHERE id=$_POST[Id]";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result)==0)
        {
          //when id provided as input does not exist only when all the inputs are provided by the admin
          echo"
          <script>
          alert('Item does not exist');
          window.location.href='admin_items.php';
          </script>";
        }
        //if id is appropriate
        else
        {
            echo"
        <script>
        alert('item updated');
        window.location.href='admin_items.php';
        </script>";
        }
        
     }
     //when remove button in product display is clicked
     if(isset($_POST['Remove_Item']))
     {
         $sql="DELETE FROM `food_items` WHERE id=$_POST[Id]";
         mysqli_query($conn,$sql);
         if ($result)
        {
            echo"
        <script>
        alert('item Deleted');
        window.location.href='admin_items.php';
        </script>";
        }
        
     }
     //adding item
     if(isset($_POST['add_Item']))
     {
        $file=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
    $folder='../image/';
    move_uploaded_file($tmp_name,$folder.$file);
    $sql="INSERT INTO `food_items`(`id`, `name`, `image`, `price`, `category`, `origin`, `delivery`, `discount`)
         VALUES (NULL,'$_POST[Name]','$file','$_POST[Price]','$_POST[Category]','$_POST[Origin]','$_POST[Delivery]','$_POST[Discount]')" ;
 
        $result=mysqli_query($conn,$sql);
        if ($result)
        {
            echo"
        <script>
        alert('item added');
        window.location.href='admin_items.php';
        </script>";
        }
        
     }
     //to clear the add item form
     if(isset($_POSt['additemclear']))
     {
      echo"
      <script>
      window.location.href='admin_items.php';
      </script>";
     }
     //clear the edit form
     if(isset($_POSt['edititemclear']))
     {
      echo"
      <script>
      window.location.href='admin_items.php';
      </script>";
     }
     ?>
     <script>
       //confirm the delete
       function conf(){
         return confirm('Are you sure you want to delete?');
       }
       //confirm the edit
       function conf2(){
         return confirm('Are you sure you want to edit?');
       }
       //confirm the edit cancel
       function edititemcancel()
       {
        return confirm('Do you want to cancel the process?');
       }
       //confirm the add cancel
       function additemcancel()
       {
        return confirm('Do you want to cancel the process?');
       }
     </script>
     
</body>
</html>