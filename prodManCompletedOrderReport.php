<!doctype html>
<?php
    require_once('../mysql_connect.php');
    session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Completed Orders</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManCompletedOrders.php">Completed Orders</a>
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
                                <h4 class="title"><b>GENERATED SALES REPORT</b></h4>
                            </div>
                               <div style='overflow:auto; max-height:70vh;' class="content table-responsive table-full-width">
                                
                                <table class="table table-hover">
                                <?php
                            
                            //User didn't input start and end date
                            if (empty($_POST['startDate']) && empty($_POST['endDate'])) {
                                echo "

                                </div>
                                </center>

                                <div class='content'>
                                    <div class='row'>
                                
                                <center><font color='red'>Incomplete input.
                                <br>You forgot to choose a start and end date.
                                <br>Please click Back to try again.</center>";
                                echo '<br><br>
                                <strong><center><b>------ END OF REPORT ------</b></center></strong>';
                            }
                            //Start date is after end date or no end date was provided   
                            if ($_POST['startDate'] > $_POST['endDate']) {
                                
                                //User didn't input end date
                                if (!empty($_POST['startDate'] && empty($_POST['endDate']))){
                                echo "

                                </div>
                                </center>

                                <div class='content'>
                                    <div class='row'>
                                    
                                    <center><font color='red'>Invalid input.
                                <br>You forgot to set an end date.
                                <br>Please click Back to try again.</center>";
                                echo '<br><br>
                                <strong><center><b>------ END OF REPORT ------</b></center></strong>';
                                }
                                
                                //Start date is after end date
                                else{
                                echo "

                                </div>
                                </center>

                                <div class='content'>
                                    <div class='row'>
                                    
                                    <center><font color='red'>Invalid input.
                                <br>Start Date cannot be after End Date.
                                <br>Please click Back to try again.</center>";
                                echo '<br><br>
                                <strong><center><b>------ END OF REPORT ------</b></center></strong>';
                                }
                            }
                                
                                //User didn't input start date
                                if (!empty($_POST['endDate'] && empty($_POST['startDate']))){
                                echo "

                                </div>
                                </center>

                                <div class='content'>
                                    <div class='row'>
                                    
                                    <center><font color='red'>Invalid input.
                                <br>You forgot to set a start date.
                                <br>Please click Back to try again.</center>";
                                echo '<br><br>
                                <strong><center><b>------ END OF REPORT ------</b></center></strong>';
                                }
                            
                            //User inputted start and end date where start date is before end date
                            if ((!empty($_POST['startDate'] && $_POST['endDate'])) && ($_POST['startDate'] < $_POST['endDate'])) {  
                                require_once('../mysql_connect.php');
                                $sD = $_POST["startDate"];
                                $eD = $_POST["endDate"];
                                $_SESSION['start']=$sD;
                                $_SESSION['end']=$eD;
                                $formats = date_format(date_create($sD), 'F d, Y');
                                $formate = date_format(date_create($eD), 'F d, Y');
                                
                                
                                $existing="SELECT COUNT(*) AS sales FROM `orders` WHERE OPaymentDate between '$sD' AND '$eD'";

                                $result1=mysqli_query($dbc,$existing);

                                while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                                    $sales="{$row['sales']}";

                                    //username already taken
                                    if ($sales == 0){
                                        echo "

                                            </div>
                                            </center>

                                            <div class='content'>
                                                <div class='row'>

                                                <center>No sales made between $formats and $formate.</center>";
                                            echo '<br><br>
                                            <strong><center><b>------ END OF REPORT ------</b></center></strong>';
                                    }
                                
                                    else{
                                        echo '

                                        <h4 class="title">for sales made between<br>';

                                        echo $formats." and ".$formate.".";
                                        echo'
                                        <br></h4>

                                        </div>
                                        </center>

                                        <div class="content">
                                            <div class="row">

                                        <table class="table table-hover" width="75%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                        <tr bgcolor="black">
                                        <td width="10%"><div align="center"><b><font color="white">Order ID</font>
                                        </div></b></td>
                                        <td width="10%"><div align="center"><b><font color="white">Quantity Ordered<br>(number of dolls ordered)</font>
                                        </div></b></td>
                                        <td width="10%"><div align="center"><b><font color="white">Total Amount<br>(in PHP)</font>
                                        </div></b></td>
                                        </tr>';


                                        $query="SELECT OrderID, FORMAT(OQuantity,0) AS qty, FORMAT(OTotalAmount,2) AS tamt FROM ORDERS WHERE OPaymentDate between '$sD' AND '$eD'";
                                        $result=mysqli_query($dbc,$query);


                                        while ($row = mysqli_fetch_array($result)) {
                                        $id = $row['OrderID'];
                                        echo "<tr>
                                        <td width=\"10%\"><div align=\"center\"><a href=\"prodManCompletedOrderReportID.php?id=$id \">{$row['OrderID']}</a>
                                        </div></td>

                                        <td width=\"10%\"><div align=\"center\">{$row['qty']}
                                        </div></td>

                                        <td width=\"10%\"><div align=\"center\">{$row['tamt']}
                                        </div></td>
                                        </tr>";

                                        }

                                        echo '</table>';

                                        $query1="SELECT FORMAT(SUM(OQuantity),0) AS qnt, FORMAT(SUM(OTotalAmount),2) AS amt From Orders where OPaymentDate between '$sD' AND '$eD'";
                                        $result1=mysqli_query($dbc,$query1);

                                        while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){

                                        echo "<table class='table table-hover width='75%'  border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#000000'>
                                        <tr>
                                        <td width=\"10%\"><div align=\"center\"><b>TOTALS</b>
                                        </div></td>

                                        <td width=\"10%\"><div align=\"center\"><b>{$row['qnt']}</b>
                                        </div></td>

                                        <td width=\"10%\"><div align=\"center\"><b>PHP {$row['amt']}</b>
                                        </div></td>

                                        </tr>
                                        </table>";
                                        }

                                    echo '<br><br>
                                    <strong><center><b>------ END OF REPORT ------</b></center></strong>
                                    <br><br>
                                    <center>
                                    <a class="noprint" href="javascript:window.print()"><input type="submit" class="btn btn-fill btn-info" value="Print"></a>
                                    </center>';
                                    }
                            }
                            }

                                ?>
                            <br>
                            <br>
                                    <a href="prodManCompletedOrders.php"><input type="submit" class="btn btn-primary btn-fill" value="Back"><br></a></center>

                        <br>
                        <br>
                                </table>
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
