<?php
session_start();

require_once('../mysql_connect.php');
require_once('PHPMailer/PHPMailerAutoload.php');
$fn=$ln=$un=$cn=$pw=$cpw=$ea=NULL;
$message=NULL;

$flag=0;

if (isset($_POST['submit'])){
    
    $empties=0;
    
    $EmpType=2;

 if (empty($_POST['EmpFName'])){
  $EmpFName=FALSE;
  $fn='<font color="red">*This is a required field!</font>';
     $empties++;
 }else
  $EmpFName=$_POST['EmpFName'];

 if (empty($_POST['EmpLName'])){
  $EmpLName=FALSE;
  $ln='<font color="red">*This is a required field!</font>';
     $empties++;
 }else
  $EmpLName=$_POST['EmpLName'];


if (empty($_POST['EmpUsername'])){
  $EmpUsername=FALSE;
  $un='<font color="red">*This is a required field!</font>';
     $empties++;
 }else{
   $EmpUsername=$_POST['EmpUsername'];
 }
  

if (empty($_POST['EmpContactNo'])){
  $EmpContactNo=FALSE;
  $cn='<font color="red">*This is a required field!</font>';
     $empties++;
 }
 else if(!preg_match('/^[0-9]*$/',$_POST['EmpContactNo'])){
  $cn='<font color="red">*Invalid employee contact number!</font>'; 
  $empties++;
 }
 else{
   $EmpContactNo=$_POST['EmpContactNo'];
 }   
    
if (empty($_POST['EmpEmailAdd'])){
  $EmpEmailAdd=FALSE;
  $ea='<font color="red">*This is a required field!</font>';
     $empties++;
 }else{
   $EmpEmailAdd=$_POST['EmpEmailAdd'];
 }   
    
    
if ($empties>0){
  $message.="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Incomplete input. Please fill out fields marked with *</center></span></div>";
}      
 else{
     
     $total=$total2=0;
    $existing="SELECT EmployeeID AS employee FROM `employeeaccount` WHERE EmployeeUsername='$EmpUsername'";

     $resultemp=mysqli_query($dbc,$existing);
     $total= $resultemp->num_rows;
     
    $existing2="SELECT CompanyID AS client FROM `clientaccount` WHERE CRepUsername='$EmpUsername'";

     $resultcli=mysqli_query($dbc,$existing2);
     $total2= $resultcli->num_rows;
     
     $total=$total+$total2;

        if ($total > 0){
            $message.= "<div class='alert alert-danger'><span aria-hidden='true'><b><center>Username already taken.</center></span></div>";

        }
        else{
                echo "<div class=\"alert alert-success\" align=\"center\">Successfully Added!</div>";
            $EmpPassword= bin2hex(openssl_random_pseudo_bytes(5));
            $query="INSERT INTO `employeeaccount` (`EmployeeID`, `employeeType`, `EmployeeFirstName`, `EmployeeLastName`, `EmployeeContactNo`, `EmployeeEmailAdd`, `EmployeeUsername`, `EmployeePassword`) VALUES (NULL, '$EmpType', '$EmpFName', '$EmpLName', '$EmpContactNo', '$EmpEmailAdd', '$EmpUsername', PASSWORD('$EmpPassword'));";
  
  
              mysqli_query($dbc,$query);
            
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth= true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->Username = 'dolljoyfactorymuseum@gmail.com';
            $mail->Password = 'DLSU1234';
            
            $mail->SetFrom($EmpEmailAdd);
            
            $mail->isHTML();
            $mail->Subject = "Welcome to Dolljoy!";
            $mail->Body = 'You have been assigned the username '.$EmpUsername.' and the password '.$EmpPassword.'. It is recommended to change your password upon login.';
            $mail->AddAddress($EmpEmailAdd);
            $mail->Send();


            $message.= "<div class='alert alert-success'><span aria-hidden='true'><b><font color='black'><center>The account of ".$EmpFName." ".$EmpLName." has been activated</center></font></span></div>";
    
            $flag=1;
  
    }
 }   
 
    
if(!isset($message) && empty($message)){
    $flag=1;
}
 

}/*End of main Submit conditional*/


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Add Employees</title>

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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            
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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManAddEmployees.php">Add Employees</a>
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
                        <div class="card">
                            <div class="header">
                      
                                
                                  <p class="category">1) 1) Enter employee details to add an employee account<br>
2) Once employee details are filled out, click 'ADD EMPLOYEE ACCOUNT' to finish adding the new employee</p>
                                
                            
                               
                             
                            </div>    
                            <div class="content table-responsive table-full-width">
                           
                                 <br>
          
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;<b>Employee first name <a style="color:red">*</a> </b></label>
                                    <input class="form-control" type="text" placeholder="Employee First Name" name="EmpFName" size="20" style="placeholder-color:black" maxlength="30" value="<?php if (isset($_POST['EmpFName']) && !$flag) echo $_POST['EmpFName']; ?>"/> <?php echo $fn;?>
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;<b>Employee last name <a style="color:red">*</a> </b></label>
                                    <input class="form-control" type="text" placeholder="Employee Last Name" name="EmpLName" size="20" maxlength="30" value="<?php if (isset($_POST['EmpLName']) && !$flag) echo $_POST['EmpLName']; ?>"/> <?php echo $ln;?>
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;<b>Contact number <a style="color:red">*</a> </b></label>
                                    <input class="form-control" type="text" placeholder="Contact Number" name="EmpContactNo" size="20" maxlength="12" value="<?php if (isset($_POST['EmpContactNo']) && !$flag) echo $_POST['EmpContactNo']; ?>"/> <?php echo $cn;?>
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;<b>E-mail address <a style="color:red">*</a> </b></label>
                                    <input class="form-control" type="email" placeholder="E-mail Address" name="EmpEmailAdd" size="20" maxlength="30" value="<?php if (isset($_POST['EmpEmailAdd']) && !$flag) echo $_POST['EmpEmailAdd']; ?>"/> <?php echo $ea;?>
                                </div>
                                
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;<b>Username <a style="color:red">*</a> </b></label>
                                    <input class="form-control" type="text" placeholder="Username" name="EmpUsername" size="20" maxlength="30" value="<?php if (isset($_POST['EmpUsername']) && !$flag) echo $_POST['EmpUsername']; ?>"/> <?php echo $un;?>
                                </div>
                                
                                <br>    
                                <!-- Change this to a button or input when using this as a form -->
                                <p class="category"> 
                               &nbsp;&nbsp;&nbsp;* These fields are required <br>
                                &nbsp;&nbsp;&nbsp;** When an employee is added, the employee will receive an email with their username and password to the system
                                </p>
                                <br>&nbsp;
                                <input class="btn btn-sm btn-success btn-fill" type="button" value="Add employee account " data-toggle="modal" data-target="#exampleModal">
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
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Confirm Account Creation?
      </div>
      <div class="modal-footer">
        <button type="submit" name ="submit"  class="btn btn-secondary">accept</button>
            <button type="button"  class="btn btn-primary" data-dismiss="modal">cancel</button>
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
