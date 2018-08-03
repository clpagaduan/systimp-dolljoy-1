<?php
require_once('../mysql_connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');
if(!isset($_SESSION)) {
   session_start();
}

$username = $_SESSION['username'];
//echo $username;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : PlainLeaf
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SERVICES</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
    <?php



//$shoppingCart = array();

    if (isset($_POST['placeOrder'])){
//        echo "placeOrder!!!";
        $getDate = $_POST['requiredDate'];

        $sTotal = $_POST['totalqty'];
        $sSum = $_POST['totalsum'];

//        echo ($sTotal);
//        echo ($sSum);
//
//        echo ($getDate);
//
//        echo $username;
        $userIDQuery = "SELECT CompanyID from clientaccount WHERE CRepUsername = '$username'";

        $result = mysqli_query($dbc, $userIDQuery);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $userID = $row['CompanyID'];

//        echo($userID);
//        THIS IS WHERE IT ENDS
        $query = "INSERT INTO appdev.orders (OCompanyID, OProductID, OQuantity, OTotalAmount, OOrderedDate, ORequiredDate, OrderStatus, OPaymentStatus, OShipmentStatus, ManufacturingStatus) VALUES ( '{$userID}', NULL, '{$sTotal}', '{$sSum}', DATE(NOW()), '{$getDate}', 'Pending', 'Unpaid', 'Not Shipped', 'Pending')";
        $result = mysqli_query($dbc, $query);
        
        
        
        

        $query="SELECT * FROM appdev.cart WHERE userName ='$username'";
        $result2=mysqli_query($dbc,$query);
        $numRows = mysqli_num_rows($result2);

        while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
            $bye = $row['cartID'];
            $pID = $row['productID'];
            $qty = $row['quantity'];
            $gender = $row['productGender'];
            $hair = $row['prefHair'];
            $skin = $row['prefSkin'];
            $eye = $row['prefEye'];
            $size = $row['prefSize'];

            $query = "INSERT INTO appdev.ordersrefs (OrderID, ProductID, quantity, gender, prefHair, prefSkin, prefEye, prefSize) VALUES ((SELECT OrderID FROM appdev.orders WHERE OCompanyID = '{$userID}' ORDER BY OrderID DESC LIMIT 1), '{$pID}' , '{$qty}', '{$gender}', '{$hair}', '{$skin}', '{$eye}', '{$size} in')";
            $result = mysqli_query($dbc, $query);

            $delquery = "DELETE FROM appdev.cart WHERE cartID = '{$bye}'";
            $delresult = mysqli_query($dbc, $delquery);
        }
    $query8="update ordersrefs set weighthair=( select sum(weight)*quantity from attributevalues where prefHair=valuename  group by orderid) ;";


          $result8=mysqli_query($dbc,$query8);
            
            
             $query7="update ordersrefs set weightVinyl=( select sum(weight)*quantity from attributevalues where  prefSkin=valuename
or prefEye=valuename or prefSize=valuename  group by orderid) ";


          $result7=mysqli_query($dbc,$query7);
        header("location: websiteGalleryLoggedIn.php");
        
        

    }

if (isset($_POST['remove'])){
    require_once('../mysql_connect.php');
    echo "remove!";
    $cID = $_POST['cartID'];
    $xID = $_POST['sID'];

    echo ($cID);
    echo ($xID);
    $query = "DELETE from appdev.cart WHERE cartID = '{$cID}'";
    $result = mysqli_query($dbc, $query);
}

if (isset($_POST['add'])){
    require_once('../mysql_connect.php');
//    $chosenID = $_POST['sID'];
//    $qty = $_POST['qty'];
//
//    echo ('Product ID: ');
//    echo ($chosenID);
//    echo ('Qty:');
//    echo ($qty);

    if (!empty($_POST['sID'])){
        $xID = $_POST['sID'];
        $xQty = $_POST['qty'];
        echo ('sID: ');
        echo ($xID);
        echo '<br> Qty: ';
        echo ($xQty);

    }
    $query = "INSERT INTO appdev.cart (productID, quantity) VALUES ('{$xID}', '{$xQty}')";

        $result = mysqli_query($dbc, $query);
}
?>
<div id="header" class="container">
	<div id="logo">
        <h1><a href="websiteHome.php"><font color="#68B3C8">DOLLJOY</font></a></h1>
	</div>
	<div id="menu">
		<ul>
      <li class="active"><a href="websiteHomeLoggedIn.php" accesskey="1" title="">Homepage</a></li>
            <li><a href="websiteGalleryLoggedIn.php" accesskey="5" title="">Gallery</a></li>
			<li><a href="websiteServicesLoggedIn.php" accesskey="5" title="">Services</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>
            <li><a href="clientDashboard.php" accesskey="7" title="">Account</a></li>
            <li><a href="websiteHome.php" accesskey="7" title="">Logout</a></li>
		</ul>
	</div>
