<!doctype html>
<?php
    require_once('../mysql_connect.php');
    session_start();
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Order History</title>

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
                <li>
                    <a href="clientOrderTracking.php">
                        <i class="ti-flag-alt-2"></i>
                        <p>Order Tracking</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="clientOrderHistory.php">Order History</a>
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
                                <p class="category">Past doll orders for entries between dates
                                <?php 
                                echo $_POST["startDate"]." and ".$_POST["endDate"].".";
                                ?>
                                <br>

                                <?php
                                date_default_timezone_set('Asia/Manila');
                                echo "<b>As of ".date('m/d/Y h:i A', time())."</b>";
                                ?>
                                
                                </p>
                            </div>   
                                <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                <?php
                            
                            //User didn't input start and end date
                            if (empty($_POST['startDate']) && empty($_POST['endDate'])) {
                                echo "<center><font color='red'>Incomplete input.
                                <br>You forgot to choose a start and end date.
                                <br>Please click Back to try again.</center>";
                            }
                            //Start date is after end date or no end date was provided   
                            if ($_POST['startDate'] > $_POST['endDate']) {
                                
                                //User didn't input end date
                                if (!empty($_POST['startDate'] && empty($_POST['endDate']))){
                                echo "<center><font color='red'>Invalid input.
                                <br>You forgot to set an end date.
                                <br>Please click Back to try again.</center>";
                                }
                                
                                //Start date is after end date
                                else{
                                echo "<center><font color='red'>Invalid input.
                                <br>Start Date cannot be after End Date.
                                <br>Please click Back to try again.</center>";
                                }
                            }
                                
                                //User didn't input start date
                                if (!empty($_POST['endDate'] && empty($_POST['startDate']))){
                                echo "<center><font color='red'>Invalid input.
                                <br>You forgot to set a start date.
                                <br>Please click Back to try again.</center>";
                                }
                            
                            //User inputted start and end date where start date is before end date
                            if ((!empty($_POST['startDate'] && $_POST['endDate'])) && ($_POST['startDate'] < $_POST['endDate'])) {  
                                require_once('../mysql_connect.php');
                                $sD = $_POST["startDate"];
                                $eD = $_POST["endDate"];
                                $_SESSION['start']=$sD;
                                $_SESSION['end']=$eD;


                                echo '<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr>
                                <td width="10%"><div align="center"><b>Order ID
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Quantity Ordered<br>(number of dolls ordered)
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Total Amount<br>(in PHP)
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Ordered
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Shipped
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Paid
                                </div></b></td>
                                </tr>';


                                $query="SELECT OrderID, OQuantity, OTotalAmount, OOrderedDate, OShippedDate, OPaymentDate From Orders where OShippedDate between '$sD' AND '$eD' AND ManufacturingStatus ='Completed' AND OShipmentStatus = 'Shipped' AND OrderStatus = 'Completed' ";
                                $result=mysqli_query($dbc,$query);
                                
                                
                                while ($row = mysqli_fetch_array($result)) {
                                $id = $row['OrderID'];
                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><a href=\"individualSalesReport.php?id=$id \">{$row['OrderID']}</a>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">{$row['OQuantity']}
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">{$row['OTotalAmount']}
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">{$row['OOrderedDate']}
                                </div></td>";
                                
                                if ($row['OShippedDate'] == '0000-00-00'){
                                    echo "<td width=\"10%\"><div align=\"center\">Not Shipped</div></td>";
                                }
                                else if ($row['OShippedDate'] != '0000-00-00'){
                                    echo "<td width=\"10%\"><div align=\"center\">{$row['OShippedDate']}
                                    </div></td>";
                                }
                                
                                echo "<td width=\"10%\"><div align=\"center\">{$row['OPaymentDate']}
                                </div></td>
                                </tr>";

                                }
                                
                                echo '</table>';
                                
                                
                                
                                
                                echo '<br><br>
                            <strong><center>------ END OF REPORT ------</center></strong>';
                            }

                                ?>
                            <br>
                            <br>
                            <center><a href="clientOrderHistory.php"><input type="submit" class="btn btn-default btn-fill" value="BACK"></a></center>

                        <br>
                        <br>
                                    </table>
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
