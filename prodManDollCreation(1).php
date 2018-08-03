<?php

require_once(__DIR__.'/../mysql_connect.php');

session_start();



$msg="";
$message="";
$count="";

if (isset($_POST['submit'])){
        $message=NULL;





        
          $productType="PreMade";
          $dollName=$_POST['dollName'];
          //$dollImage=$_POST['dollImage'];
          $dollDescription=$_POST['dollDescription'];
          $dollGender=$_POST['dollGender'];
          $dollSize=$_POST['dollSize'];
           

           //choice1
       if(!isset($_FILES['dollImage']) || $_FILES['dollImage']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="Please upload a display image for the doll.";
        }
        else{
          $target1 ="images/".basename($_FILES['dollImage']['name']);
          $dollImage = addslashes(file_get_contents($_FILES['dollImage']['tmp_name']));

           if (move_uploaded_file($_FILES['dollImage']['tmp_name'], $target1)) {
                  $msg = "Image uploaded successfully<br>";
           }
           else{
                  $msg = "Failed to upload image<br>";
           }

         }



      if(!isset($message)){
    

          $query="INSERT INTO Product       (ProductType,
                                             ProductName,
                                             ProductImage,
                                             ProductDescription,
                                             ProductGender,
                                             ProductSize)

                              VALUES        ('{$productType}',
                                             '{$dollName}',
                                             '{$dollImage}',
                                             '{$dollDescription}',
                                             '{$dollGender}',
                                             '{$dollSize}')";


          $result=mysqli_query($dbc,$query);


          $lastValueQuery = "SELECT *
                             FROM   Product
                             ORDER BY ProductID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);

          while($row = mysqli_fetch_array($lastValueResult)){
              $productID =$row[0];
          }

          $message="<h3 style='color:green'><b>{$dollName} added!</b></h3><br>";



          $queryCount = "SELECT *
                         FROM   Attribute";

          $result3=mysqli_query($dbc,$queryCount);

          while ($row5 = mysqli_fetch_array($result3)) { 

            $attribute=$_POST[$row5[1]];


              $SpecsQuery="INSERT INTO Product_has_Attribute       (ProductID,
                                                               AttributeValueID)

                              VALUES                          ('{$productID}',
                                                               '{$attribute}')";

          $result27=mysqli_query($dbc,$SpecsQuery);


          }



          //moving uploaded image to /images
          if (move_uploaded_file($_FILES['dollImage']['tmp_name'], $target1)) {
              $msg = "Image uploaded successfully<br>";
            }else{
              $msg = "Failed to upload image<br>";
            }

  }
  else{
  }

}; //end error

?>

<!----------------------------------------------------------------------------------------------------------------------------------------------------QUERIES-->
<!doctype html>
<style>
#display {
  display:none;
}
</style>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Doll Creation</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManDollCreation.php">Doll Creation</a>
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
                            <div class="header">
                                <p class="category"><b>Create a new doll to add to product catalog by filling out the following details</b></p>
                                <p> <?php echo "$message <br>"; ?></p>
                            </div>
                            <br><br>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>&nbsp;&nbsp;<b>Doll Name</b></label>
                          <input type="text" name="dollName" class="form-control" placeholder="Doll Name" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label><b>Gender</b></label>
                          <select name="dollGender" class="form-control input" onchange="showDiv(this)">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label><b>Size</b></label>
                          <select name="dollSize" class="form-control input" onchange="showDiv(this)">
                        <option value="Small (6 inches)">Small (6 inches)</option>
                        <option value="Medium (10 inches)">Medium (10 inches)</option>
                        <option value="Large (12 inches)">Large (12 inches)</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    Upload Display Image of Doll:<br><input type="file" name="dollImage" accept="image/*" onchange="readURL(this);"/>
                    <br>
                    <img id="display" src="#" alt="Display Image"/>

                    <script type="text/javascript">
                      function readURL(input) {
                          var $prev = $('#display'); // cached for efficiency

                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $prev.attr('src', e.target.result);
                              }

                              reader.readAsDataURL(input.files[0]);

                              $prev.show(); // this will show only when the input has a file
                          } else {
                              $prev.hide(); // this hides it when the input is cleared
                          }
                      }

                    </script>

                    

<?php 

                            $query = "SELECT  *
                                      FROM    Attribute";
                            $result=mysqli_query($dbc,$query);


                            //Loop for attribute name
                            while ($row = mysqli_fetch_array($result)) { 

?>

                    <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                          <!--Prints attribute name ex: Hairstyle,Haircolor-->
                          <label>&nbsp;&nbsp;<b><?php echo $row["AttributeName"]; ?></b></label>

                          <?php
                            $attributeID = $row["AttributeID"];
                           ?>

                          <head>
                            <style>
                              table {width: 100%;}
                              th,
                              td {padding: 5px;text-align: left;}
                              table#t01 tr:nth-child(even) {background-color: #FFFCF5;}
                              table#t01 tr:nth-child(odd) {background-color: #FFFCF5;}
                              table#t01 th {background-color: white;color: black;}
                            </style>
                          </head>
                          <body>

                            <?php 
                            //loop for attribute values ex. Wavy,Straight,Curly hair, Green Hair,Black hair
                            //radio buttons
                            $query2 = "SELECT  *
                                      FROM    AttributeValues
                                      WHERE   AttributeTypeID = '$attributeID' AND AttributeValueType = 'PreMade'";
                            $result2 = mysqli_query($dbc,$query2);
                            ?>

                            <table id="t01">
                              <tr>




                            <?php 
                            //loop for attribute values ex. Wavy,Straight,Curly hair, Green Hair,Black hair
                              while ($row2 = mysqli_fetch_array($result2)) { 
                                //echo $row2["ValueName"];

                            ?>
                            <td>
                              <center>
                                <!--row2["value image"] shows the image-->
                                <!--row2["value  valueName"] value of the selected radio button-->
                                <img src=<?php  echo '"data:image/jpeg;base64,'.base64_encode( $row2['ValueImage'] ).'" '; ?>><br><input type="radio" name="<?php echo $row["AttributeName"]; ?>" value="<?php echo $row2["ValueID"]; ?>" >
                              </center>
                            </td>
<?php
                            }
?>
                              </tr>
                            </table>
                             </font>
                          </body>
                          </div>
                      </div>
                    </div>
<?php

                  }
?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>&nbsp;&nbsp;<b>Doll Description</b></label>
                          <textarea type="text" name="dollDescription" class="form-control" placeholder="Description" required></textarea> 
                        </div>
                          
                        <button type="submit" class="btn btn-info btn-fill pull-right" Name="submit">CREATE DOLL</button>

                      </div>
                    </div>
                      </div>
                    </div>

                    <hr>
                  </form>
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