</div>

<div id="banner"></div>
<div id="featured" class="container">

<!-- START OF LOGIN FORM -->



<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="content">
    <center><h3><b>Checkout</b></h3></center>
        <div class="container-fluid">
            <div class="row" style="display:flex">

                <div class="col-md-8">
                    <div class="card">

                            <div class="content table-responsive table-full-width">
                                <div style = "width:100%; display: inline-block">
                            <table class="table table-hover" >
                                <thead>
                                    <th><p class="category">Product ID</p></th>
                                    <th><p class="category">Doll Name</p></th>
                                    <th><p class="category">Specifications</p></th>
                                    <th><p class="category">Description</p></th>
<!--                                        <th><p class="category">Photo</p></th>-->
                                    <th><p class="category">Price</p></th>
                                    <th><p class="category">Quantity</p></th>
                                    <th><p class="category">Subtotal</p></th>

                                </thead>

                                <?php
                                require_once('../mysql_connect.php');
                                $message="";
                                $query="SELECT * FROM appdev.cart WHERE userName ='$username'";
                                $result=mysqli_query($dbc,$query);

                                $numRows = mysqli_num_rows($result);
                                if($numRows ==0){
                                    $message="No accounts to show";
                                }

                                $sum = 0;
                                $totalqty = 0;
                                $count = 0;

                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                    $caID = $row['cartID'];
                                    $id = $row['productID'];
//                                      echo ($id);
                                    $name = $row['productName'];
                                    $size = $row['prefSize'];
                                    $desc = $row['productDesc'];
                                    $hair = $row['prefHair'];
                                    $skin = $row['prefSkin'];
                                    $eye  = $row['prefEye'];
                                    $price = $row['price'];
                                    $qty  = $row['quantity'];
                                    $subtotal = $row['subtotal'];

                                    $totalqty += $qty;
                                    $sum += $subtotal;

                                    $count++;

                                    $specs = "<b>Size:</b> $size <br><b>Hair:</b> $hair <br><b>Skin:</b> $skin <br><b>Eye Color:</b> $eye";
//                                        $image2 = '<img src="data:image/jpeg;base64,'.base64_encode($image).'"style="width:128px;height:128px"/>';

                                    echo
                                        '
                                        <form action="websiteGalleryLoggedInCheckout.php" method="post">
                                        <tr>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$specs.'</td>
                                        <td>'.$desc.'</td>

                                        <td>₱'.$price.'.00</td>
                                        <td>'.$qty.'</td>
                                        <td>₱'.$subtotal.'.00</td>








                                        <input type = "hidden" name = "cartID" value = "'.$caID.'">
                                        <input type = "hidden" name = "sID" value = "'.$id.'">
                                        <td align = "left">
                                        <input type="submit" name="remove" class="btn btn-danger btn-fill" value="Remove" />
                                        </td>




                                        '
                                        ;


                                    echo '</tr>';
                                }

//                                                                                <td align = "left">
//                                            <input type="submit" name="edit" class="btn btn-info btn-fill" value="Edit" />
//                                            </td>

                                    echo '</table>';

                                echo '<div class="col-md-12" align="right">
                                        ';

//                                echo '<input type = "hidden" name = "totalqty" value = "'.$totalqty.'">';
//                                echo '<input type = "hidden" name = "totalsum" value = "'.$sum.'">';
//                                echo '₱';
//                                echo $sum;
//                                echo '.00';

                                echo '</b><br>
                                            <div class="form-group">
                                            <br>
                                               
                                    </div>
                                </div>


                                

                                </table>


                                    </div>

                        </div>

                    </div>
                    
                </div>
                <div class="col-md-4"> 
                    <h3>Order Summary</h3>
                     <label>Required Date</label><br>
                                                    <input type="date" name="requiredDate"/><br><br>
                    ';
                                echo 'Total Items: <input type = "hidden" name = "totalqty" value = "'.$totalqty.'">';
                                echo $totalqty;
                                echo '<br>Total: <b><input type = "hidden" name = "totalsum" value = "'.$sum.'">';
                                echo '₱';
                                echo $sum;
                                echo '.00 </b> <br><br>';
                                    ?>
                    <input type="submit" name="placeOrder" class="btn btn-success btn-fill" value="Place Order" pull-right/>
                    </form>
                    <a href='websiteGalleryLoggedIn.php'><button type='submit' class='btn btn-info btn-fill pull-right'>Go Back</button></a>
                </div>
            </div>
        </div>
    </div>




<!-- END OF LOGIN FORM -->


<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>


</body>
</html>
