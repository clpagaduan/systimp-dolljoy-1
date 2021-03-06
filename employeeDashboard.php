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
                    <a href="employeeManufacturingStatuses.php">
                        <i class="ti-paint-roller"></i>
                        <p>Manufacturing Status</p>
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
                    <a class="navbar-brand" href="prodManDashboard.php">Dashboard - Employee</a>
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

                                    $querynew="SELECT OrderID as 'startmanu' FROM orders WHERE OrderStatus='Approved' AND ManufacturingStatus ='Pending' AND OPaymentStatus = 'Paid'";
                                   $resultnew=mysqli_query($dbc,$querynew);
                                   $new = $resultnew->num_rows;

                                  if ($new == 0){
                                      echo "";
                                  }
                                  else if ($new == 1){
                                      echo
                                          '<div class="alert alert-info">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="employeeManufacturingStatuses.php"><span aria-hidden="true"><b><font color="black">Order in queue - </b>Click to start manufacturing</font></span></a>
                                        </div>';
                                  }
                                
                                
                                   $sql2="select sum(Oquantity) as O,Quantity,Supply from Orders, suppliestotal where orderstatus = 'Approved' and Supply ='Vinyl'";
    $result2=mysqli_query($dbc, $sql2);
    
     $sql3="select sum(Oquantity) as O,Quantity,Supply from Orders, suppliestotal where orderstatus = 'Approved'and ManufacturingStatus='In Progress' and Supply ='Hair'";
                                
                                
                                
                                
                                
    $result3=mysqli_query($dbc, $sql3);
    
    
    while ($row = mysqli_fetch_array($result2)  ){
        $Vtotal =$row['Quantity'];
             $remove =$row['O'];
          
        
    }
    
        
    while ($row2 = mysqli_fetch_array($result3)  ){
         $htotal =$row2['Quantity'];
              $hremove =$row2['O'];
     
        
    }
    
    

if($Vtotal<$remove || $htotal< $hremove){
    
    echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> Manufacturing of orders cannot start due to lack of supplies</font></span>
                                        </div>';
}
                                  else if ($new > 1){
                                      echo
                                          '<div class="alert alert-info">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="employeeManufacturingStatuses.php"><span aria-hidden="true"><b><font color="black">'.$new.' orders in queue - </b>Click to start manufacturing</font></span></a>
                                        </div>';
                                  }

																	$querycurr="SELECT OrderID as 'startmanu' FROM orders WHERE OrderStatus='Approved' AND ManufacturingStatus ='In Progress' AND OPaymentStatus = 'Paid'";
																 $resultcurr=mysqli_query($dbc,$querycurr);
																 $curr = $resultcurr->num_rows;

																if ($curr == 0){
																		echo "";
																}
																else if ($curr == 1){
																		echo
																				'<div class="alert alert-info">
																					<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
																					<a href="employeeManufacturingStatuses.php"><span aria-hidden="true"><b><font color="black">Order in queue - </b>Click to update manufacturing status</font></span></a>
																			</div>';
																}
																else if ($curr > 1){
																		echo
																				'<div class="alert alert-info">
																					<button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
																					<a href="employeeManufacturingStatuses.php"><span aria-hidden="true"><b><font color="black">'.$curr.' orders in queue - </b>Click to update manufacturing status</font></span></a>
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
