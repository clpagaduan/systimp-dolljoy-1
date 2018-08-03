<?php

require_once(__DIR__.'/../mysql_connect.php');

session_start();



$msg= "";
$msg2= "";
$message="";
$message2="";
$specificationName = $_SESSION["specificationName"];

                            $query = "SELECT  *
                                      FROM    Attribute
                                      WHERE   AttributeName = '$specificationName'";
                            $result=mysqli_query($dbc,$query);


                            while ($row = mysqli_fetch_array($result)) { 
                              $specificationID=$row[0];


                            }


                            


if (isset($_POST['submit'])){
        $message=NULL;

        $choice1=$_POST['choice1'];
        $choice2=$_POST['choice2'];
    

       //choice1
       if(!isset($_FILES['choice1pic']) || $_FILES['choice1pic']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="error choice 1 upload";
        }
        else{
          $target1 ="images/".basename($_FILES['choice1pic']['name']);
          $choice1pic = addslashes(file_get_contents($_FILES['choice1pic']['tmp_name']));

           if (move_uploaded_file($_FILES['choice1pic']['tmp_name'], $target1)) {
                  $msg = "Image uploaded successfully<br>";
           }
           else{
                  $msg = "Failed to upload image<br>";
           }
        }

        //choice 2
        if(!isset($_FILES['choice2pic']) || $_FILES['choice2pic']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="error choice 2 upload";
        }
        else{
          $target2 ="images/".basename($_FILES['choice2pic']['name']);
          $choice2pic = addslashes(file_get_contents($_FILES['choice2pic']['tmp_name']));

           if (move_uploaded_file($_FILES['choice2pic']['tmp_name'], $target2)) {
                  $msg2 = "Image uploaded successfully<br>";
           }
           else{
                  $msg2 = "Failed to upload image<br>";
           }
        }

       

       



      if(!isset($message)){
    

          $query="INSERT INTO AttributeValues       (ValueName,
                                                    ValueImage,
                                                    AttributeTypeID,
                                                    AttributeValueType)

                                            VALUES ('{$choice1}',
                                                    '{$choice1pic}',
                                                    '{$specificationID}',
                                                    'PreMade')";
          $result=mysqli_query($dbc,$query);

          $query2="INSERT INTO AttributeValues       (ValueName,
                                                    ValueImage,
                                                    AttributeTypeID,
                                                    AttributeValueType)

                                            VALUES ('{$choice2}',
                                                    '{$choice2pic}',
                                                    '{$specificationID}',
                                                    'PreMade')";
          $result2=mysqli_query($dbc,$query2);

          $message="{$choice1} added!<br>";

          $message2="{$choice2} added!<br>";

          //$message2="{$choice1} added!<br>";




  }
  else{

  }

         


}; //end error







?>

<!doctype html>
<html lang="en">
<style>
#display {
  display:none;

}
#display2 {
  display:none;

}
</style>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add <?php echo $specificationName; ?> Choices</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManDollSpecification.php">Doll Specification</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add<b> <?php echo $_SESSION["specificationName"]; ?> </b>Choices</h4>
                                <p> <?php echo"$msg <br"; ?></p>
                                <p> <?php echo"$msg2 <br"; ?></p>
                                <p> <?php echo"$message <br"; ?></p>
                                <p> <?php echo"$message2 <br"; ?></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                        <label>&nbsp;&nbsp;<h5>&nbsp;&nbsp;1) Specification Choice Name</h5></label>
                          <input class="form-control" type="text" name="choice1" placeholder="Enter specification choice name" required>
                          <br><input type="file" name="choice1pic" accept="image/*" onchange="readURL(this);">
                          <br>
                    <img id="display" src="#" alt="Display Image"/>
                          
                    <br><br>
                    
                        <div class="form-group">
                        <label>&nbsp;&nbsp;<h5>&nbsp;&nbsp;2) Specification Choice Name</h5></label>
                          <input type="text" name="choice2" class="form-control" placeholder="Enter specification choice name" required>
                          <br><input type="file" name="choice2pic" accept="image/*" onchange="readURL2(this);">
                          <br>
                    <img id="display2" src="#" alt="Display Image"/>

                    <script type="text/javascript">
                      function readURL(input) {
                          var $prev = $('#display'); // cached for efficiency

                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $prev.attr('src', e.target.result)
                                  $prev.width(150)
                                  $prev.height(150);
                                  
                              }

                              reader.readAsDataURL(input.files[0]);

                              $prev.show(); // this will show only when the input has a file
                          } else {
                              $prev.hide(); // this hides it when the input is cleared
                          }
                      }

                    </script>

                        </div>
                      </div>
                    </div>
        
                            
                            
                    <script type="text/javascript">
                      function readURL2(input) {
                          var $prev = $('#display2'); // cached for efficiency

                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $prev.attr('src', e.target.result)
                                  $prev.width(150)
                                  $prev.height(150);
                                  
                              }

                              reader.readAsDataURL(input.files[0]);

                              $prev.show(); // this will show only when the input has a file
                          } else {
                              $prev.hide(); // this hides it when the input is cleared
                          }
                      }

                    </script>
                            <button type="submit" class="btn btn-success btn-fill pull-right" Name="submit">FINISH</button>
                    <div class="clearfix"></div>
                  </form>                                
                <br>&nbsp;
                      </div>
                </div>



                    
                                <br><br>
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
