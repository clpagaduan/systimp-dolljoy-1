<?php
session_start();

require_once(__DIR__.'/../mysql_connect.php');
$username = $_SESSION['USERNAME'];



$type = $_SESSION['usertype'];
if(empty($type)){

}
else if($type == 3){
//client

	$querys = "SELECT * 
		  	FROM   clientaccount 
		  	WHERE  CRepUsername = '".$username."'";
  $results=mysqli_query($dbc,$querys);
  while($row=mysqli_fetch_array($results)){
  	$userID= $row[0];
  	
  }
}
else{

} 


if(isset($_GET['id'])){

$id=$_GET['id'];

  $query = "SELECT * 
		  	FROM   Product 
		  	WHERE  ProductID = '".$id."'";
  $result=mysqli_query($dbc,$query);
  while($row=mysqli_fetch_array($result)){
  	$dollImage=$row[3];
  	$dollDescription=$row[4];
    $dollName=$row[2];
    $dollID=$row[0];
    $dollSize=$row[6];
	}
}
date_default_timezone_set('Asia/Manila');
$msg="";
$message="";
$count="";

$dateToday = date('Y-m-d');


if (isset($_POST['submit'])){
$requiredDate =$_POST['requiredDate'];

		if($requiredDate > $dateToday){
			$OCompanyID = $userID; //CHANGE TO SESSION ID PLSSSS
		$OQuantity = $_POST['quantity'];
		$OPrice = 250;
		$OTotalAmount = 250 * $OQuantity;
		$OOrderDate = date("Y-m-d");
		$ORequiredDate = $_POST['requiredDate'];
		$OShippedDate = "";
		$OrderStatus = "Pending";
		$OPaymentStatus = "Unpaid";
		$OPaymentDate = "";
		$OShipmentStatus = "Not Shipped";
		$StartManufacturing = "";
		$EndManufacturing = "";
		$ManufacturingStatus = "Pending";

        $message=NULL;
        echo "{$dollID} <br>";
        echo "{$OCompanyID} <br>";
        echo "{$OQuantity} <br>";
        echo "{$OPrice} <br>";
        echo "{$OTotalAmount} <br>";
        echo "$OOrderDate <br>";
        echo "$ORequiredDate <br>";
        echo "$OShippedDate <br>";
        echo "$OrderStatus <br>";
        echo "$OPaymentStatus <br>";
        echo "$OPaymentDate <br>";
        echo "$OShipmentStatus <br>";
        echo "$StartManufacturing <br>";
        echo "$EndManufacturing <br>";
        echo "$ManufacturingStatus <br>";
        
        

             $query8="update ordersrefs set weighthair=( select sum(weight)*quantity from attributevalues where prefHair=valuename  group by orderid) ;";


          $result8=mysqli_query($dbc,$query8);
            
            
             $query7="update ordersrefs set weighthair=( select sum(weight)*quantity from attributevalues where prefHair=valuename  group by orderid)";


          $result7=mysqli_query($dbc,$query7);
            
            
            

        $query2="INSERT INTO Orders       	(OProductID,
                                             OCompanyID,
                                             OQuantity,
                                             OPrice,
                                             OTotalAmount,
                                             OOrderedDate,
                                             ORequiredDate,
                                             OShippedDate,
                                             OrderStatus,
                                             OPaymentStatus,
                                             OPaymentDate,
                                             OShipmentStatus,
                                             StartManufacturing,
                                             EndManufacturing,
                                             ManufacturingStatus)

                              VALUES        ('{$dollID}',
                                             '{$OCompanyID}',
                                             '{$OQuantity}',
                                             '{$OPrice}',
                                             '{$OTotalAmount}',
                                             '{$OOrderDate}',
                                             '{$ORequiredDate}',
                                             NULL,
                                             '{$OrderStatus}',
                                             '{$OPaymentStatus}',
                                             NULL,
                                             '{$OShipmentStatus}',
                                             NULL,
                                             NULL,
                                             '{$ManufacturingStatus}')";


          $result2=mysqli_query($dbc,$query2);
          header("location:thankYou.php");
		}
		else{
			echo "Enter a later date please.";
		}



		




        }


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
<title>SHOPPING CART</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    
</head>
<body>
<div id="header" class="container">
	<div id="logo">
        <h1><a href="websiteHomeLoggedIn.php" target="_blank"><img src="http://i65.tinypic.com/29mwvnm.jpg" border="0" alt="Image and video hosting by TinyPic" style="width:250px"></a></h1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="websiteHomeLoggedIn.php" accesskey="1" title="">Homepage</a></li>
            <li><a href="websiteGalleryLoggedIn.php" accesskey="5" title="">Gallery</a></li>
			<li><a href="websiteServicesLoggedIn.php" accesskey="5" title="">Services</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>
            <li><a href="clientDashboard.php" accesskey="7" title="">Account</a></li>
            <li><a href="websiteHome.php" accesskey="7" title="">Logout</a></li>            
		</ul>
	</div>
