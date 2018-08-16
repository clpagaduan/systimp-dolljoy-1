<?php
require_once('../mysql_connect.php');
$sql = "";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
if (isset($_POST['ship'])){
    $dates = $_POST['shipdate'];
    $id=$_POST['id'];
    

    $sql = "UPDATE Orders SET OShippedDate = '$dates', OShipmentStatus = 'Shipped' WHERE OrderID = $id" ;
    $qu = mysqli_query($dbc, $sql);

}
if (isset($_POST['paid'])){
    echo "<div class=\"alert alert-success\" align=\"center\">
  Successfully Paid!    
</div>";
    $id=$_POST['id'];
    $ORnum=$_POST['ORnum'];
    $imagename = $_FILES['myimage']['name'];
    $imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
    
    $sql = "UPDATE Orders SET ORnumber= '".$ORnum."' , ORimage = '".$imagetmp."', OPaymentDate = DATE(NOW()), OPaymentStatus = 'Paid' WHERE OrderID = " . $_POST['id'];
}

if (!empty($sql))
    $qu = mysqli_query($dbc, $sql);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Payment and Shipment</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>
 <form action="prodManPaymentShipment.php" method="post" enctype="multipart/form-data">
<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="websiteHome.php" class="simple-text">
                    Dolljoy
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="prodManDashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="prodManAccountRequests.php">
                        <i class="ti-user"></i>
                        <p>Account Requests</p>
                    </a>
                </li>
                <li>
                    <a href="prodManAccountActivations.php">
                        <i class="ti-unlock"></i>
                        <p>Account Activations</p>
                    </a>
                </li>
                <li>
                    <a href="prodManAddEmployees.php">
                        <i class="ti-id-badge"></i>
                        <p>Add Employees</p>
                    </a>
                </li>
                <li>
                    <a href="prodManViewAccounts.php">
                        <i class="ti-eye"></i>
                        <p>View Accounts</p>
                    </a>
                </li>
                <li>
                    <a href="prodManReviewOrders.php">
                        <i class="ti-search"></i>
                        <p>Review Orders</p>
                    </a>
                </li>
                <li>
                    <a href="prodManCurrentOrders.php">
                        <i class="ti-layers-alt"></i>
                        <p>Current Orders</p>
                    </a>
                </li>
                <li class="active">
                    <a href="prodManPaymentShipment.php">
                        <i class="ti-new-window"></i>
                        <p>Payment and Shipment</p>
                    </a>
                </li>
                <li>
                    <a href="prodManCompletedOrders.php">
                        <i class="ti-agenda"></i>
                        <p>Completed Orders</p>
                    </a>
                </li>
                <li>
                    <a href="prodManSupplyOrders.php">
                        <i class="ti-shopping-cart-full"></i>
                        <p>Supply Orders</p>
                    </a>
                </li>
                <li>
                    <a href="prodManAddSuppliers.php">
                        <i class="ti-package"></i>
                        <p>Add Suppliers</p>
                    </a>
                </li>
                <li>
                    <a href="prodManInventoryManagement.php">
                        <i class="ti-archive"></i>
                        <p>Inventory Management</p>
                    </a>
                </li>
                <li>
                    <a href="prodManSalesReport.php">
                        <i class="ti-stats-up"></i>
                        <p>Sales Report</p>
                    </a>
                </li>
                <li>
                    <a href="prodManDollCreation.php">
                        <i class="ti-wand"></i>
                        <p>Doll Creation</p>
                    </a>
                </li>
                <li>
                    <a href="prodManDollSpecification.php">
                        <i class="ti-paint-bucket"></i>
                        <p>Doll Specification</p>
                    </a>
                </li>
                <li>
                    <a href="prodManSpecificationChoices.php">
                        <i class="ti-menu-alt"></i>
                        <p>Specifcation Choices</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="prodManPaymentShipment.php">Payment and Shipment</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-link"></i>
									<p>Website</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="websiteHome.php">Homepage</a></li>
                                <li><a href="websiteGalleryLoggedIn.php">Gallery</a></li>
                                <li><a href="websiteServicesLoggedIn.php">Services</a></li>
                                <li><a href="#">Contact Us</a></li>
                              </ul>
                        </li><li>
                            <a href="websiteHome.php">
								<i class="ti-shift-right"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <p class="category">1) Enter OR number to a payment to an order <br>
