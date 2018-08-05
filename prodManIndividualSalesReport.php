<!doctype html>
<?php
    require_once('../mysql_connect.php');
    session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sales Report — Individual Sales Report</title>

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
                <li>
                    <a href="prodManInventoryManagement.php">
                        <i class="ti-archive"></i>
                        <p>Inventory Management</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="prodManSalesReport.php">Sales Report</a>
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
                            <p class="category">
                                <b>
                                <br>    
                                &nbsp;&nbsp;&nbsp;    
                                <?php
                                date_default_timezone_set('Asia/Manila');
                                echo "<b>As of ".date('m/d/Y h:i A', time())."</b>";
                                ?>
                                </b>    
                                </p>
                            <center>
                            <div class="header">
                                <h3 class="title"><b>DOLLJOY<br></b></h3>
                                <h4 class="title"><b>INDIVIDUAL SALES REPORT</b></h4>
                            </div>
                            
                                <div class="content table-responsive table-full-width">
                                
                                <table class="table table-hover">
                           <?php
                            
                            if (isset($_GET["id"])){
                                $id = $_GET['id'];
                                $query = "SELECT *, FORMAT(OTotalAmount,2) AS OTotalAmount, FORMAT(OQuantity,0) AS OQuantity, FORMAT(OPrice,2) AS OPrice, ClientAccount.CName AS 'Name', Product.ProductType AS 'Type', Product.ProductName AS 'PName' FROM Orders O INNER JOIN ClientAccount ON O.OCompanyID=ClientAccount.CompanyID INNER JOIN ordersrefs ON O.orderid=ordersrefs.orderid
inner join product on product.productid = ordersrefs.productid WHERE ordersrefs.OrderID =$id group by ordersrefs.productid";
                                
                                // ORDER DETAILS TABLE
                                    
                                $result=mysqli_query($dbc,$query);
                                while ($row=mysqli_fetch_array($result)){
                                    $productID = $row['OProductID'];
                                    $name = $row['Name'];
                                    $qty = $row['OQuantity'];
                                    $price = $row['OPrice'];
                                    $totalamt = $row['OTotalAmount'];
                                    $odate = date_format(date_create($row['OOrderedDate']), 'F d, Y');
                                    $pdate = date_format(date_create($row['OPaymentDate']), 'F d, Y');
                                    $ptype = $row['Type'];
                                    $pname = $row['PName'];
                                    
                                echo '<table width=50%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><font color="white"><b>ORDER DETAILS</font>
                                </div></b></td>
                                </tr>';
                                    
                                    
                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b>Order #</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">$id
                                </div></td>
                                </tr>
                                
                                
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Ordered by</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">$name
                                </div></td>
                                </tr>
                                
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Date Ordered</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">$odate
                                </div></td>
                                </tr>
                                
                                
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Payment Date</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">$pdate
                                </div></td>
                                </tr>
                                    
                                
                                </table>
                                <br><br>";
                                    
                                
                                // ORDER PRICE AND QUANTITY    
                                echo '<table width=50%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><font color="white"><b>ORDER PRICE AND QUANTITY</font>
                                </div></b></td>
                                </tr>';
                                    
                                    
                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b>Price per Doll (in PHP)</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">$price
                                </div></td>
                                </tr>
                                
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Quantity Ordered</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">$qty
                                </div></td>
                                </tr>
                                
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Total Amount (in PHP)</b>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">PHP $totalamt
                                </div></td>
                                </tr>
                                    
                                
                                </table>
                                <br><br>";
                            }
                            }
                            
                            else{
                                echo "No Order ID selected.";
                            }

                                ?>
                            <strong><center><b>------ END OF REPORT ------</b></center></strong>
                            <br><br>
                            <center>
                            <a class="noprint" href="javascript:window.print()"><input type="submit" value="Print" class="btn btn-fill btn-info"></a>
                            </center>
                          
                            <center>
                                <form action="prodManGeneratedSalesReport.php" method="post">
                                    <input type="hidden" name="startDate" value="<?php echo $startDate; ?>">
                                    <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                                    <br>
                                    <input class="noprint btn btn-fill btn-default" type="submit" method="Back" name="Back" value="Back"></form></center>

                        <br>
                        <br>
                                </table>
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