</div>
    
    
<div class="container">
    <div class="row">
        <div class="column">
    <h1 style="color:#ED9B3E">Shopping cart - Order summary</h1>
    
<section id="single-project">
   <div class="container">

		
        <div class="wow fadeInUp col-md-push-1">
		
<!-- Content section
================================================== -->
	<p>You may <b>EDIT SPECIFICATIONS</b> of your doll orders</p>

	<br>

	<head>
	<style>
	table {
		width:50%;

	}
	th, td {
		padding: 5px;
		text-align: left;
	}
	table#t01 tr:nth-child(even) {
		background-color: #f9f9f9;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#f9f9f9;
	}
	table#t01 th {
		background-color: gray;
		color: white;
	}
	</style>
	</head>
	<body>

	<table id="t01" class="table"> 
	  <tr>
		<th><center>Product Name & Number</center></th>
		<th><center>Quantity</center></th>
		<th><center>Date Needed</center></th>
		<th><center>Size</center></th>

		<?php 

                            $query4 = "SELECT 		p.productID,
                  						av.ValueName as 'valname',
                  						av.ValueImage as 'valimage',
                  						a.AttributeName as 'attname',
                  						pd.ProductName as 'prodname',
                  						pd.ProductType as 'prodtype' 

                             FROM 		Product_has_Attribute p 
                             JOIN 		AttributeValues av ON p.AttributeValueID = av.ValueID 
                             JOIN 		Attribute a 	   ON av.AttributeTypeID = a.AttributeID 
                             JOIN 		Product pd 		   ON pd.ProductID = p.ProductID 
                             WHERE 		p.ProductID = $dollID
                             ORDER BY 	a.AttributeName desc";
                $result5=mysqli_query($dbc,$query4);
                while ($row5=mysqli_fetch_array($result5)){
                    $category = $row5['attname'];
                    $value = $row5['valimage'];

?>
		<th><center><?php echo $category; ?></center></th>

<?php
 } 
?>
	  </tr>
<!----------------------------------------------------------------------------------------------------------------------------------------------------FORM--> 
	  <tr>
<form action="dollNoModOS.php?id=<?php echo $id; ?>" class="ws-validate" method="POST" style="width:50%">
		<td><center><h3><?php echo $dollName; ?><br><?php echo $dollID; ?></center></td>
		<td><center><h3><input name="quantity" type="number" min="1" style="width:70%" required></center></td>
		<td><h3>
		
		<div class="form-row show-inputbtns">
			<input name="requiredDate" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" required />
		</div>

	</center></td>
		<td><center><h3><?php echo $dollSize; ?></center></td>

			<?php 

                            $query = "SELECT  *
                                      FROM    Product_has_Attribute
                                      JOIN    AttributeValues ON Product_has_Attribute.AttributeValueID = AttributeValues.ValueID
                                      WHERE   Product_has_Attribute.ProductID = '".$id."'";


                            $result=mysqli_query($dbc,$query);
                            //Loop for attribute picture
                            while ($row = mysqli_fetch_array($result)) { 

?>

		<td><center><img src=<?php  echo '"data:image/jpeg;base64,'.base64_encode( $row['ValueImage'] ).'" '; ?> style="width:70%"><br></center></td>


<?php
 } 
?>
	  </tr>	  

	</table>
	</font>
	</body>
<!----------------------------------------------------------------------------------------------------------------------------------------------------QUERIES-->	
			<br>

			<center>
			<div class="project-info">
				<h4>What would you like to<b> do next?</b></h4>
				
				

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<button type="submit" class="btn btn-success" name="submit">S U B M I T&nbsp;&nbsp;&nbsp;O R D E R</button>
				</form>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<a href="gallery.php"><button type="button" class="btn btn-danger">C A N C E L&nbsp;&nbsp;&nbsp;O R D E R</button></a>

			</div>
		
		</h5>
		


</section>
	    
        </div>
    </div>
</div>
		

		
					<br></br>

		
		<br></br>

      

<div id="copyright" class="container">
	<p>&copy; Dolljoy. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