2) Once the OR number is filled out, click 'PAID' to update the payment status</p>
                            </div>
                                <div class="content table-responsive table-full-width"style='overflow:auto; max-height:32vh;'>
                                
                                <table class="table table-hover" >
                                    <thead>
                                        <th><p class="category"><b>ORDER ID</b></p></th>
                                        <th><p class="category"><b>COMPANY</b></p></th>
                                        <th><p class="category"><b>QUANTITY</b></p></th>
                                        <th><p class="category"><b>DATE ORDER</b></p></th>
                                        <th><p class="category"><b>DATE REQUIRED</b></p></th>
                                        <th><p class="category"><b>  OR NUMBER</b></p></th>
                                        <th><p class="category"><b> UPLOAD </b></p></th>
                    
                                    </thead>
                                    
                                    
<?php

//PAID
$query="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE OPaymentStatus='Unpaid' AND OrderStatus='Approved' AND CompanyID = OCompanyID";
$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);
                                    
//SHIP
$query2="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE ManufacturingStatus='Completed' AND OShipmentStatus='Not shipped' AND CompanyID = OCompanyID";
$result2=mysqli_query($dbc,$query2);

$numRows2 = mysqli_num_rows($result2);
    if($numRows ==0 && $numRows2 == 0){
        $message="No orders to show";
    }
    
                                    
//PAID
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['OrderID'];

echo 
"
<tr>
<form action=\"prodManPaymentShipment.php\" method=\"post\" enctype=\"multipart/form-data\">
<td><b><a href=\"prodManCurrentOrderID.php?id=$id \">{$row['OrderID']}</a></b></td>
<td><b>{$row['CName']}</b></td>
<td><b>{$row['OQuantity']}</b></td>
<td><b>{$row['OOrderedDate']}</b></td>
<td><b>{$row['ORequiredDate']}</b></td>

<td><b><input type=\"number\" name=\"ORnum\" required ></b></td>
<td><b><input type=\"file\" name=\"myimage\" required ></b></td>


<td>
                           
                             
                            <input type = \"submit\"  name=\"paid\" class=\"btn btn-fill btn-danger\" value=\"PAID\" >
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"$id\"></form>
                            </td></tr>
";

    
    ;
}?>
                                    
                                    
                                    </table>
                                    
    <center>
    <label>
        <?php 
            if(isset($message)){
                echo $message;
            }
        ?>
            
    </label>
    </center>

                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <br>
                        
                       
                    </div>
                    
                     <div class="card">
                            <div class="header">
                                <p class="category">    <p class="category">1) Select a Date to a Shipment Date to an order <br>
2) Once the Shipment Date is selected, click 'SHIP' to update the shipment status</p>
                            </div>
                        <div class="content table-responsive table-full-width"style='overflow:auto; max-height:32vh;'>
                                
                                <table class="table table-hover" >
                                    <thead>
                                        <th><p class="category"><b>ORDER ID</b></p></th>
                                        <th><p class="category"><b>COMPANY</b></p></th>
                                        <th><p class="category"><b>QUANTITY</b></p></th>
                                        <th><p class="category"><b>DATE ORDER</b></p></th>
                                        <th><p class="category"><b>DATE REQUIRED</b></p></th>
                                         <th><p class="category"><b>DATE SHIPPED</b></p></th>
                    
                                    </thead>
                                    
<?php

//PAID
$query="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE OShipmentStatus='Not shipped'  AND OrderStatus='Approved' AND CompanyID = OCompanyID";
$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);
                                    


                             
//PAID
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['OrderID'];

echo 
"
<tr>
  <form action=\"prodManPaymentShipment.php\" method=\"post\">
<td><b><a href=\"prodManCurrentOrderID.php?id=$id \">{$row['OrderID']}</a></b></td>
<td><b>{$row['CName']}</b></td>
<td><b>{$row['OQuantity']}</b></td>
<td><b>{$row['OOrderedDate']}</b></td>
<td><b>{$row['ORequiredDate']}</b></td>
<td><b><input type=\"date\" name=\"shipdate\" required></b></td>



<td>
                          
                            <input type = \"submit\"  name=\"ship\" class=\"btn btn-fill btn-success\" value=\"SHIP\" >
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"$id\"></form>
                            </td></tr>
";
    
  

    
    ;
}?>
                                    
                                    
                                    </table>
                                    
    <center>
    <label>
        <?php 
            if(isset($message)){
                echo $message;
            }
        ?>
            
    </label>
    </center>

                        </div>
                        
                    </div>
                </div>




                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> designed by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>


    </div>
</div>

<div></div>



</form>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
