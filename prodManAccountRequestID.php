<?php

require_once(__DIR__.'/../mysql_connect.php');

session_start();
$id = $_GET['id'];
if (isset($_POST['update'])){
    $queryA = "SELECT * FROM ClientAccount WHERE CompanyID = '\"{$id}\" ";
    $resultA = mysqli_query($dbc, $queryA);
    if ($rowA = mysqli_fetch_array($resultA, MYSQLI_ASSOC)){
        if (isset($_POST['qty'])){
            $qty = $_POST['qty'];
            $totalAmt = $qty * $rowA['OPrice'];

            $query = "UPDATE `Orders` SET OQuantity = '".$qty."', OTotalAmount = '".$totalAmt."' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        if (isset($_POST['price'])){
            $price = $_POST['price'];
            $totalAmt = intval($price) * intval($rowA['OQuantity']);

            $query = "UPDATE `Orders` SET OPrice = '".$price."', OTotalAmount = '".$totalAmt."' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        if (isset($_POST['orderDate'])){
            $orderDate = $_POST['orderDate'];

            $query = "UPDATE `Orders` SET OOrderedDate = '".$orderDate."' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        if (isset($_POST['requireDate'])){
            $requireDate = $_POST['requireDate'];

            $query = "UPDATE `Orders` SET ORequiredDate = '".$requireDate."' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        if (isset($_POST['payDate'])){
            $payDate = $_POST['payDate'];

            $query = "UPDATE `Orders` SET OPaymentDate = '".$payDate."', OPaymentStatus = 'Paid' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        if (isset($_POST['startDate'])){
            $startDate = $_POST['startDate'];

            $query = "UPDATE `Orders` SET StartManufacturing = '".$startDate."', ManufacturingStatus = 'In Progress' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
        else if (isset($_POST['endDate'])){
            $endDate = $_POST['endDate'];
            $query = "UPDATE `Orders` SET EndManufacturing = '".$endDate."', ManufacturingStatus = 'Completed' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);

        }
        else if (isset($_POST['shipDate'])){
            $shipDate = $_POST['shipDate'];

            $query = "UPDATE `Orders` SET OShippedDate = '".$shipDate."', OShipmentStatus = 'Shipped', OrderStatus = 'Completed' WHERE OrderID = '".$orderID."'; ";
            $result = mysqli_query($dbc, $query);
        }
    }
}

if (isset($_POST['accept'])){    
        echo "<div class=\"alert alert-success\" align=\"center\">
  Account Added!  
</div>";
    $sql = "UPDATE ClientAccount SET AccountStatus = 'Accepted' WHERE CName = \"{$id}\" ";
    header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/prodManAccountActivations.php");
                
}
else if (isset($_POST['reject'])){
        echo "<div class=\"alert alert-danger\" align=\"center\">
 Account Rejected!
</div>";
    $sql = "UPDATE ClientAccount SET AccountStatus = 'Rejected' WHERE CName = \"{$id}\" ";
	header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/prodManAccountRequests.php");
}

if (!empty($sql)){
    $qu = mysqli_query($dbc, $sql);
}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Account request: <?php echo $id; ?></title>

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
<form action = "prodManAccountRequestID.php?id=<?php echo $id; ?>" method = "POST">
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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManAccountRequests.php">Account Requests</a>
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
                                <h4 class="title">Account request: <b><?php echo $id; ?></b> </h4>
                            </div>   
                                <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category"><b>COMPANY NAME</b></p></th>
                                        <th><p class="category"><b>ADDRESS</b></p></th>
                                        <th><p class="category"><b>CONTACT NUMBER</b></p></th>
                                        <th><p class="category"><b>E-MAIL</b></p></th>
                                    </thead>
                                    
<?php

require_once('../mysql_connect.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT *
              FROM   ClientAccount WHERE CName = \"".$id."\"; ";
    $result=mysqli_query($dbc,$query);
    $row = mysqli_fetch_array($result);
    
echo 
"
<tbody>
<tr>

<td><b>{$row['CName']}</a></b></td>
<td><b>{$row['CAddress']}</b></td>
<td><b>{$row['CContactNo']}</b></td>
<td><b>{$row['CEmailAdd']}</b></td>

</tr>
</tbody>
"
;

}

echo '</table>';

?>
                                  
                        <br>

                        <!--<h5>Representative details</h5>-->

                        <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category"><b>REPRESENTATIVE</b></p></th>
                                        <th><p class="category"><b>ADDRESS</b></p></th>
                                        <th><p class="category"><b>CONTACT NUMBER</b></p></th>
                                        <th><p class="category"><b>E-MAIL</b></p></th>
                                    </thead>
                                    <tbody>

<?php

require_once('../mysql_connect.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT *
              FROM   ClientAccount WHERE CName = \"".$id."\"; ";
    $result=mysqli_query($dbc,$query);
    $row = mysqli_fetch_array($result);



    echo 
    "
    <tr>
    <td><b>{$row['CRepFirstName']} {$row['CRepLastName']}</div></b></td>

    <td><b>{$row['CRepAddress']}</div></b></td>

    <td><b>{$row['CRepContactNo']}</div></b></td>

    <td><b>{$row['CRepEmailAdd']}</div></b></td>

    </tr>
    </tbody>
    ";
}


echo '</table>';

?>

<br><br>


    <button type="button" name = "accept" class="btn btn-success btn-fill pull-left" data-toggle="modal" data-target="#exampleModal">Accept Request</button>
    <button type="button" name = "reject" class="btn btn-danger btn-fill pull-left" data-toggle="modal" data-target="#exampleModal1">Reject Request</button>
    <a href="prodManAccountRequests.php"><button type="submit" class="btn btn-default btn-fill pull-right">Back to Account Requests</button></a>


<br><br><br>



                            </div>
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
<div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activate Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Confirm Account Activation?
      </div>
      <div class="modal-footer">
        <button type="submit" name ="accept"  class="btn btn-secondary">Confirm</button>
            <button type="button"  class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Confirm Account Rejection?
      </div>
      <div class="modal-footer">
        <button type="submit" name ="reject"  class="btn btn-secondary">Confirm</button>
            <button type="button"  class="btn btn-primary" data-dismiss="modal">Cancel</button>
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
