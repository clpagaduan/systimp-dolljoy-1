<?php
require_once('../mysql_connect.php');
//require_once('PHPMailer/PHPMailerAutoload.php');
if(!isset($_SESSION)) {
   session_start();
}

$username = $_SESSION['username'];
//echo $username;
//added this line
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
        if (isset($_POST['remove'])){
            require_once('../mysql_connect.php');
            // echo "remove!";
            $cID = $_POST['cartID'];
            $xID = $_POST['sID'];

        //    echo ($cID);
        //    echo ($xID);
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
                    
//            $id   = $_POST['sID'];
            $qty = $_POST['qty'];
            $dollID = $_POST['radioDoll'];
            $hair = $_POST['radioHair'];
            $eye  = $_POST['radioEye'];
            $skin = $_POST['radioSkin'];
            $size = $_POST['radioSize'];
            $gen  = $_POST['radioGen'];
            
            $dollName = NULL;
            
            $query2="SELECT * FROM product WHERE ProductID = '$dollID'";
            $result=mysqli_query($dbc,$query2);
//            $count=0;
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            $dollName = $row['ProductName'];
            $xDesc = $row['ProductDescription'];
            $xPrice = $row['ProductPrice'];
            $xSubTotal = $qty * $xPrice;
//            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
//                $dollName = $row['ProductName'];
//                echo $dollName;
//            }
            
//            echo $dollID . $dollName . $hair . $eye . $skin . $size . $gen . $qty;
            
            $addToCart = "INSERT INTO cart (userName, productID, productName, productGender, productDesc, prefHair, prefSkin, prefEye, prefSize, quantity, price, subtotal) VALUES ('{$username}', '{$dollID}', '{$dollName}', '{$gen}', '{$xDesc}', '{$hair}', '{$skin}', '{$eye}', '{$size}', '{$qty}', '{$xPrice}', '{$xSubTotal}')";
//            echo $dollID;
            
            if (mysqli_query($dbc, $addToCart)){
                echo "Added to cart!";
            } else {
                echo "Error: " . mysqli_error($dbc);
            }

//            if (!empty($_POST['sID'])){
//                $xID = $_POST['sID'];
//                $xQty = $_POST['qty'];
        //        echo ('sID: ');
        //        echo ($xID);
        //        echo '<br> Qty: ';
        //        echo ($xQty);

            }
//            $query = "INSERT INTO appdev.cart (productID, quantity) VALUES ('{$xID}', '{$xQty}')";

//                $result = mysqli_query($dbc, $query);
        
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

<!--<div id="banner"></div>-->
<div id="content" class="container">

<!-- START OF LOGIN FORM -->

<!--
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
-->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!------ Include the above in your HEAD tag ---------->

    <h1><b>Doll Catalog</b></h1>
    <form action="websiteGalleryLoggedIn.php" method="post">
    <div class="content">
        <div class="container-fluid" >
            <div class="row" style="display:flex">
                
                <div class="col-md-5">
                    <div class="col-">
                        <h4>Step 1: Select a doll</h4>
<!--                        SCROLLBAR FOR THE PREMADE DOLLS-->
                        <?php
//                        $listQuery = "SELECT * FROM appdev.product";
//                        $listResult = mysqli_query($dbc, $listQuery);
//                        
//                        while ($row=mysqli_fetch_array($listResult, MYSQLI_ASSOC)){
//                            $name = $row['ProductName'];
//                            echo '<label class="radio"><input type="radio" name="dollList" value='.$row['ProductName'].'>
//                            '.$row['ProductName'].'</label>';
//                        }
                        ?>
                        
                        <div class="container table-responsive" style="display:flex; width:400px; height:125px; overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-hover" >
                            <?php 
                            require_once('../mysql_connect.php');
                            $query="SELECT * FROM appdev.product";
                            $result=mysqli_query($dbc,$query);
                            $count=0;

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                $id = $row['ProductID'];
                                $itemName =$row['ProductName'];
                                $image= $row['ProductImage'];
                                $desc = $row['ProductDescription'];
                                $image2 = '<img src="data:image/jpeg;base64,'.base64_encode($image).'"style="width:30px;height:30px"/>';
                            echo'
                                <td><div class=card style="border:1px white; width:50px">
                                <center>'.$image2.'
                                <h7 class="card-title" align="center">'.$itemName.'</h7>

                                <div class="radio" value='.$id.'><label>
                                
                                <input type="radio" name="radioDoll" value='.$row['ProductID'].'> 
                            </label></div>
                            
                                

                                </div></td>
                                ';
                                
//                                <a href="websiteGalleryLoggedInID.php?id='.$id.'" class="btn btn-primary" style="margin:auto; text-align:center; display:block">View</a></center>
                                
//                                echo'
//                                <td><div class=card style="border:1px white; width:50px">
//                                <center>'.$image2.'</center>
//                                <h4 class="card-title" align="center">'.$id.' - '.$itemName.'</h4>
//
//                                <p class="card-text" align="center">'.$desc.'</p>
//
//                                <a href="websiteGalleryLoggedInID.php?id='.$id.'" class="btn btn-primary" style="margin:auto; text-align:center; display:block">View Details</a>
//
//                                </div></td>
//                                ';


                                $count++;

                                if($count=3){

                                $count=0;
                                }
                            }
                            
                            ?>
                        </table>
                        
                        </div> 
                        <h1>&nbsp;</h1>
