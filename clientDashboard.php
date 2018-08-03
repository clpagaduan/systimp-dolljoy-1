<!doctype html>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#exampleModal").modal('show');
    });
</script>



<?php 
session_start(); 

require_once('../mysql_connect.php');
              
$flag=0;
 $message=null;


 $username = $_SESSION['username'];
 $query ='SELECT FLogin FROM clientaccount WHERE CRepUsername = "'.$username.'"';


  $result= mysqli_query($dbc, $query);
   if ($row2 = mysqli_fetch_array($result)){
                                      $first = $row2['FLogin'];
                                    }


if (isset($_POST['submitpass'])){ 
if($first == 0 ){
    
    
    
    
    
    
     $pass =$_POST["pass"];
        $cpass =  $_POST["cpass"];
    echo "$first";
    
   echo "";
    
 

 
 echo "$pass $cpass";


   
      echo "$pass $cpass";
    
    
    
       if ($_POST["pass"] == $_POST["cpass"]) {
           
           
           $query ='SELECT FLogin FROM clientaccount WHERE CRepUsername = "'.$username.'"';


  $result= mysqli_query($dbc, $query);
   if ($row2 = mysqli_fetch_array($result)){
                                
                                    

           
              $query3 = "UPDATE clientaccount SET CRepPassword = PASSWORD('$cpass'), FLogin = '1'   WHERE CRepUsername = '".$username."'; ";
            $result = mysqli_query($dbc, $query3);
           
}}
    
}
    
}
    


    








?>
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
            <form class="form-horizontal" method = "post" action = "<?php echo $_SERVER['PHP_SELF']?>">




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
                    <a class="navbar-brand" href="prodManDashboard.php">Dashboard - Client</a>
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
                    <div class="col-md-10">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category">Take note of the following notifications before dismissing them</p>
                            </div>
                            <div class="content">
                             

         <?php 

                                 

                                    $querypaid="SELECT OrderID as 'startmanu' FROM orders WHERE OrderStatus='Approved' AND ManufacturingStatus ='Pending'";
                                   $resultpaid=mysqli_query($dbc,$querypaid);
                                   $paid= $resultpaid->num_rows;
                                
                                  if ($paid == 0){
                                      echo "";
                                  }
                                  else if ($paid == 1){
                                      echo 
                                          '<div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order approved - </b>Click to track orders</font></span></a>
                                        </div>';
                                  }
                                  else if ($paid > 1){
                                      echo 
                                          '<div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Orders approved - </b>Click to track orders</font></span></a>
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

   <?php 
                if($first == 0 ){
    
    echo "$first";
    
   echo "<div class=\"modal fade\" id=\"exampleModal\"  role=\"dialog\" aria-hidden=\"false\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Password Entry</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">   <div class=\"form-group\">
                                    <label>&nbsp;&nbsp;<b>Password:  </b></label>
                                    <input class=\"form-control\" type=\"text\" required placeholder=\"Password\" name=\"pass\" size=\"20\" maxlength=\"30\" /> 
                                </div>
                                <div class=\"form-group\">
                                    <label>&nbsp;&nbsp;<b>Confirm Password:  </b></label>
                                    <input class=\"form-control\" type=\"text\" required placeholder=\"Password\" name=\"cpass\" size=\"20\" maxlength=\"30\" /> 
                                </div>
      </div>
      <div class=\"modal-footer\">
        <button  type=\"submit\" name =\"submitpass\"  class=\"btn btn-secondary\">accept</button>
      
}
            <button type=\"button\"  class=\"btn btn-primary\" data-dismiss=\"modal\">cancel</button>
      </div>
    </div>
  </div>
</div>";
    
 
}
                ?>
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
