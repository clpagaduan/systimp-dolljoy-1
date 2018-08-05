<?php
require_once('../mysql_connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');
session_start();

$editor=$_SESSION['username'];

$message=NULL;
$nada=$user=NULL;

//button is pressed
if (isset($_POST['activate'])){

    
    //no empty fields
    if (!empty($_POST['user'])){
        $CRepUsername=$_POST['user'];


     
             $total=$total2=0;
            $existing="SELECT EmployeeID AS employee FROM `employeeaccount` WHERE EmployeeUsername='$CRepUsername'";

             $resultemp=mysqli_query($dbc,$existing);
             $total= $resultemp->num_rows;

            $existing2="SELECT CompanyID AS client FROM `clientaccount` WHERE CRepUsername='$CRepUsername'";

             $resultcli=mysqli_query($dbc,$existing2);
             $total2= $resultcli->num_rows;

             $total=$total+$total2;

                if ($total > 0){
                    $message.= "<div class='alert alert-danger'><span aria-hidden='true'><b><center>Username already taken.</center></span></div>";


                }
                //ALL IS WELL FOR REALS
                else{
    echo "<div class=\"alert alert-success\" align=\"center\">
  Successfully Activated!    
</div>";


                    $CName=$_POST['CName'];
                    $CompanyID=$_POST['CompanyID'];
//                    $CRepUsername= bin2hex(openssl_random_pseudo_bytes(5));
                    
                    $CRepPassword= bin2hex(openssl_random_pseudo_bytes(5));
                    $query="UPDATE `appdev`.`clientaccount`
                            SET `CRepUsername`=('".$CRepUsername."'), `CRepPassword`=PASSWORD('".$CRepPassword."'),
                            `AccountStatus`='Activated' WHERE `CompanyID`='".$CompanyID."';";
    
                    

//                    $query="UPDATE `appdev`.`clientaccount`
//                            SET `CRepPassword`=PASSWORD('".$CRepPassword."'), `AccountStatus`='Activated' WHERE `CompanyID`='".$CompanyID."';";
//                    $query="UPDATE `appdev`.`clientaccount` 
//                            SET `CRepUsername`='".$CRepUsername."', `CRepPassword`=PASSWORD('".$CRepPassword."'), `AccountStatus`='Activated' WHERE `CompanyID`='".$CompanyID."';";
//                    $query="UPDATE `appdev`.`clientaccount`
//                            SET `CRepPassword`=PASSWORD('".$CRepPassword."'), `AccountStatus`='Activated' WHERE `CompanyID`='".$CompanyID."';";
                    mysqli_query($dbc,$query);

                    $query2="SELECT * FROM clientaccount WHERE CompanyID=$CompanyID";
                    $result2=mysqli_query($dbc, $query2);

                    while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                        $email = $row['CRepEmailAdd'];
                        $fname = $row['CRepFirstName'];
                        $lname = $row['CRepLastName'];
                    }
                    
                    echo $email . $fname . $lname;
                	$mail = new PHPMailer();
                        
                	$mail->isSMTP();
                	$mail->SMTPAuth= true;
                	$mail->SMTPSecure = 'ssl';
                	$mail->Host = 'smtp.gmail.com';
                	$mail->Port = '465';
                	$mail->Username = 'dolljoyfactorymuseum@gmail.com';
                	$mail->Password = 'DLSU1234';
                    
                	$mail->SetFrom($email);
                    
                    $mail->isHTML();
                	$mail->Subject = "Welcome to Dolljoy";
                	$mail->Body = 'You have been assigned the username '.$CRepUsername.' and the password '.$CRepPassword.'. It is recommended to change your password upon login.';
                	$mail->AddAddress($email);
                    
                	$mail->Send();
                

                    $message="<div class='alert alert-success'><span aria-hidden='true'><b><center>Account has been successfully activated!</center></span></div>";

                    //echo($CRepPassword);

                    
                    echo($CRepPassword);
                    

                    //echo($CRepPassword);

                    $queryaudit="INSERT INTO `accountaudittrail`(`AATCompanyID`, `TimeStamp`, `Description`, `Editor`) VALUES ($CompanyID, CURRENT_TIMESTAMP, 'Activated account of $CRepUsername','$editor')";


                    $result=mysqli_query($dbc,$queryaudit);

                    
                
            }
        

    }
    else{
            $user="<font color='red'>*</font>";

        $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please fill out fields marked with *</center></span></div>";
    }


}
	



?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Account Activations</title>

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
    <form action="prodManAccountActivations.php" method="post">
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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManAccountActivations.php">Account Activations</a>
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
                                <p class="category"><b>Assign a username to each company representative to activate their company's account</b></p>
                            </div>
                            <br><br>

                                 <div style='overflow:auto; max-height:70vh;' class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category"><b>COMPANY</b></p></th>
                                        <th><p class="category"><b>REPRESENTATIVE</b></p></th>
                                        <th><p class="category"><b>DESIGNATED USERNAME</b></p></th>
                                    </thead>

<?php
$query="SELECT * FROM appdev.clientaccount
		WHERE AccountStatus <> 'Pending' AND AccountStatus <> 'Rejected' AND CRepPassword IS NULL AND CRepUsername IS NULL";
$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);
    if($numRows ==0){
        $nada="No accounts to show";
    }

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

	$id=$row['CompanyID'];
	$CName=$row['CName'];

	echo
	'
	<tr>
	<td><b>' . $CName. '</b></td>
	<td><b>' .$row['CRepFirstName'].' '.$row['CRepLastName']. '</b></td>



	
	<td align ="left"><input type="text" name="user" size="20" maxlength="30" value=""/></td>

	<input type = "hidden" name = "CName" value= "'.$CName.'">
	<input type = "hidden" name = "CompanyID" value= "'.$id.'">

	<td align = "left"><input type="button" class="btn btn-success btn-fill" value="ACTIVATE" data-toggle="modal" data-target="#exampleModal" /></td>
	'
	;
	echo '</tr>';
}

	echo '</table>';

  ?>
</table>

    <center>
    <label>
        <?php echo $nada;?>

    </label>
    </center>

    <br><br>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Account of has been activated.
      </div>
      <div class="modal-footer">
        <button type="submit" name="activate" class="btn btn-secondary">Close</button>
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
