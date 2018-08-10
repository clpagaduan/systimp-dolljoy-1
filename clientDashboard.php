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

 $first = 0;
 $changed = 0;

 $query ="SELECT ca.audit_id FROM clientaccount_audit ca JOIN clientaccount c ON ca.clientaccount_id = c.CompanyID WHERE c.CRepUsername = '$username' AND ca.audit_transaction = '1st Login'";

  $result= mysqli_query($dbc, $query);
   if ($row2 = mysqli_fetch_array($result)){
        $first = $row2['audit_id'];
      }

  $q ="SELECT ca.audit_id FROM clientaccount_audit ca JOIN clientaccount c ON ca.clientaccount_id = c.CompanyID WHERE c.CRepUsername = '$username' AND ca.audit_transaction = 'PW Change'";
  $result= mysqli_query($dbc, $q);
   if ($row3 = mysqli_fetch_array($result)){
        $changed = $row3['audit_id'];
      }

if (isset($_POST['submitpass'])){
  if($changed == 0 ){
     $pass =$_POST["pass"];

     $cpass =  $_POST["cpass"];

     if ($_POST["pass"] == $_POST["cpass"]) {
       //$query ='SELECT FLogin FROM clientaccount WHERE CRepUsername = "'.$username.'"';

       //$result= mysqli_query($dbc, $query);

       //if ($row2 = mysqli_fetch_array($result)){
          $query2 = "UPDATE clientaccount SET CRepPassword = PASSWORD('$cpass') WHERE CRepUsername = '".$username."'; ";
          $r = mysqli_query($dbc, $query2);

          $query3 = "INSERT INTO clientaccount_audit (clientaccount_id, audit_last_userid, audit_transaction, audit_timelog) VALUES ((SELECT CompanyID FROM clientaccount WHERE CRepUsername = '$username'), 'System', 'PW Change', NOW());";
          $result = mysqli_query($dbc, $query3);
       //}
    }
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
                                    $querypaid="SELECT o.OrderID FROM orders o JOIN clientaccount c ON o.OCompanyID = c.CompanyID WHERE o.OrderStatus='Approved' AND o.ManufacturingStatus ='Pending' AND o.OPaymentStatus='Paid' AND c.CRepUsername ='$username';";
                                   $resultpaid=mysqli_query($dbc,$querypaid);
                                   $paid= $resultpaid->num_rows;

                                  if ($paid == 0){
                                      echo "";
                                  }
                                  else if ($paid == 1){
                                      echo
                                          '<div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order payment received - </b>Check back for when manufacturing begins</font></span></a>
                                        </div>';
                                  }
                                  else if ($paid > 1){
                                      echo
                                          '<div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">'.$paid.' orders payments received - </b>Check back for when manufacturing begins</font></span></a>
                                        </div>';
                                  }

                                  $queryunpaid="SELECT o.OrderID FROM orders o JOIN clientaccount c ON o.OCompanyID = c.CompanyID WHERE o.OrderStatus='Approved' AND o.ManufacturingStatus ='Pending' AND o.OPaymentStatus='Unpaid' AND c.CRepUsername ='$username';";
                                 $resultunpaid=mysqli_query($dbc,$queryunpaid);
                                 $unpaid= $resultunpaid->num_rows;

                                if ($unpaid == 0){
                                    echo "";
                                }
                                else if ($unpaid == 1){
                                    echo
                                        '<div class="alert alert-success">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                          <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order approved - </b>Please settle amount immediately</font></span></a>
                                      </div>';
                                }
                                else if ($unpaid > 1){
                                    echo
                                        '<div class="alert alert-success">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                          <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">'.$unpaid.' orders approved - </b>Please settle amount immediately</font></span></a>
                                      </div>';
                                }

                                $querypend="SELECT o.OrderID FROM orders o JOIN clientaccount c ON o.OCompanyID = c.CompanyID WHERE o.OrderStatus='Pending' AND c.CRepUsername ='$username';";
                               $resultpend=mysqli_query($dbc,$querypend);
                               $pend= $resultpend->num_rows;

                              if ($pend == 0){
                                  echo "";
                              }
                              else if ($pend == 1){
                                  echo
                                      '<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                        <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order pending - </b>Check back for when order is approved</font></span></a>
                                    </div>';
                              }
                              else if ($paid > 1){
                                  echo
                                      '<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                        <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">'.$pend.' orders pending - </b>Check back for when orders are approved</font></span></a>
                                    </div>';
                              }

                                $queryprog="SELECT o.OrderID FROM orders o JOIN clientaccount c ON o.OCompanyID = c.CompanyID WHERE o.OrderStatus='Approved' AND o.ManufacturingStatus ='In Progress' AND o.OPaymentStatus='Paid' AND c.CRepUsername ='$username';";
                               $resultprog=mysqli_query($dbc,$queryprog);
                               $prog= $resultprog->num_rows;

                              if ($prog == 0){
                                  echo "";
                              }
                              else if ($prog == 1){
                                  echo
                                      '<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                        <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order in manufacturing - </b>Check back for status updates</font></span></a>
                                    </div>';
                              }
                              else if ($prog > 1){
                                  echo
                                      '<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                        <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">'.$prog.' orders in manufacturing - </b>Check back for status updates</font></span></a>
                                    </div>';
                              }

                              $queryship="SELECT o.OrderID FROM orders o JOIN clientaccount c ON o.OCompanyID = c.CompanyID WHERE o.OrderStatus='Approved' AND o.ManufacturingStatus ='Completed' AND o.OPaymentStatus='Paid' AND OShipmentStatus='Shipped' AND ORequiredDate > NOW() AND c.CRepUsername ='$username';";
                             $resultship=mysqli_query($dbc,$queryship);
                             $ship= $resultship->num_rows;

                            if ($ship == 0){
                                echo "";
                            }
                            else if ($ship == 1){
                                echo
                                    '<div class="alert alert-success">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                      <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">Order shipped - </b>Thank you for choosing Dolljoy!</font></span></a>
                                  </div>';
                            }
                            else if ($ship > 1){
                                echo
                                    '<div class="alert alert-success">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                      <a href="clientOrderTracking.php"><span aria-hidden="true"><b><font color="black">'.$ship.' orders shipped - </b>Thank you for choosing Dolljoy!</font></span></a>
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
                                            <a href="prodManInventoryManagement.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Pending - </b> Manufacturing of your order cannot start due to lack of supplies</font></span></a>
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
  if($changed == 0 && $first == 0){


   echo "<div class=\"modal fade\" id=\"exampleModal\"  role=\"dialog\" aria-hidden=\"false\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Change Password</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">   <div class=\"form-group\">
        <p style='margin: 10px;'>Since it's your first login, please set a new password that you would easily remember. This is the only time you may change it.</p>
                                    <label>&nbsp;&nbsp;<b>Password:  </b></label>
                                    <input class=\"form-control\" type=\"password\" required placeholder=\"Password\" name=\"pass\" size=\"20\" maxlength=\"30\" />
                                </div>
                                <div class=\"form-group\">
                                    <label>&nbsp;&nbsp;<b>Confirm Password:  </b></label>
                                    <input class=\"form-control\" type=\"password\" required placeholder=\"Password\" name=\"cpass\" size=\"20\" maxlength=\"30\" />
                                </div>
      </div>
      <div class=\"modal-footer\">
        <button  type=\"submit\" name =\"submitpass\"  class=\"btn btn-secondary\">accept</button>


            <button type=\"button\"  class=\"btn btn-primary\" data-dismiss=\"modal\">cancel</button>
      </div>
    </div>
  </div>
</div>";


}
if ($first == 0){
  $queryn ="INSERT INTO clientaccount_audit (clientaccount_id, audit_last_userid, audit_transaction, audit_timelog) VALUES ((SELECT CompanyID FROM clientaccount WHERE CRepUsername = '$username'), 'System', '1st Login', NOW());";
  $result= mysqli_query($dbc, $queryn);
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
