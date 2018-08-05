<?php

require_once(__DIR__.'/../mysql_connect.php');

session_start();



$msg= "";
$msg2= "";
$message="";
$message2="";




                            


if (isset($_POST['submit'])){
        $message=NULL;

        $choice1=$_POST['choice1'];
        $specification=$_POST['specification'];
    

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


       

       



      if(!isset($message)){
    

          $query="INSERT INTO AttributeValues       (ValueName,
                                                    ValueImage,
                                                    AttributeTypeID,
                                                    AttributeValueType)

                                            VALUES ('{$choice1}',
                                                    '{$choice1pic}',
                                                    '{$specification}',
                                                    'PreMade')";
          $result=mysqli_query($dbc,$query);

  
              echo "<div class=\"alert alert-success\" align=\"center\">
  {$choice1} added!<br> 
</div>";

          /*$message2="{$choice1} added!<br>";*/



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
</style>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Specification Choices</title>

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
                <li>
                    <a href="prodManDollSpecification.php">
                        <i class="ti-paint-bucket"></i>
                        <p>Doll Specification</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="prodManSpecificationChoices.php">Specification Choices</a>
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
                        <div class="header">
                        <p> <?php echo"$msg <br"; ?></p>
                        <p> <?php echo"$msg2 <br"; ?></p>
                        <p> <?php echo"$message <br"; ?></p>
                        <p> <?php echo"$message2 <br"; ?></p>
                        </div>
                        <div class="card">
                            <div class="header">
                                <p class="category">1) Select a specification category to add more choices to<br>
                              2) Enter the new specification choice for the selected category<br>
                            3) Upload the reference picture for the new specification choice<br>
                              4) Click 'FINISH' to finish adding the new specification choice
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <?php
                                $query4="SELECT DISTINCT * 
                                         FROM            Attribute";
                                $result4=mysqli_query($dbc,$query4);


                               ?>
                                
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                           <label>&nbsp;&nbsp;<b><h5>&nbsp;&nbsp;&nbsp;SELECT SPECIFICATION</h5></b></label>
                          <select name="specification" class="form-control input" onchange="showDiv(this)">
                            <?php while ($row = mysqli_fetch_array($result4)) {
                            echo "<option value='" . $row[0] ."'>" . $row[1] ."</option>";} 
                            ?>
                        </select>
                        </div>
                        <br>
                        <div class="form-group">
                          <label>&nbsp;&nbsp;<b><h5>&nbsp;&nbsp;&nbsp;SPECIFICATION CHOICE NAME</h5></b></label>
                          <input type="text" name="choice1" class="form-control" placeholder="ex. Wavy" required>
                          <br><input type="file" name="choice1pic" accept="image/*" onchange="readURL(this);">
                          <br>
                    <img id="display" src="#" alt="Display Image"/>
                    <br><br>

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





                    <button type="submit" class="btn btn-success btn-fill pull-right" Name="submit">FINISH</button>
                    <div class="clearfix"></div>
                  </form>
                            
                                
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
