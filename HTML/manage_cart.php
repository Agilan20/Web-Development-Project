<?php
session_start();
    if (!isset($_SESSION['username'])){
    header("Location:login.php");
    }
    if(isset($_POST['Add_To_Cart']))
    {
        //if $_SESSION['cart'] variable is set, $_SESSION['cart'] is set at the beginning
        if(empty($_SESSION['cart']))
        {
            $_SESSION['cart']=Array();
        }
        if(isset($_SESSION['cart']))
        {
        
            $myitems=array_column($_SESSION['cart'],'Item_Name');
            //if the item already exists
            if(in_array($_POST['Item_Name'],$myitems))
            {   
                foreach ($_SESSION['cart'] as $key => $value)
                {
                    if ($value['Item_Name']==$_POST['Item_Name'])
                    {
                        $value['Quantity']=$value['Quantity']+1;
                        $_SESSION['cart'][$key]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>$value['Quantity'],'discount'=>$_POST['discount'],'time'=>$_POST['Delivery'],'image'=>$_POST['image']);
                        $_SESSION['total']+=1;
                        echo "<script>
                        alert('Item quantity updated');
                    window.location.href='cart.php';
                  </script>";
                    }
                }   
            }
            //if the item does not exist in $_SESSION['cart']
            else
            {  
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1,'discount'=>$_POST['discount'],'time'=>$_POST['Delivery'],'image'=>$_POST['image']);
                $_SESSION['total']+=1;
                echo "<script>
                    alert('Item added');
                    window.location.href='cart.php';
                  </script>";
                  
            }
        }
    }
    //removing the item from cart
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if ($value['Item_Name']==$_POST['itemname'])
            {
                $_SESSION['total']-=$value['Quantity'];
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Item Removed');
                window.location.href='cart.php';
                </script>";
            }
        }
    }
    
?>
