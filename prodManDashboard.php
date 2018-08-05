



<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManDashboard.php">Dashboard - Production Manager</a>
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
                    <div class="col-md-10">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category">Take note of the following notifications before dismissing them</p>
                            </div>
                            <div class="content">
                                <?php

                                    require_once('../mysql_connect.php');

                                        ////notif pending account
                                    $queryacct="SELECT CompanyID as 'acct' FROM clientaccount WHERE AccountStatus='Pending'";
                                    $resultacct=mysqli_query($dbc,$queryacct);
                                    $acct = $resultacct->num_rows;

                                        ////notif activate account
                                    $queryaccp="SELECT CompanyID as 'acct' FROM clientaccount WHERE AccountStatus='Approved'";
                                    $resultaccp=mysqli_query($dbc,$queryaccp);
                                    $accp = $resultaccp->num_rows;



                                 ////notif Vinyl
                                     $queryvinyl="SELECT Quantity  FROM suppliestotal WHERE Supply='Vinyl'";
                                    $resultvinyl=mysqli_query($dbc,$queryvinyl);

                                $vinyl=mysqli_fetch_array($resultvinyl,MYSQLI_ASSOC);



                                 ////notif Hair
                                    $queryhair="SELECT *  FROM suppliestotal WHERE Supply='Hair'";
                                    $resulthair=mysqli_query($dbc,$queryhair);
                                   $hair=mysqli_fetch_array($resulthair,MYSQLI_ASSOC);




                                        ////notif pending order
                                    $queryorder="SELECT OrderID as 'orderid' FROM orders WHERE OrderStatus='Pending'";
                                    $resultorder=mysqli_query($dbc,$queryorder);
                                    $order = $resultorder->num_rows;

                                        //notif order ready for payment
                                    $querypay="SELECT OrderID as 'pay' FROM orders WHERE OrderStatus='Approved' AND OPaymentStatus='Unpaid'";
                                    $resultpay=mysqli_query($dbc,$querypay);
                                    $pay= $resultpay->num_rows;

                                        //notif order ready for shipping
                                    $queryship="SELECT OrderID as 'ship' FROM orders WHERE ManufacturingStatus = 'Completed' && OShipmentStatus='Not shipped'";
                                    $resultship=mysqli_query($dbc,$queryship);
                                    $ship= $resultship->num_rows;

                                        //notif supplies
                                    $queryrcv="SELECT SupplyID as 'supplies' FROM supplies WHERE DateReceived IS NULL";
                                    $resultrcv=mysqli_query($dbc,$queryrcv);
                                    $rcv= $resultrcv->num_rows;

                                    $total = $acct + $order + $ship + $rcv+$accp+$pay;
                                    if (($acct + $order + $ship + $rcv+$accp+$pay) > 0){




                                  //APPROVE OR REJECT CLIENT ACCOUNTS
                                  if ($acct == 0){
                                      echo "";
                                  }
                                  else if ($acct == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManAccountRequests.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Newly Registered Client Accounts - </b> There is a client account pending for approval</font></span></a>
                                        </div>';}
                                  else if ($acct > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManAccountRequests.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There are '.$acct.' client accounts pending for approval</font></span></a>
                                        </div>';
                                  }


                                  //ACTIVATE CLIENT ACCOUNTS
                                  if ($accp == 0){
                                      echo "";
                                  }
                                  else if ($accp == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManAccountActivations.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There is a client account pending for activation</font></span></a>
                                        </div>';
                                  }
                                  else if ($accp > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManAccountActivations.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There are '.$accp.' client accounts pending for activation</font></span></a>
                                        </div>';
                                  }


                                  //APPROVE OR REJECT ORDERS
                                  if ($order == 0){
                                      echo "";
                                  }
                                  else if ($order == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManReviewOrders.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Order Approval - </b> There is an order pending for approval</font></span></a>
                                        </div>';
                                  }
                                  else if ($order > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManReviewOrders.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Order Approval - </b> There are '.$order.' orders pending for approval</font></span></a>
                                        </div>';
                                  }

                                  //CONFIRM SHIPPING
                                  if ($ship == 0){
                                      echo "";
                                  }
                                  else if ($ship == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManPaymentShipment.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Shipment - </b> There is an order ready to be shipped</font></span></a>
                                        </div>';
                                  }
                                  else if ($ship > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManPaymentShipment.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Shipment - </b> There are '.$ship.' orders ready to be shipped</font></span></a>
                                        </div>';
                                  }

                                  //PENDING PAYMENT
                                  if ($pay == 0){
                                      echo "";
                                  }
                                  else if ($pay == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManPaymentShipment.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Payment - </b> There is an order pending payment</font></span></a>
                                        </div>';
                                  }
                                  else if ($pay > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManPaymentShipment.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Payment - </b> There are '.$pay.' orders pending payment</font></span></a>
                                        </div>';
                                  }

                                  //RECEIVE INVENTORY
                                  if ($rcv == 0){
                                      echo "";
                                  }
                                  else if ($rcv == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManInventoryManagement.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> There is a supply waiting to be received</font></span></a>
                                        </div>';
                                  }
                                  else if ($rcv > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManInventoryManagement.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> There are '.$rcv.' supplies waiting to be received</font></span></a>
                                        </div>';
                                  }
                              }
                              else{
                                echo '
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                    <span aria-hidden="true"><b><font color="black">No pending notifications</font></span>
                                </div>';
                                  }
                                 $hper = $hair['Quantity']/100*100;
                                if ($hair['Quantity'] < 5000){

                                     echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManInventoryManagement.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b>  Hair storage at '.$hper.'%</font></span></a>
                                        </div>';
                                }

                                 $vper = $vinyl['Quantity']/1000*100;

                                if ($vinyl['Quantity'] < 5000){

                                     echo '
                                        <div class="alert alert-warning">
                                            <a href="prodManInventoryManagement.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> Vinyl storage at '.$vper.'% </font></span></a>
                                        </div>';
                                }

                                  ?>
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

                        <div class="row">
                             <div class="col-sm-5">
                            <p class="category">   Select a button to do a specific task</p>



            <button type = "submit" name = "viewStocks" class = "btn btn-info">View Stocks</button>

            <button type = "submit" name = "viewInventory" class = "btn btn-info">Order List</button>
                            </div> <div class="col-sm-7">
                               <table class="table table-hover">
                               <tr>
                                   <th align="center"><div align="center" padding >Totals</div></th>
                                    <th align="center"><div align="center" padding >Quantity</div></th></tr>
                               <?php



                               $query2=

                                       "UPDATE `appdev`.`suppliestotal`,supplies SET session =1,`Quantity`= (select sum(supplyquantity) from supplies join suppliers as s on s.SupplierID= supplies.SupplierID where s.SupplyType=\"Hair\" and supplies.datereceived is not null ) WHERE `TotalID`='2' and session =0;";
                                       $result2=mysqli_query($dbc,$query2);
                                     $query3=

                                       "UPDATE `appdev`.`suppliestotal`,supplies SET session =1,`Quantity`= (select sum(supplyquantity) from supplies join suppliers as s on s.SupplierID= supplies.SupplierID where s.SupplyType=\"Vinyl\" and supplies.datereceived is not null ) WHERE `TotalID`='1' and session =0;";
                                       $result3=mysqli_query($dbc,$query3);










                                 $query="SELECT * FROM suppliestotal ";
                            $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){



                                echo"
                               <tr><td align =\"center\">{$row['Supply']}</td><td align =\"center\">{$row['Quantity']}</td>
                                ";}


                                    ?>
                                </table>
                                </div>
                                </div>
                                <br>










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
