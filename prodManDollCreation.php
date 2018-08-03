<?php

require_once('../mysql_connect.php');

session_start();

$queryHair = "SELECT * FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID =
             attributevalues.AttributeTypeID WHERE AttributeID=1;";

$resultHair = mysqli_query($dbc, $queryHair);

//while ($row=mysqli_fetch_array($resultHair)){
//    $hair=$row['ValueName'];
//    echo $hair;
//}

$flag=0;
$cn=$ca=$cnum=$cea=$cfn=$cln=$crnum=$cra=$un=$pw=$crea=NULL;
$empties=$invalid=0;

$msg="";
$message="";
$count="";

if(isset($_POST['add'])){
//    $_newID = $_POST['newID'];
//    $_newName = $_POST['new_name'];
//    echo $_newID . $_newName;
    
    if (empty($_POST['new_name'])){
            $new_name=FALSE;
            $cn="<font color='red'>*</font>";
            $empties++;
            $message .= "Empty name \n";
        } else {
            $new_name=$_POST['new_name'];
            echo $new_name;
        }
    
    if (empty($_POST['new_desc'])){
            $new_desc=FALSE;
            $ca="<font color='red'>*</font>";
            $empties++;
            $message .= "Empty desc \n";
        } else {
            $new_desc=$_POST['new_desc'];
            echo $new_desc;
        }
    
    $doll_name = $new_name;
    $doll_desc = $new_desc;
    $doll_price= $_POST['price'];
    $doll_hair = $_POST['doll_hair'];
    $doll_eye  = $_POST['doll_eye'];
    $doll_skin = $_POST['doll_skin'];
    $doll_gen  = $_POST['doll_gen'];
    $doll_size = $_POST['doll_size'];
    
    $imagename  = $_FILES["myimage"]["name"];
    $imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
    
    
//    $file = addslashes(file_get_contents($_FILES["image"["tmp_name"]]));
    
    echo $doll_hair . $doll_eye . $doll_skin . $doll_gen . $doll_size . $doll_price;
                       
    $query = "INSERT INTO product  (ProductType, ProductName, ProductImage, ProductDescription, ProductPrice) 
                            VALUES ('PreMade', '{$doll_name}', '{$imagetmp}', '{$doll_desc}', '{$doll_price}' )";
    
    if (mysqli_query($dbc, $query)){
        echo "Added!";
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}

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
          $target1 ="images/specs/".basename($_FILES['dollImage']['name']);
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
<form action="prodManDollCreation.php" method="post" enctype="multipart/form-data">
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


        
        <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Doll Creation</h4>
                            </div>
                            <div class="content">
                                
                                    <div class="row">
<!--
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="newID" class="form-control border-input" disabled placeholder="1" value="1">
                                            </div>
                                        </div>
-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="new_name" value="<?php if (isset($_POST['new_name']) && !$flag) echo $_POST['new_name'];?>" class="form-control border-input" placeholder="e.g. Barbie">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Price</label>
                                                <input type="number" name="price" class="form-control border-input" placeholder="e.g. 15.00" min=0.0 step=0.5 required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                            <div class="form-group">
                                                <label>Hair</label>
                                                
                                                <select class="form-control" name="doll_hair">
                                                <?php   
                                                    $queryHair = "SELECT * FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID =
                                                    attributevalues.AttributeTypeID WHERE AttributeID=1;";

                                                    $resultHair = mysqli_query($dbc, $queryHair);
                                                    while ($row=mysqli_fetch_array($resultHair)){
                                                    $hair=$row['ValueName'];
                                                        
                                                    echo "<option value='".$row['ValueName']."'>{$row['ValueName']}</option>";
                                                    } 
                                                ?>
                                                </select>
                                            </div>
<!--                                                <input type="text" class="form-control border-input" placeholder="Company" value="Chet">-->                                           
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Eye Color</label>
                                                <select class="form-control" name="doll_eye">
                                                <?php   
                                                    $queryEye = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=3;";
                                                    
                                                    $resultEye= mysqli_query($dbc,$queryEye);
                                                    
                                                    while ($row=mysqli_fetch_array($resultEye)){
       
                                                    echo "<option value='".$row['ValueName']."'>{$row['ValueName']}</option>";
                                                    } 
                                                ?>
                                                </select>
<!--                                                <input type="text" class="form-control border-input" placeholder="Last Name" value="Faker">-->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Skin Color</label>
                                                <select class="form-control" name="doll_skin">
                                                <?php   
                                                    $querySkin = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=2;";
                                                    $resultSkin = mysqli_query($dbc,$querySkin);
                                                    
                                                    while ($row=mysqli_fetch_array($resultSkin)){
       
                                                    echo "<option value='".$row['ValueName']."'>{$row['ValueName']}</option>";
                                                    } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="doll_gen">
                                                <?php   
                                                    $queryGen = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=5;";
                                                    $resultGen = mysqli_query($dbc,$queryGen);
                                                    
                                                    while ($row=mysqli_fetch_array($resultGen)){
       
                                                    echo "<option value='".$row['ValueName']."'>{$row['ValueName']}</option>";
                                                    } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <select class="form-control" name="doll_size">
                                                <?php   
                                                    $querySize = "SELECT ValueName FROM appdev.attributevalues JOIN attribute ON attribute.AttributeID = attributevalues.AttributeTypeID WHERE AttributeID=4;";
                                                    $resultSize = mysqli_query($dbc,$querySize);
                                                    
                                                    while ($row=mysqli_fetch_array($resultSize)){
       
                                                    echo "<option value='".$row['ValueName']."'>{$row['ValueName']}</option>";
                                                    } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="new_desc" value="<?php if (isset($_POST['new_desc']) && !$flag) echo $_POST['new_desc'];?>" class="form-control border-input" placeholder="Doll Description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="file" name="myimage" class="btn btn-info btn-fill btn">
                                        
                                        </div>
                                        <div class="col-md-6">
                                        <input type='submit' name='add' class='btn btn-success btn-fill' value='Update Profile'/>    
<!--                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>-->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                
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

<!--DO THIS LATER
USE VALUE ID INSTEAD OF VALUE NAME WHEN RETRIEVING DATA FROM DB AND INSERTING-->
    
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
