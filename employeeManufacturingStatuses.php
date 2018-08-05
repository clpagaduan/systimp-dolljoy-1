<?php
require_once('../mysql_connect.php');
$sql = "";

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
if (isset($_POST['ship'])){
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET OShippedDate = DATE(NOW()), OShipmentStatus = 'Shipped' WHERE OrderID = " . $_POST['id'];
}
if (isset($_POST['paid'])){
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET OPaymentDate = DATE(NOW()), OPaymentStatus = 'Paid' WHERE OrderID = " . $_POST['id'];
}
if (isset($_POST['start'])){
    $id=$_POST['id'];
    
    
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
    
    

if($Vtotal>=$remove && $htotal>= $hremove){

    $sql = "UPDATE Orders SET StartManufacturing = DATE(NOW()), ManufacturingStatus = 'In Progress' WHERE OrderID = " . $_POST['id'];

    $query20 = "update suppliestotal set quantity=quantity-(select sum(weightHair) from ordersrefs where OrderID=$id )where supply ='Hair'";
       mysqli_query($dbc, $query20);
    
    $query30 = "update suppliestotal set quantity=quantity-(select sum(weightVinyl) from ordersrefs  WHERE OrderID = $id ) where supply ='Vinyl'";

       mysqli_query($dbc, $query30);

        echo"<div class=\"alert alert-success\">
  <strong>Success!</strong>Successfully started.
</div>";
}
    
    else{
        echo"<div class=\"alert alert-danger\">
  <strong>Success!</strong> Not Enough Materials.
</div>";
        
        
    }
    

}

if (isset($_POST['end'])){
    $id=$_POST['updateid'];
    $sql = "UPDATE Orders SET EndManufacturing = DATE(NOW()), ManufacturingStatus = 'Completed' WHERE OrderID = " . $_POST['updateid'];
    
    
    

    
    
}


if (isset($_POST['update'])){

    $id=$_POST['updateid'];
    $sql = "UPDATE Orders SET Status = Status+1 WHERE OrderID = " . $_POST['updateid'] ;
}

if (isset($_POST['restart'])){

    $id=$_POST['updateid'];
    $sql = "UPDATE Orders SET Status = 0 WHERE OrderID = " . $_POST['updateid'] ;
}



if (!empty($sql))
    $qu = mysqli_query($dbc, $sql);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Manufacturing Status</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

</head>
<body ng-app="">

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
                    <a href="employeeDashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="employeeManufacturingStatuses.php">
                        <i class="ti-paint-roller"></i>
                        <p>Manufacturing Status</p>
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
                    <a class="navbar-brand" href="employeeManufacturingStatuses.php">Manufacturing Status</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                                <h4 class="title"><b>Update manufacturing statuses</b></h4>
                            </div>
                            <br>
                                <div style='overflow:auto; max-height:70vh;' class="content table-responsive table-full-width">

                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category"><b>ORDER #</b></p></th>
                                        <th><p class="category"><b>COMPANY</b></p></th>
                                        <th><p class="category"><b>QUANTITY</b></p></th>
                                        <th><p class="category"><b>DATE ORDERED</b></p></th>
                                        <th><p class="category"><b>DATE REQUIRED</b></p></th>
                                    </thead>

                                <?php

//START
$query="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE OPaymentStatus='Paid' AND OrderStatus='Approved' AND CompanyID = OCompanyID AND ManufacturingStatus='Pending'";
$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);

//END
$query2="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE ManufacturingStatus='In Progress' AND CompanyID = OCompanyID ";
$result2=mysqli_query($dbc,$query2);

$numRows2 = mysqli_num_rows($result2);
    if($numRows ==0 && $numRows2 == 0){
        $message="No orders to show";
    }

//END
while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){

$id=$row['OrderID'];

    $status=$row['Status'];
$q = 5;

echo
"
<tbody>
<tr>

<td><b><a href=\"employeeManufacturingStatusID.php?id=$id \">{$row['OrderID']}</b></a></td>
<td><b>{$row['CName']}</b></td>
<td><b>{$row['OQuantity']}</b></td>
<td><b>{$row['OOrderedDate']}</b></td>
<td><b>{$row['ORequiredDate']}</b></td>
";


// echo "<td>
//                            <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
//                            <input type = \"submit\" name =\"end\" class=\"btn btn-danger btn-fill\" value=\"END\">
//                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
//                            </form></td></tr>
// ";




    $percent = ($status / $q) * 100;


   if ($status == 0) {
      echo
      "

      <td align='center'><div align=\"center\"><h>Current Process: Rotocast </h></div><br><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>


       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"update\" class=\"btn btn-success btn-fill\" value=\"UPDATE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }
     if ($status == 1) {
      echo
      "
  <td align='center'><h>Current Process: Painting </h><br><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>


       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"update\" class=\"btn btn-success btn-fill\" value=\"UPDATE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }
     if ($status ==2) {
      echo
      "
   <td align='center'><h>Current Process: Hair Rooting </h><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>


       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"update\" class=\"btn btn-success btn-fill\" value=\"UPDATE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }
     if ($status == 3) {
      echo
      "
  <td align='center'><h>Current Process: Outfit Sewing </h><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>


       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"update\" class=\"btn btn-success btn-fill\" value=\"UPDATE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }
     if ($status == 4) {
      echo
      "

  <td align='center'><h>Current Process: Assembly </h><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>


       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"update\" class=\"btn btn-success btn-fill\" value=\"UPDATE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }
    if ($status == 5) {
      echo
      "

  <td align='center'><h>Current Process: Finished </h><div class='progress position-relative' style='width: 80%; '>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$status aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$status / $q</span>
        </div></div>

        <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
       <input type = \"submit\" name =\"restart\" class=\"btn btn-danger btn-fill\" value=\"RESTART\"></button>
       <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>

       <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
      <input type = \"submit\" name =\"end\" class=\"btn btn-success btn-fill\" value=\"DONE\"></button>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">  </form>";
    }

echo "</td></tr>";


}

//START
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['OrderID'];

echo
"
<tr>

<td><b><a href=\"employeeManufacturingStatusID.php?id=$id \">{$row['OrderID']}</b></a></td>
<td><b>{$row['CName']}</b></td>
<td><b>{$row['OQuantity']}</b></td>
<td><b>{$row['OOrderedDate']}</b></td>
<td><b>{$row['ORequiredDate']}</b></td>



<td align=\"center\">
                            <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
                            <input type = \"submit\" name =\"start\" class=\"btn btn-success btn-fill\" value=\"START\">
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
                            </form></td></tr>
";
?>
    <?php
}?>



</table>

    <center>
    <label>
        <?php
            if(isset($message)){
                echo $message;
            }
        ?>

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


  <style>
    .progress {
      position: relative;
      }

    .progress span {
        position: absolute;
        display: block;
        width: 100%;
        color: black;
      }
  </style>

</html>
