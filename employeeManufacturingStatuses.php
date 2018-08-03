<?php
require_once('../mysql_connect.php');
$sql = "";
$username = "kurt";
$reps = 1;
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
    $sql = "UPDATE Orders SET StartManufacturing = DATE(NOW()), ManufacturingStatus = 'In Progress' WHERE OrderID = " . $_POST['id'];
}
if (isset($_POST['end'])){
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET EndManufacturing = DATE(NOW()), ManufacturingStatus = 'Completed' WHERE OrderID = " . $_POST['id'];
}
if (isset($_POST['fill'])){
    $id=$_POST['id'];
    $reps = $_POST['fillq'];
    $prid = $_POST['prid'];
    $sql = "INSERT INTO product_serial_audit (`ProductID`, `OrderID`, `audit_employee_username`, `audit_timelog`) VALUES ('$prid', '$id', '$username', NOW())";
}
if (!empty($sql))
  for ($i = 0; $i < $reps; $i++){
    $qu = mysqli_query($dbc, $sql);
  }
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
                                <div class="content table-responsive table-full-width">

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
$query2="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE ManufacturingStatus='In Progress' AND CompanyID = OCompanyID";
$result2=mysqli_query($dbc,$query2);

$numRows2 = mysqli_num_rows($result2);
    if($numRows ==0 && $numRows2 == 0){
        $message="No orders to show";
    }

//END
while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){

$id=$row['OrderID'];
$q = $row['OQuantity'];

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

    $query3 = "SELECT o.ProductID, o.quantity, COUNT(ps.SerialCode) AS 'made' FROM ordersrefs o JOIN product_serial_audit ps ON o.ProductID = ps.ProductID WHERE o.OrderID = $id GROUP BY o.ProductID;";
    $result3 = mysqli_query($dbc, $query3);

    $falsecount = 0;
    $made = 0;

    while ($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
        $made = $made + $row3['made'];
        if ($row3['quantity'] > $row3['made'])
          $falsecount++;
    }

    $percent = ($made / $q) * 100;

    echo "<td align='center'><div class='progress position-relative' style='width: 130%; margin-left: -40%;'>
        <div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow=$made aria-valuemin='0' aria-valuemax= $q style='width:$percent%'>
          <span>$made / $q</span>
        </div></div>";

    if ($falsecount == 0 && $made >= $q){
      echo "
            <p onclick='update_url($id);'><button data-toggle='modal' data-target='#exampleModal' type = 'button'  class='btn btn-success btn-fill pull-left'>UPDATE</button></p>";

      echo  "
            </br></br>

          <form action=\"employeeManufacturingStatuses.php\" method=\"post\">
            <input type = \"submit\" name =\"end\" class=\"btn btn-danger btn-fill\" value=\"END\" style='margin-left: -40%;'>
            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
          </form>";
    }
    else if ($falsecount > 0 || $made < $q) {
      echo
      "<p onclick='update_url($id);'><button data-toggle='modal' data-target='#exampleModal' type = 'button'  class='btn btn-success btn-fill pull-left'>UPDATE</button></p>
      <input type = \"hidden\" name =\"updateid\" class=\"\" value=\"".$id."\">";
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



<td>
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


    </div>
</div>

<?php

$id = $_GET['id'];

echo '  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Manufacturing Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h5>Order # '.$id.' </h5>
                <table width="100%">
                  <tr>
                    <td>Product ID</td>
                    <td>Product Name</td>
                    <td>Filled</td>
                    <td width="15%"><td>
                    <td> </td>
                  </tr>';

    $query2 = "SELECT o.ProductID, p.ProductName, o.quantity, (SELECT COUNT(ps.SerialCode) FROM product_serial_audit ps WHERE ps.ProductID = o.ProductID AND ps.OrderID = ".$id." ) AS 'made' FROM ordersrefs o JOIN product p ON o.ProductID = p.ProductID WHERE o.OrderID = $id GROUP BY o.ProductID";
    $result2 = mysqli_query($dbc, $query2);

    while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
    {
          echo "  <tr>
                    <td>". $row2['ProductID'] ."</td>
                    <td>". $row2['ProductName'] ."</td>
                    <td>". $row2['made'] ." / ". $row2['quantity'] ."</td>
                    <form action='employeeManufacturingStatuses.php' method='post'><td><input type='number' class='form-control border-input' min='1' name='fillq' value=1><input type = \"hidden\" name =\"fillid\" class=\"\"></td>
                    <td><div align='center'> <input type='hidden' name='prid' value='".$row2['ProductID']."'><input type='hidden' name='id' value='".$id."'><input type = \"submit\" name =\"fill\" class=\"btn btn-success btn-fill\" value=\"Fill\"></div></td></form>
                  </tr>";
    }

      echo    " </table>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
              </div>
            </div>
          </div>
        </div>";
?>

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

  <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })

        function update_url(id)
        {
          if (window.location.hash != "#stopload") {
            location.replace("employeeManufacturingStatuses.php?id=" + id + '#stopload');
          }
          history.pushState(null, '', '?id=' + id);
        }
    </script>

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
