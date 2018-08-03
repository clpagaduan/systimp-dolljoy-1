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
    $username = $_SESSION['username'];
    //$cID = $_SESSION['cID'];

    //echo $username;
    //echo 'id';
    //echo ($cID);

    $id = $_GET['id'];

    //$shoppingCart = array();

    if (isset($_POST['add'])){
        require_once('../mysql_connect.php');
    //    $chosenID = $_POST['sID'];
    //    $qty = $_POST['qty'];
    //
    //    echo ('Product ID: ');
    //    echo ($chosenID);
    //    echo ('Qty:');
    //    echo ($qty);
//        $xName = $_POST['name'];
//        $xGen = $_POST['gen'];
//        $xDesc = $_POST['desc'];

        $xHair =$_POST['hairStyle'];
        $xSkin = $_POST['skin'];
        $xEye = $_POST['eyeColor'];
        $xQty = $_POST['qty'];
        $xSize = $_POST['dollSize'];

//        echo ($id);
//        echo ('<br>');
//        echo ($xName);
//        echo ('<br>');
//        echo ($xGen);
//        echo ('<br>');
//        echo ($xDesc);
//        echo ('<br>');
//        echo ($xHair);
//        echo ('<br>');
//        echo ($xSkin);
//        echo ('<br>');
//        echo ($xEye);
//        echo ('<br>');
//        echo ('<br>');
//        echo ($xSize);

        $getDeets = "SELECT * from appdev.product WHERE ProductID = '$id'";
        $resultDeets = mysqli_query($dbc, $getDeets);
        $row = mysqli_fetch_array($resultDeets, MYSQLI_ASSOC);

    $xName = $row['ProductName'];
    $xGen = $row['ProductGender'];
    $xDesc = $row['ProductDescription'];
        $xPrice = $row['ProductPrice'];
        $xSubtotal = $xQty * $xPrice;

//        echo ($xName);
//        echo ($xGen);
//        echo ($xDesc);


    $query = "INSERT INTO appdev.cart (productID, userName, productName, productGender, productDesc, prefHair, prefSkin, prefEye, prefSize, quantity, price, subtotal)
    VALUES ('{$id}', '{$username}','{$xName}', '{$xGen}', '{$xDesc}','{$xHair}', '{$xSkin}', '{$xEye}', '{$xSize}','{$xQty}', '{$xPrice}', '{$xSubtotal}')";
    $result = mysqli_query($dbc, $query);
    header("location: websiteGalleryLoggedIn.php");
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

<!--<div id="banner"></div>-->
<div id="featured" class="container">

<!-- START OF LOGIN FORM -->



<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<center><h3><b>View Details</b></h3></center>

    <div class="content">
        <div class="containter-fluid">
            <div class="row">

                    <?php
                    require_once('../mysql_connect.php');



                    if (isset($_GET['id'])){
                        $xID = $_GET['id'];

                        $query="SELECT * FROM appdev.product WHERE ProductID = \"".$xID."\";";
                        $result=mysqli_query($dbc,$query);
                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

                        $sID = $row['ProductID'];
                        $sName =$row['ProductName'];
                        $sGen = $row['ProductGender'];
                        $sDesc = $row['ProductDescription'];
                        $sSize = $row['ProductSize'];

                        $queryHair = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=1;";
                        $resultHair = mysqli_query($dbc,$queryHair);

                        $image = $row['ProductImage'];
                        $image2 = '<img src="data:image/jpeg;base64,'.base64_encode($image).'"style="width:300px;height:300px"/>';

                        echo'
                        <form action="websiteGalleryLoggedInID.php?id='.$id.'" method="post">
                        <div class="col-lg-4 col-md-12">
                            <div class="card"> <!--for photo-->
                            <center>'.$image2.'</center>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-7">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title"></h4>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Product ID</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="ProductID" value="'.$sID.'">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control border-input" disabled placeholder="ProductName" value="'.$sName.'">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input type="text" name="gen" class="form-control border-input" disabled placeholder="Gender" value="'.$sGen.'">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="desc" class="form-control border-input" disabled placeholder="Description" value="'.$sDesc.'">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Hair</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Skin Color</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Eye Color</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Size</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        ';
                        echo "<div class='row'>";
                        echo "<div class='col-md-2'>";
                        $queryHair = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=1;";
                        $resultHair = mysqli_query($dbc,$queryHair);

                        echo "<select class='form-control' name='hairStyle'>";

                        while ($Row = mysqli_fetch_array($resultHair)){
                        echo "<div class='form-group'>
                        <option value='".$Row['ValueName']."'}>{$Row['ValueName']}</option></div>";
                        }
                        echo "</select>";

                        echo "</div>";


                        echo "<div class='col-md-2'>";
                        $querySkin = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=2;";
                        $resultSkin = mysqli_query($dbc,$querySkin);

                        echo "<select class='form-control' name='skin'>";

                        while ($skinRow = mysqli_fetch_array($resultSkin)){
                        echo "<div class='form-group'>
                        <option value='".$skinRow['ValueName']."'>{$skinRow['ValueName']}</option></div>";
                        }
                        echo "</select>";
                        echo "</div>";

                        echo "<div class='col-md-2'>";
                        $queryEye = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=3;";
                        $resultEye= mysqli_query($dbc,$queryEye);

                        echo "<select class='form-control' name='eyeColor'>";

                        while ($eyeRow = mysqli_fetch_array($resultEye)){
                        echo "<div class='form-group'>
                        <option value='".$eyeRow['ValueName']."'>{$eyeRow['ValueName']}</option></div>";
                        }
                        echo "</select>";
                        echo "</div>";

                        echo "<div class='row'>";
                        echo "<div class='col-md-1'>";
                        $querySize = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=4;";
                        $resultSize= mysqli_query($dbc,$querySize);

                        echo "<select class='form-control' name='dollSize'>";

                        while ($sizeRow = mysqli_fetch_array($resultSize)){
                        echo "<div class='form-group'>
                        <option value='".$sizeRow['ValueName']."'>{$sizeRow['ValueName']}</option></div>";
                        }
                        echo "</select>";
                        echo "</div>";

                        echo "
                        <div class='col-md-2'>
                            <br>
                            <label>Quantity</label>
                            <input type='number' class='form-control border-input' min='1' name='qty' value=1>

                            </div>
                        <div class='col-md-1'>
                            <br>
                            <br>
                            <input type='submit' name='add' class='btn btn-success btn-fill' value='Add to Cart'/>
                        </div>
                        </form>
                        <div class='col-md-2'>

                            <br>
                            <br>

                            </div>

                            ";

                    }
                        ?>
                </div>


            </div><a href='websiteGalleryLoggedIn.php'><button type='submit' class='btn btn-default btn-fill pull-right'>Back to Catalog</button></a>


        </div>
    </div>



<!-- END OF LOGIN FORM -->


<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>


</body>
</html>
