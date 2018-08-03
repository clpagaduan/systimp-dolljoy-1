<?php
require_once('../mysql_connect.php');
$sql = "";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
if (isset($_POST['accept'])){
	$id=$_POST['id'];
	$sql = "UPDATE Supplies SET DateReceived = '".$date."' WHERE SupplyID = " . $_POST['id'];
    echo "<div class='alert alert-success' align='center'>
  <strong>Product Recieved!</strong></div>
    ";
}

if (!empty($sql))
	$qu = mysqli_query($dbc, $sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Inventory Management</title>

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
<form action ="prodManInventoryManagement1.php" method="post">
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
                <li>
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
                <li class="active">
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
                    <button type="button"  class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="prodManInventoryManagement.php">Inventory Management</a>
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

                              <p class="category">   </p>
            <button type = "submit" name = "viewInventory" class = "btn btn-info">View Inventory</button>
            <button type = "submit" name = "receiveSupplies" class = "btn btn-info">Receive Supplies</button>
                                
                               
                        

                                <br><br>
                            <div class="content table-responsive table-full-width">   
                            <table class="table table-hover">

                            
                            <?php  
    
                                    if (isset($_POST['receiveSupplies']))
                            {
                                    { echo"
                                        
                            $query=\"SELECT SupplyID, DateOrdered, SupplyDescription, SupplyQuantity, Suppliers.SupplierName AS 'Supplier' FROM Supplies S INNER JOIN Suppliers ON S.SupplierID=Suppliers.SupplierID WHERE `DateReceived` IS NULL\";
                            $result=mysqli_query($dbc,$query);
                            
                            
                            $query2=\"SELECT SupplyID FROM Supplies WHERE `DateReceived` IS NULL\";
                            $result2=mysqli_query($dbc,$query2);
                            $result3 = $result2->num_rows;
                            
                            if ($result3 >0){
                            echo '<tr>
                            <td width=\"10%\"><div align=\"center\"><h6>Supply ID
                            </div></b></td>
                            <td width=\"10%\"><div align=\"center\"><h6>Date Ordered
                            </div></b></td>
                            <td width=\"10%\"><div align=\"center\"><h6>Supply Description 
                            </div></b></td>
                            <td width=\"10%\"><div align=\"center\"><h6>Quantity<br>(in kilograms)
                            </div></b></td>
                            <td width=\"10%\"><div align=\"center\"><h6>Supplier
                            </div></b></td>
                            <td width=\"10%\"><div align=\"center\"><h6>Action 
                            </div></b></td>

                            </tr>';
                            "?>

                            <?php 

                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $id=$row['SupplyID'];

                                
                            echo "<tr>
                            <td width=\"10%\"><div align=\"center\"><b>{$row['SupplyID']}</b>
                            </div></td>
                            <td width=\"10%\"><div align=\"center\"><b>{$row['DateOrdered']}</b>
                            </div></td>
                            <td width=\"10%\"><div align=\"center\"><b>{$row['SupplyDescription']}</b>
                            </div></td>
                            <td width=\"10%\"><div align=\"center\"><b>{$row['SupplyQuantity']}</b>
                            </div></td>
                            <td width=\"10%\"><div align=\"center\"><b>{$row['Supplier']}</b>
                            </div></td>
                            <td><div align=\"center\">
                            <form action=\"prodManInventoryManagement1.php\" method=\"post\">
                            <input type = \"button\"  class=\"btn btn-fill btn-success\" value=\"RECEIVE\" data-toggle=\"modal\" data-target=\"#exampleModal\">
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
                            </form>
                            </div></td>
                            </tr>";
                            }

                            echo '</table>';
                            
                            
                            
                            if ($result3==0){
                                echo '<center><b>No orders to be received!</b></center>';
                            }
                        
                            } } // end if receive supplies
                            ?>
                                
                            </div>
                            </div>
                                <div class="content table-responsive table-full-width">
                                
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
</div>
    
     <div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inventory Management</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Are You Sure You want to Receive?
      </div>
      <div class="modal-footer">
          <button type="submit" name="accept" onclick="Alert()" class="btn btn-secondary">Yes</button>
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
    
            
                
            
        
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
