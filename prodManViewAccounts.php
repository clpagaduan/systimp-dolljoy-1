<!doctype html>
<html lang="en">

<?php
    require_once('../mysql_connect.php');
    session_start();



?>

<style>

th {
    cursor: pointer;
}
</style>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>View Accounts</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="prodManViewAccounts.php">View Accounts</a>
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

        <!-- SEARCH FORM --> 
            <form class="form-horizontal" method = "post" action = "<?php echo $_SERVER['PHP_SELF']?>">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           
                            <div class="header">
                                
                                
                            <p class="category">   Select a button to view a specific account table </p>
                                <center>
            <button type = "submit" name = "clientAccs" class = "btn btn-info">Client Accounts</button>
            <button type = "submit" name = "employeeAccs" class = "btn btn-info">Employee Accounts</button>
                                </center>
                               
                            

             
        <!-- SEARCH BAR & SUBMIT BUTTON --> 
        
            
                              </div> <!-- end div header -->
                   
                    

                    
                                   <div style='overflow:auto; max-height:70vh;' class="content table-responsive table-full-width">
                                <table id="myTable" class="table table-hover">
                                    <thead>

                                  <?php  
    
                                    if (isset($_POST['clientAccs']))
    
                                    { echo "<center><p class=\"category\"><b>You are viewing activated client accounts. </b></p>
     
            						<p class=\"category\"><b>Click on a name to view its account details</b></p>
                           			 </center>
                                    
                                    <input id=\"myInput\" type=\"search\" onkeyup=\"search();\" name = \"searchAcc\" class=\"form-control col-sm-2\" placeholder=\"Looking for...\"> </div>
                                    <tr>
                                        <th onclick=\"sortTable(0)\"><p class=\"category\"><b>COMPANY</b></p></th>
                                        <th onclick=\"sortTable(1)\"><p class=\"category\"><b>CONTACT</b></p></th>
                                        <th onclick=\"sortTable(2)\"><p class=\"category\"><b>E-MAIL</b></p></th>
                                        <th onclick=\"sortTable(3)\"><p class=\"category\"><b>REPRESENTATIVE</b></p></th>
                                        <th onclick=\"sortTable(4)\"><p class=\"category\"><b>CONTACT</b></p></th>
                                        <th onclick=\"sortTable(5)\"><p class=\"category\"> <b>E-MAIL</b></p></th>
                                    </tr>
                                    </thead>";
                                    }    
                                        elseif (isset($_POST['employeeAccs']))
    
                                    { echo"
                                     <center><p class=\"category\"><b>You are viewing all employee accounts.</b></p></center>

                                
                                    
                                    <input id=\"myInput\" type=\"search\" onkeyup=\"search();\" name = \"searchAcc\" class=\"form-control col-sm-2\" placeholder=\"Looking for...\"> 
                                    <tr>
                                        <th onclick=\"sortTable(0)\"><p class=\"category\"><b>USERNAME</b></p></th>
                                    
                                        <th onclick=\"sortTable(1)\"><p class=\"category\"><b>FIRST NAME</b></p></th>
                                        <th onclick=\"sortTable(2)\"><p class=\"category\"><b>LAST NAME</b></p></th>
                                        <th onclick=\"sortTable(3)\"><p class=\"category\"><b>CONTACT</b></p></th>
                                        <th onclick=\"sortTable(4)\"><p class=\"category\"><b>E-MAIL</b></p></th>
                                        
                                  
                                    </tr>
                                    </thead>";
                                    }  
                                ?>
                                    
<?php

    

$query = "SELECT * from ClientAccount WHERE AccountStatus = 'Activated'"; 
                  
 if (isset($_POST['employeeAccs']))  
 {  
     

     
    $query = "SELECT * from EmployeeAccount";
 }   elseif (isset($_POST['clientAccs']))

 {  
     
     $query = "SELECT * from ClientAccount WHERE AccountStatus = 'Activated'";
     
     
 }
        
                  
$result=mysqli_query($dbc,$query);
                  
              
                
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
    
    


    if (isset($_POST['clientAccs'])) {
         $id=$row['CName'];
                echo 
                "
                <tbody>
                <tr>

                <td><b><a href=\"prodManViewAccountID.php?id=$id \"><u>{$row['CName']}</u></a></b></td>

                <td><b>{$row['CContactNo']}</b></td>

                <td><b>{$row['CEmailAdd']}</b></td>

                <td><b>{$row['CRepFirstName']} {$row['CRepLastName']}</b></td>

                <td><b>{$row['CRepContactNo']}</b></td>

                <td><b>{$row['CRepEmailAdd']}</b></td>
                
                


                </tr>
                </tbody>
                "; //end echo

        } //  end if Client Accs
    
    elseif (isset($_POST['employeeAccs'])) {
        
            $id=$row['EmployeeUsername'];
             echo "

              <td><b>{$row['EmployeeUsername']}</b></td>
              
                <td><b>{$row['EmployeeFirstName']}</b></td>
                <td><b>{$row['EmployeeLastName']}</b></td>
                <td><b>{$row['EmployeeContactNo']}</b></td>
                <td><b>{$row['EmployeeEmailAdd']}</b></td>
                
                


                </tr>
                </tbody>
                "; // end echo
            } // end if EmployeeAccs
        } // end while MYSQLI
                  
echo "</table>"; 
                                    
                                    
                ?> 

<!-- end php -->  
<br><br>
</div> 
</div>
</div>
                </div>
            </div>
        </form>
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


<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
    
    function search() {
        // Declare variables 
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        th = table.getElementsByTagName("th");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            for (var j = 0; j < th.length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
</script>
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

    <!--  Google Maps Plugin    -<<->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
