<?php
require_once('../mysql_connect.php');
$sql = "";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
if (isset($_POST['accept'])){
	$id=$_POST['id'];
	$sql = "UPDATE Supplies SET DateReceived = '".$date."' WHERE SupplyID = " . $_POST['id'];
    echo "<div class='alert alert-success' align='center'>
  <strong>Product Recieved!</strong></div>
    ";
}

if (!empty($sql))
	$qu = mysqli_query($dbc, $sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Inventory Management</title>

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
  <form action ="prodManInventoryManagement.php" method="post">
   <div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inventory Management</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> Confirm RECEIVE supply?
      </div>
      <div class="modal-footer">
          <button type="submit" name="accept" id ="accept"onclick="Alert()" class="btn btn-secondary">Yes</button>
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<form action ="prodManInventoryManagement.php" method="post">
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
                <li class="active">
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
                    <button type="button"  class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="prodManInventoryManagement.php">Inventory Management</a>
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
                        
                             <div class="row">
                             <div class="col-sm-5">
                            <p class="category">   Select a button to do a specific task</p>



            <button type = "submit" name = "viewStocks" class = "btn btn-info">View Stocks</button>

           <button type = "submit" name = "receiveSupplies" class = "btn btn-info">Receive Supplies</button>
                            </div> <div class="col-sm-7">
                               <table class="table table-hover">
                               <tr>
                                   <th align="center"><div align="center" padding >Totals</div></th>
                                    <th align="center"><div align="center" padding >Quantity</div></th></tr>
                               <?php
                                   
                                   
                                   
                                   $query2=
                                       
                                       "UPDATE `appdev`.`suppliestotal`,supplies SET session =1,`Quantity`= (select sum(supplyquantity) from supplies join suppliers as s on s.SupplierID= supplies.SupplierID where s.SupplyType=\"Hair\" and supplies.datereceived is not null ) WHERE `TotalID`='2' and session =0;";
                                       $result2=mysqli_query($dbc,$query2);
                                     $query3=
                                       
                                       "UPDATE `appdev`.`suppliestotal`,supplies SET session =1,`Quantity`= (select sum(supplyquantity) from supplies join suppliers as s on s.SupplierID= supplies.SupplierID where s.SupplyType=\"Vinyl\" and supplies.datereceived is not null ) WHERE `TotalID`='1' and session =0;";
                                       $result3=mysqli_query($dbc,$query3);
                                   
                                   
                                   
                                   
                                   



                                   
                                
                                 $query="SELECT * FROM suppliestotal ";
                            $result=mysqli_query($dbc,$query);
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                     
                                
                                
                                echo"
                               <tr><td align =\"center\">{$row['Supply']}</td><td align =\"center\">{$row['Quantity']}</td>
                                ";}
                               
                                    
                                    ?>
                                </table>
                                </div>
                                </div>
                                 <div class="content table-responsive table-full-width"style='overflow:auto; max-height:60vh;'>
                                 <table id="myTable" class="table table-hover" style='overflow:auto; max-height:32vh;'>
                                  <?php  
    
                                    if (isset($_POST['receiveSupplies']))
    
                                    { echo "  <center><p class=\"category\"><b>Listed below are UNRECEIVED stock supplies DOLLJOY has ordered. 
                                <br> Click on RECEIVE once
                             supply has been accumulated.</b></p></center>";



                           
                            $query="SELECT SupplyID, SupplyType, DateOrdered,SupplierCountry, SupplyQuantity, Suppliers.SupplierName AS 'Supplier', SupplierContactNum FROM Supplies S INNER JOIN Suppliers ON S.SupplierID=Suppliers.SupplierID WHERE `DateReceived` IS NULL";
                            $result=mysqli_query($dbc,$query);
                            
                            
                            $query2="SELECT SupplyID FROM Supplies WHERE `DateReceived` IS NULL";
                            $result2=mysqli_query($dbc,$query2);
                            $result3 = $result2->num_rows;
                            


                            if ($result3 >=0){
                            echo 

                             "<input id=\"myInput\" type=\"search\" onkeyup=\"search();\" name = \"searchSupply\" class=\"form-control col-sm-2\" placeholder=\"Looking for...\"> </div>
                                    <tr>
                                        <th onclick=\"sortTable(0)\"><p class=\"category\"><div align=\"center\"><b>ITEM SUPPLIED</b></p></div></th>
                                        <th onclick=\"sortTable(1)\"><p class=\"category\"><div align=\"center\"><b>DATE ORDERED</b></p></div></th>
                                        <th onclick=\"sortTable(2)\"><p class=\"category\"><div align=\"center\"><b>SUPPLIER NAME</b></p></div></th>
                                        <th onclick=\"sortTable(3)\"><p class=\"category\"><div align=\"center\"><b>SUPPLIER SOURCE</b></p></div></th>
                                        <th onclick=\"sortTable(4)\"><p class=\"category\"><div align=\"center\"><b>QUANTITY IN KG</b></p></div></th>
                                        <th onclick=\"sortTable(5)\"><p class=\"category\"><div align=\"center\"><b>CONTACT NUMBER</b></p></div></th>
                                        <th><p class=\"category\"><div align=\"center\"><b>ACTION</b></p></div></th>

                                    </tr>
                                    ";
                            
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $id=$row['SupplyID'];

                                
                            echo "<tr>
                            <td><b>{$row['SupplyType']}</b></td>
                            <td><b>{$row['DateOrdered']}</b></td>
                            <td><b>{$row['Supplier']}</b></td>
                            <td><b>{$row['SupplierCountry']}</b></td>
                            <td><b>{$row['SupplyQuantity']}</b></td>
                            <td><b>{$row['SupplierContactNum']}</b></td>
                            <td>
                            <form action=\"prodManInventoryManagement.php\" method=\"post\">
                            <input type = \"button\"  class=\"btn btn-fill btn-success\" value=\"RECEIVE\" data-toggle=\"modal\" data-target=\"#exampleModal\">
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
                            </form></td>
                            </tr>";
                            }

                          //  echo '</table>';
                            }
                            
                            
                            else if ($result3==0){
                                echo "<center><b>No orders to be received!</b></center>";
                            }
                        }// end if isset receive supplies

                        if (isset($_POST['viewInventory']))
    
                                    { echo"

                                <center><p class=\"category\"><b>You are viewing Inventory Count based on Product Orders. </b></p>
     
                                   
                                   
                                    <input id=\"myInput\" type=\"search\" onkeyup=\"search();\" name = \"searchInventory\" class=\"form-control col-sm-2\" placeholder=\"Looking for...\"> </div>
                                    <tr>
                                        <th onclick=\"sortTable(0)\"><p class=\"category\"><b>PRODUCT NAME</b></p></th>
                                        <th onclick=\"sortTable(1)\"><p class=\"category\"><b>PRODUCT TYPE</b></p></th>
                                        <th onclick=\"sortTable(2)\"><p class=\"category\"><b>PRODUCT SIZE</b></p></th>
                                        <th onclick=\"sortTable(3)\"><p class=\"category\"><b>PRODUCT PRICE</b></p></th>
                                        <th onclick=\"sortTable(4)\"><p class=\"category\"><b>ORDER QUANTITY</b></p></th>
                                    
                                    </tr>
                                    </thead>";



                                      
                                                         

                            $query = "SELECT `ProductID`, `ProductType`, `ProductName`, `ProductSize`, `ProductPrice`, SUM(orders.OQuantity) AS OQuantity
                                FROM product
                                JOIN orders 
                                ON product.ProductID = orders.OProductID
                                GROUP BY ProductName";
                            
                  
                                $result=mysqli_query($dbc,$query);
                  
              
                
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo 
                                            "
                                            <tbody>
                                            <tr>

                                            <td><b>{$row['ProductName']}</a></b></td>

                                            <td><b>{$row['ProductType']}</b></td>

                                            <td><b>{$row['ProductSize']}</b></td>

                                            <td><b>{$row['ProductPrice']}</b></td>

                                            <td><b>{$row['OQuantity']}</b></td>

                                           


                                            </tr>
                                            </tbody>
                                            "; 
                                        
                                    } // end while MYSQLI
                  
                             }     
                                    
                                    
                                     if (isset($_POST['viewStocks']))
                     {
                            echo "  <center><p class=\"category\"><b>Listed below are RECEIVED stock supplies DOLLJOY has ordered. 
                                <br>";



                           
                            $query="SELECT SupplyID, SupplyType, DateOrdered, DateReceived, SupplierCountry, SupplyQuantity, Suppliers.SupplierName AS 'Supplier', SupplierContactNum FROM Supplies S INNER JOIN Suppliers ON S.SupplierID=Suppliers.SupplierID WHERE `DateReceived` IS NOT NULL";
                            $result=mysqli_query($dbc,$query);
                            
                            
                            $query2="SELECT SupplyID FROM Supplies WHERE `DateReceived` IS NULL";
                            $result2=mysqli_query($dbc,$query2);
                            $result3 = $result2->num_rows;
                            


                            if ($result3>=0){
                            echo 

                             "<input id=\"myInput\" type=\"search\" onkeyup=\"search();\" name = \"searchSupply\" class=\"form-control col-sm-2\" placeholder=\"Looking for...\"> </div>
                                    <tr>

                                        <th onclick=\"sortTable(0)\"><p class=\"category\"><div align=\"center\"><b>DATE RECEIVED</b></p></div></th>
                                        <th onclick=\"sortTable(1)\"><p class=\"category\"><div align=\"center\"><b>DATE ORDERED</b></p></div></th>
                                        <th onclick=\"sortTable(2)\"><p class=\"category\"><div align=\"center\"><b>ITEM</b></p></div></th>
                                        <th onclick=\"sortTable(3)\"><p class=\"category\"><div align=\"center\"><b>FROM </b></p></div></th>
                                        <th onclick=\"sortTable(4)\"><p class=\"category\"><div align=\"center\"><b>SOURCE</b></p></div></th>
                                        <th onclick=\"sortTable(5)\"><p class=\"category\"><div align=\"center\"><b>QUANTITY IN KG</b></p></div></th>

                                    </tr>
                                    ";
                            
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $id=$row['SupplyID'];

                                
                            echo "

                            <tr>

                            <td><div align=\"center\"><b>{$row['DateReceived']}</b></div></td>
                            <td><div align=\"center\"><b>{$row['DateOrdered']}</b></div></td>
                            <td><div align=\"center\"><b>{$row['SupplyType']}</b></div></td>
                            <td><div align=\"center\"><b>{$row['Supplier']}</b></div></td>
                            <td><div align=\"center\"><b>{$row['SupplierCountry']}</b></div></td>
                            <td><div align=\"center\"><b>{$row['SupplyQuantity']}</b></div></td>
                          
                            </tr>";
                            }

                           echo '</table>';
                            }}
                                    
                                    
                ?> 
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