<!--
                    <h1>henlo</h1>
                       <div class="col-">
                    <h1>henlo</h1>
                        
                    </div> 
-->
                    </div>
                    
<!--                    TABS FOR THE DOLLS-->
                    <h4>Step 2: Customize your doll</h4>
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#hair">Hair</a></li>
                    <li><a data-toggle="tab" href="#eye">Eye Color</a></li>
                    <li><a data-toggle="tab" href="#skin">Skin Color</a></li>
                    <li><a data-toggle="tab" href="#dollSize">Size</a></li>
                    <li><a data-toggle="tab" href="#dollGen">Gender</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="hair" class="tab-pane fade in active">
<!--                      <h3>HOME</h3>-->
<!--                      <p>Select Hair Colour</p>-->
<!--                        <form>-->
                            <?php
                        
//                        $queryHair = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=1;";
//                        $resultHair = mysqli_query($dbc,$queryHair);
//
//                        echo "<select class='form-control' name='hairStyle'>";
//
//                        while ($Row = mysqli_fetch_array($resultHair)){
//                        echo "
//                        <option value='".$Row['ValueName']."'}>{$Row['ValueName']}</option></div>";
//                        }
//                        echo "</select>";

                            $queryHair = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=1;";
                            $resultHair = mysqli_query($dbc,$queryHair);
                            
                            
                            while ($rowHair = mysqli_fetch_array($resultHair)){
                            echo '<div class="radio"><label><input type="radio" name="radioHair" value='.$rowHair['ValueName'].'>
                            '.$rowHair['ValueName'].'</label></div>';
                            };
                        
                            
//                            echo '<select class="form-control" name="hairstyle">';
//                        
//                            while ($rowHair = mysqli_fetch_array($resultHair)){
//                                echo "<div class='form-group'>
//                        <option value='".$Row['ValueName']."'}>{$Row['ValueName']}</option></div>";
//                            }
//                            echo '</select></div>';
                              

                            ?>
<!--
                        <div class="radio"><label><input type="radio" name="optradio">Curly         </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Straight      </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Dreadlocks    </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Wavy          </label></div>
-->
<!--                      </form>-->
                    </div>
                    <div id="eye" class="tab-pane fade">
<!--                      <h3>Menu 1</h3>-->
<!--                        <p>Select Eye Colour</p>-->
<!--                        <form>-->
                        <?php
                        $queryEye = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=3;";
                        $resultEye= mysqli_query($dbc,$queryEye);
                            
                            
                            while ($eyeRow = mysqli_fetch_array($resultEye)){
                            echo '<div class="radio"><label><input type="radio" name="radioEye" value='.$eyeRow['ValueName'].'>
                            '.$eyeRow['ValueName'].'</label></div>';
                            };                     
                        ?>
<!--
                        <div class="radio"><label><input type="radio" name="optradio">Black         </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Brown         </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Blue          </label></div>                   
-->
<!--                      </form>                    -->
                    </div>
                    <div id="skin" class="tab-pane fade">
<!--                      <h3>Menu 2</h3>-->
<!--                        <p>Select Skin Colour</p>-->
<!--                        <form>-->
                        <?php
                        $querySkin = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=2;";
                        $resultSkin = mysqli_query($dbc,$querySkin);
                            
                            
                            while ($skinRow = mysqli_fetch_array($resultSkin)){
                            echo '<div class="radio"><label><input type="radio" name="radioSkin" value='.$skinRow['ValueName'].'>
                            '.$skinRow['ValueName'].'</label></div>';
                            };     
                        ?>
<!--
                        <div class="radio"><label><input type="radio" name="optradio">Light         </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Fair          </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Tan           </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Dark          </label></div>
-->
<!--                      </form>                    -->
                    </div>
                    <div id="dollSize" class="tab-pane fade">
<!--                      <h3>Menu 3</h3>-->
                        <?php
                            $querySize = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=4;";
                            $resultSize= mysqli_query($dbc,$querySize);
                            
                            
                            while ($sizeRow = mysqli_fetch_array($resultSize)){
                            echo '<div class="radio"><label><input type="radio" name="radioSize" value='.$sizeRow['ValueName'].'>
                            '.$sizeRow['ValueName'].'</label></div>';
                            };
                        ?>
<!--
                        <p>Select Outfit</p>
                        <form>
                        <div class="radio"><label><input type="radio" name="optradio">Formal        </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Athletic      </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Street Casual </label></div>
                        <div class="radio"><label><input type="radio" name="optradio">Swimwear      </label></div>
                        
                      </form>                    
