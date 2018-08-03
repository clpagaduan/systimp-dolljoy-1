<?php

require_once(__DIR__.'/../mysql_connect.php');
session_start();
$orderID = $_GET['id'];







?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Current Orders — Order #<?php echo $orderID; ?></title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManCurrentOrders.php">Current Orders</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <!--                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="ti-link"></i>
                              <p>Website</p>
                              <b class="caret"></b> -->
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
                                <h4 class="title"><b>Order #<?php echo $orderID; ?></b> </h4>
                            </div>
                                <div class="content table-responsive table-full-width">

                                <table class="table table-hover">
<?php

                            if (isset($_GET["id"])){
                                $id = $_GET['id'];
                                $query = "SELECT OrderStatus, OOrderedDate, ORequiredDate, OPaymentStatus, OShipmentStatus, OShippedDate, StartManufacturing, EndManufacturing, OPaymentDate, ManufacturingStatus, FORMAT(OTotalAmount,2) AS tamt, FORMAT(OQuantity,0) AS qty, FORMAT(OPrice,2) AS prc, ClientAccount.CName AS 'Name' FROM Orders O JOIN ClientAccount ON O.OCompanyID=ClientAccount.CompanyID  WHERE OrderID = $id";

                                // ORDER DETAILS TABLE

                                $result=mysqli_query($dbc,$query);
                                while ($row=mysqli_fetch_array($result)){
                                    //$productID = $row['OProductID'];
                                    $name = $row['Name'];
                                    $qty = $row['qty'];
                                    $price = $row['prc'];
                                    $totalamt = $row['tamt'];
                                    $status = $row['OrderStatus']; //
                                    $pstatus = $row['OPaymentStatus'];
                                    $sstatus = $row['OShipmentStatus'];
                                    $mstatus = $row['ManufacturingStatus'];
                                    //$ptype = $row['Type'];
                                    //$pname = $row['PName'];

                                    $pdate = date_format(date_create($row['OPaymentDate']), 'F d, Y');
                                    $odate = date_format(date_create($row['OOrderedDate']), 'F d, Y');
                                    $rdate = date_format(date_create($row['ORequiredDate']), 'F d, Y');
                                    $sdate = date_format(date_create($row['OShippedDate']), 'F d, Y');
                                    $smdate = date_format(date_create($row['StartManufacturing']), 'F d, Y');
                                    $emdate = date_format(date_create($row['EndManufacturing']), 'F d, Y');

                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
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
                                <td width=\"10%\"><div align=\"center\"><b>Order Status</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$status
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
                                <td width=\"10%\"><div align=\"center\"><b>Required Date</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$rdate
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Payment Status</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$pstatus
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Payment Date</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">";
                                if ($pstatus!='Unpaid')
                                    echo $pdate;
                                else
                                    echo "Unpaid";
                                echo "
                                </div></td>
                                </tr>


                                </table>
                                <br><br>";

                                    // ORDER PRICE AND QUANTITY
                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><font color="white"><b>ORDER PRICE AND QUANTITY</font>
                                </div></b></td>
                                </tr>';


                                echo "

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Quantity Ordered</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$qty
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Total Amount</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">PHP$totalamt
                                </div></td>
                                </tr>


                                </table>
                                <br><br>";


                                //MANUFACTURING STATUS
                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><font color="white"><b>MANUFACTURING STATUS:</font> ';



                                if ($mstatus != 'Completed'){
                                    echo "<font color='red'>";
                                    if (empty($mstatus)){
                                        echo "<b>Not Started</b>";
                                    }
                                    else {
                                        echo "<b>$mstatus</b>";
                                    }
                                    echo '</font></div></b></td>
                                </tr>';


                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b></b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\"><b>DATE</b>
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Start Date</b>
                                </div></td>";


                                if ($mstatus == 'Pending' && $pstatus=='Unpaid'){
                                    echo "<td width=\"10%\"><div align=\"center\">Order has not been paid for yet</div></td><tr>";
                                    echo "<tr>
                                    <td width=\"10%\"><div align=\"center\"><b>End Date</b>
                                    </div></td>
                                    <td width=\"10%\"><div align=\"center\">Order has not been paid for yet</div></td></tr>";
                                }
                                else if ($mstatus = 'In Progress'){
                                    echo "<td width=\"10%\"><div align=\"center\">$smdate</td></tr>
                                    <tr>
                                    <td width=\"10%\"><div align=\"center\"><b>End Date</b>
                                    </div></td>
                                    <td width=\"10%\"><div align=\"center\">In progress</div></td>
                                    </div></td></tr>";
                                }
                                }

                                else{
                                    echo "<font color='green'>$mstatus";

                                echo '</div></b></td>
                                </tr>';


                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b></b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\"><b>DATE</b>
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Start Date</b>
                                </div></td>";

                                echo "<td width=\"10%\"><div align=\"center\">$smdate</td></tr>
                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>End Date Date</b>
                                </div></td>
                                <td width=\"10%\"><div align=\"center\">$emdate
                                </div></td></tr>";

                                }


                                echo "</table>
                                <br><br>";


                                //}



                                //SHIPPING STATUS
                                //$query3 = "SELECT *, ClientAccount.CName AS 'Name', Product.ProductType AS 'Type', Product.ProductName AS 'PName' FROM Orders O INNER JOIN ClientAccount ON O.OCompanyID=ClientAccount.CompanyID INNER JOIN Product ON O.OProductID=Product.ProductID WHERE OrderID = ".$id;
                                //$result3=mysqli_query($dbc,$query3);
                                //while ($row3=mysqli_fetch_array($result3)){
                                    $sstatus = $row['OShipmentStatus'];
                                    $sdate = $row['OShippedDate'];

                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><font color = "white"><b>SHIPPING STATUS: </font>';

                                if ($sstatus != 'Shipped'){
                                    echo "<font color='red'>$sstatus";
                                }
                                else{
                                    echo "<font color='green'>$sstatus";
                                }

                                echo'</div></b></td>
                                </tr>';


                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b></b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\"><b>DATE</b>
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Date Shipped</b>
                                </div></td>


                                <td width=\"10%\"><div align=\"center\">";

                                if ($sstatus != 'Shipped'){
                                    echo "Not shipped";
                                }
                                else {
                                    echo $sdate;
                                }

                                echo "
                                </div></td></tr>
                                </table><br><br>";


                                }




                                // PRODUCT SPECS TABLE

                                /*$query4 = "Select p.productID, av.ValueName as 'valname', a.AttributeName as 'attname', pd.ProductName as 'prodname', pd.ProductType as 'prodtype' from product_has_attribute p join attributevalues av on p.AttributeValueID = av.ValueID join attribute a on av.AttributeTypeID = a.AttributeID join product pd on pd.ProductID = p.ProductID where p.productID =$productID order by a.AttributeName asc";



                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="2"><div align="center"><b><font color="white">PRODUCT SPECIFICATIONS</font>
                                </div></b></td>
                                </tr>';


                                $result4=mysqli_query($dbc,$query4);
                                if ($row4=mysqli_fetch_array($result4)){
                                $prodname = $row4['prodname'];
                                $prodtype = $row4['prodtype'];

                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b>Product Name</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$prodname
                                </div></td>
                                </tr>

                                <tr>
                                <td width=\"10%\"><div align=\"center\"><b>Product Type</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$prodtype
                                </div></td>
                                </tr>";
                                }

                                $result5=mysqli_query($dbc,$query4);
                                while ($row5=mysqli_fetch_array($result5)){
                                $category = $row5['attname'];
                                $value = $row5['valname'];
                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><b>$category</b>
                                </div></td>

                                <td width=\"10%\"><div align=\"center\">$value
                                </div></td>
                                </tr>";
                              } */

                                echo '<table class="table table-hover" width=75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr bgcolor="black">
                                <td colspan="4"><div align="center"><b><font color="white">PRODUCT SPECIFICATIONS</font>
                                </div></b></td>
                                <tr>
                                  <td width=\"10%\"><div align="center"><b>Product ID</b>
                                  </div></td>
                                  <td width=\"10%\"><div align="center"><b>Product Name</b>
                                  </div></td>
                                  <td width=\"10%\"><div align="center"><b>Attribute Type</b>
                                  </div></td>
                                  <td width=\"10%\"><div align="center"><b>Description</b>
                                  </div></td>
                                </tr>
                                </tr>';

                                $query = "SELECT * FROM ordersrefs WHERE OrderID = $orderID";
                                $result = mysqli_query($dbc, $query);

                                $count = 0;

                                while ($row = mysqli_fetch_array($result)){
                                    echo '<tr>';

                                    $productID = $row['ProductID'];
                                    $quantity = $row['quantity'];

                                    $query2 = "SELECT ProductName FROM product WHERE ProductID = $productID";
                                    $result2 = mysqli_query($dbc, $query2);
                                    if ($row2 = mysqli_fetch_array($result2)){
                                      $productName = $row2['ProductName'];
                                    }

                                    //if ($count==0)
                                    //{
                                      echo '<td rowspan="5" align="center">'.$productID.'</td>
                                            <td rowspan="5" align="center">'.$productName.'</td>';
                                      $count++;
                                    //}

                                    $gender = $row['gender'];
                                    $hair = $row['prefHair'];
                                    $skin = $row['prefSkin'];
                                    $eye = $row['prefEye'];
                                    $size = $row['prefSize'];

                                    $query3 = "SELECT * FROM attribute";
                                    $result3 = mysqli_query($dbc, $query3);

                                    while ($row3 = mysqli_fetch_array($result3)){
                                        echo '<td  align="center">'.$row3['AttributeName'].'</td>';

                                        $attrid = $row3['AttributeID'];

                                        $query4 = "SELECT ValueName, ValueImage FROM attributevalues WHERE (ValueName = '{$gender}' OR ValueName = '{$hair}' OR ValueName = '{$skin}' OR ValueName = '{$eye}' OR ValueName = '{$size}') AND AttributeTypeID = $attrid";
                                        $result4 = mysqli_query($dbc, $query4);

                                        if ($row4 = mysqli_fetch_array($result4)){
                                          $image = $row4['ValueImage'];
                                          echo '<td align="center">'.$row4['ValueName'].'</td></tr>';
                                        }
                                    }
                                }

                                echo "</table>
                                <br><br>";

                            }

                            else{
                                echo "No Order ID selected.";
                            }

                                ?>






<br><br>
<?php
if ($pstatus!='Paid')                        {
echo "<a href='prodManCurrentOrderIDEditable.php?id=$id";?>
    <?php echo"'><button type='submit' name= 'Edit' class='btn btn-success btn-fill pull-right'>Edit this Order</button></a>";
} ?>
<a href="prodManCurrentOrders.php"><button class="btn btn-default btn-fill pull-right">Back to Orders</button></a>


<br><br><br>

</div>
</div>
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
