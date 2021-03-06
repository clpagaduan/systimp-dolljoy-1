<!doctype html>
<?php
session_start();

    require_once('../mysql_connect.php');
    if(isset($_POST['approve'])){
        $id = $_POST['approve'];
        $query = "UPDATE Orders
                  SET OrderStatus = 'Approved',
                      ManufacturingStatus = 'Pending',
                      OPaymentStatus = 'Unpaid',
                      OShipmentStatus = 'Not shipped'

                  WHERE OrderID = '{$id}' ";

        mysqli_query($dbc, $query);
    }
    ?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Order Tracking</title>

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

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="info">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="websiteHome.php" class="simple-text">
                    Dolljoy
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="clientDashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="clientUserProfile.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <!--
                <li>
                    <a href="clientReviewOrders.php">
                        <i class="ti-search"></i>
                        <p>Review Orders</p>
                    </a>
                </li>
                -->
                <li class="active">
                    <a href="clientOrderTracking.php">
                        <i class="ti-flag-alt-2"></i>
                        <p>Order Tracking</p>
                    </a>
                </li>
                <li>
                    <a href="clientOrderHistory.php">
                        <i class="ti-book"></i>
                        <p>Order History</p>
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
                    <a class="navbar-brand" href="clientOrderTracking.php">Order Tracking</a>
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
                                <li><a href="websiteHomeLoggedIn.php">Homepage</a></li>
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
                                <p class="category"><b>Click on an ORDER # to view more order details</b></p>
                            </div>
                            <br><br>
                                <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category"><b>ORDER #</b></p></th>
                                        <th><p class="category"><b>DATE ORDERED</b></p></th>
                                        <th><p class="category"><b>DATE REQUIRED</b></p></th>
                                        <th><p class="category"><b>PAYMENT</b></p></th>
                                        <th><p class="category"><b>MANUFACTURING</b></p></th>
                                        <th><p class="category"><b>SHIPMENT</b></p></th>
                                    </thead>
                                <?php

require_once('../mysql_connect.php');

$username = $_SESSION['username'];
$query="SELECT *, ClientAccount.CName AS 'CName'
        FROM Orders O INNER JOIN ClientAccount ON O.OCompanyID=ClientAccount.CompanyID WHERE O.OrderStatus != 'Completed' AND CRepUsername='$username'";

$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);
    if($numRows ==0){
        $message="No orders to show";
    }

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$id=$row['OrderID'];

echo "
<tbody>
<tr>
<td><b><a href=\"clientOrderTrackingID.php?id=$id \">{$row['OrderID']}</b></a></td>

<td><b>{$row['OOrderedDate']}</b></td>

<td><b>{$row['ORequiredDate']}</b></td>

<td><b>{$row['OPaymentStatus']}</b></td>

<td><b>{$row['ManufacturingStatus']}</b></td>

<td><b>{$row['OShipmentStatus']}</b></td>

</tr>
</tbody>";

}

?>
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