-->
                      </div>
                      <div id="dollGen" class="tab-pane fade">
                          <?php
                            $queryGen = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=5;";
                            $resultGen= mysqli_query($dbc,$queryGen);
                            
                            
                            while ($genRow = mysqli_fetch_array($resultGen)){
                            echo '<div class="radio"><label><input type="radio" name="radioGen" value='.$genRow['ValueName'].'>
                            '.$genRow['ValueName'].'</label></div>';
                            };
                          ?>
                      </div>
                  </div>
                    <h1>&nbsp;</h1>
                    <h4>Step 3: Select Quantity</h4>
                    <div class="row" style="display:flex">
                        <h7>&nbsp; &nbsp; Quantity &nbsp; </h7>
                    <input type="number" name="qty" class="form-control border-input" min="1" style="width: 5em;" value=1>
                        <h7>&nbsp;&nbsp;</h7>
                    <input type='submit' name='add' class='btn btn-success btn-fill' value='Add to Cart'/>
                    </div>
<!--
                    <h1> henlo</h1>
                    <h1> henlo</h1>
-->

                    <!--<div class="container table-responsive" style="display:flex; width:400px; overflow-y:hidden;overflow-x:scroll;">
                        <table class="table table-hover" >
                            <?php /*
                            require_once('../mysql_connect.php');
                            $query="SELECT * FROM appdev.product";
                            $result=mysqli_query($dbc,$query);
                            $count=0;

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                $id = $row['ProductID'];
                                $itemName =$row['ProductName'];
                                $image= $row['ProductImage'];
                                $desc = $row['ProductDescription'];
                                $image2 = '<img src="data:image/jpeg;base64,'.base64_encode($image).'"style="width:128px;height:128px"/>';
                            echo'
                                <td><div class=card style="border:1px white; width:275px">
                                <center>'.$image2.'</center>
                                <h4 class="card-title" align="center">'.$id.' - '.$itemName.'</h4>

                                <p class="card-text" align="center">'.$desc.'</p>

                                <a href="websiteGalleryLoggedInID.php?id='.$id.'" class="btn btn-primary" style="margin:auto; text-align:center; display:block">View Details</a>

                                </div></td>
                                ';

                                $count++;

                                if($count=3){

                                $count=0;
                                }
                            }
                            */
                            ?>
                        </table>
                        
                        </div>  -->                  
                    </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                       
                                
                                <div class="container table-responsive" style = "width:700px;">
                                    <h4>Shopping Cart</h4>
                                <table class="table table-hover">
                                    <thead>
<!--                                        <th><p class="category">Product ID</p></th>-->
                                        <th><p class="category">Doll Name</p></th>
                                        <th><p class="category">Specifications</p></th>
<!--                                        <th><p class="category">Description</p></th>-->
<!--                                        <th><p class="category">Photo</p></th>-->
                                        <th><p class="category">Quantity</p></th>
                                    </thead>

                                    <?php
                                    require_once('../mysql_connect.php');
                                    $message="";
                                    $query="SELECT * FROM appdev.cart WHERE userName = '$username'";
                                    $result=mysqli_query($dbc,$query);

                                    $numRows = mysqli_num_rows($result);
                                    if($numRows ==0){
                                        $message="No accounts to show";
                                    }

                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        $caID = $row['cartID'];
                                        $id = $row['productID'];
//                                        echo ($id);
                                        $name = $row['productName'];
                                        $size = $row['prefSize'];
                                        $desc = $row['productDesc'];
                                        $hair = $row['prefHair'];
                                        $skin = $row['prefSkin'];
                                        $eye  = $row['prefEye'];
                                        $qty  = $row['quantity'];

                                        $specs = "<b>Size:</b> $size <br><b>Hair:</b> $hair <br><b>Skin:</b> $skin <br><b>Eye Color:</b> $eye";
//                                        $image2 = '<img src="data:image/jpeg;base64,'.base64_encode($image).'"style="width:128px;height:128px"/>';

                                        echo
                                            '
                                            
                                            <tr>
                                            
                                            <td>'.$name.'</td>
                                            <td>'.$specs.'</td>
                                            
                                            <td>'.$qty.'</td>

                                            <input type = "hidden" name = "cartID" value = "'.$caID.'">
                                            <input type = "hidden" name = "sID" value = "'.$id.'">
                                            <td align = "left">
                                            <input type="submit" name="remove" class="btn btn-danger btn-fill" value="Remove" />
                                            </td>


                                            </form>

                                            '
                                            ;


                                        echo '</tr>';
                                    }

                                        echo '</table>';
                                    ?>

                                    </table>

                                        </div>

                           

                        </div>
<!--                        <input type="submit" name="remove" class="btn btn-success btn-fill" value="Proceed to Checkout" pull-right/>-->
                        
                    </div>
            </div>
            
    </div>
    </form>
</div>
<div class="row" style="display:flex">
                <div class="col-md-6">
<!--                <h5>This should be row 2</h5>-->
                </div>
                <div class="col-md-6">
                <a href='websiteGalleryLoggedInCheckout.php'><button type='submit' class='btn btn-success btn-fill pull-right'>Proceed to Checkout</button></a>
            </div>
        </div>
<!-- END OF LOGIN FORM -->


<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>


</body>
</html>
