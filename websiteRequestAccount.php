<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : PlainLeaf
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<?php
session_start();

require_once('../mysql_connect.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REQUEST ACCOUNT</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="header" class="container">
	<div id="logo">
<h1><a href="websiteHome.php"><font color="#68B3C8">DOLLJOY</font></a></h1>	</div>
	<div id="menu">
		<ul>
			<li><a href="websiteHome.php" accesskey="1" title="">Homepage</a></li>
			<li><a href="websiteFAQs.php" accesskey="4" title="">FAQS</a></li>
			<li><a href="#" accesskey="5" title="">Services</a></li>
            <li><a href="websiteLogin.php" accesskey="6" title="">Login</a></li>
            <li class="active"><a href="websiteRequestAccount.php" accesskey="6" title="">Request Account</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>
		</ul>
	</div>
</div>

<!--    <center><img src="images/request.jpg" style="width:1440px;height:600px" /></center>-->

<div id="featured" class="container">

<!-- START OF REGISTRATION FORM -->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<?php
//php code for register
$flag=0;
$cn=$ca=$cnum=$cea=$cfn=$cln=$crnum=$cra=$un=$pw=$crea=NULL;
$empties=$invalid=0;

if(isset($_POST['register'])){

$message=null;





 if (empty($_POST['CName'])){
  $CName=FALSE;
  $cn="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty company name \n";
 }else
  $CName=$_POST['CName'];

 if (empty($_POST['CAddress'])){
  $CAddress=FALSE;
  $ca="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty company address";
 }else{
   $CAddress=$_POST['CAddress'];
 }

if (empty($_POST['CContactNo'])){
  $CContactNo=FALSE;
  $cnum="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty company contact no";
 }
 else if(!preg_match('/^[0-9]*$/',$_POST['CContactNo'])){
  $cnum="<font color='red'>*</font>";
  $invalid++;
  $message .= "Invalid characters on contact no";
 }
 else{
   $CContactNo=$_POST['CContactNo'];
 }

if (empty($_POST['CEmailAdd'])){
  $CEmailAdd=FALSE;
  $cea="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty company email address";
 }else{
   $CEmailAdd=$_POST['CEmailAdd'];
 }

if (empty($_POST['CRepFirstName'])){
    /*echo 'poll 5';*/
  $CRepFName=FALSE;
  $cfn="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty representative first name";
 }else{
    /*echo 'poll 4';*/
   $CRepFName=$_POST['CRepFirstName'];
 }
    /*echo 'poll';*/
if (empty($_POST['CRepLasName'])){

  $CRepLName=FALSE;
  $cfn="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty representative Last name";
 }else{
   $CRepLName=$_POST['CRepLasName'];
    /*echo $CRepLName;*/
 }

 if (empty($_POST['CRepContactNo'])){
  $CRepContactNo=FALSE;
  $crnum="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty representative contact no";
 } else if(!preg_match('/^[0-9]*$/',$_POST['CRepContactNo'])){ //checks if input only has numbers
  $crnum="<font color='red'>*</font>";
  $invalid++;
  $message .= "Invalid characters on representative's number";
 }else{
   $CRepContactNo=$_POST['CRepContactNo'];
 }
 if (empty($_POST['CRepAddress'])){
  $CRepAddress=FALSE;
  $cra="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty representative address";
 }else{
   $CRepAddress=$_POST['CRepAddress'];
 }
 if (empty($_POST['CRepEmailAdd'])){
  $CRepEmailAdd=FALSE;
  $crea="<font color='red'>*</font>";
  $empties++;
  $message .= "Empty company email address";
 }else{
   $CRepEmailAdd=$_POST['CRepEmailAdd'];



$query="INSERT INTO `appdev`.`clientaccount`(`CName`, `CAddress`, `CContactNo`, `CEmailAdd`, `CRepFirstName`, `CRepLastName`, `CRepContactNo`, `CRepAddress`, `CRepEmailAdd`, `AccountStatus`) VALUES ('{$CName}', '{$CAddress}', '{$CContactNo}', '{$CEmailAdd}', '{$CRepFName}', '{$CRepLName}', '{$CRepContactNo}', '{$CRepAddress}', '{$CRepEmailAdd}', 'Pending');";


$result=mysqli_query($dbc,$query);


$message="<div class='alert alert-success'><span aria-hidden='true'><b><font color='black'><center>Account has been sent for approval!</center></font></span></div>";

$flag=1;
 }

if(isset($message)){

}
else if ($empties >0 && $invalid ==0){

    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please fill out fields marked with *</center></span></div>";
}
else if ($invalid > 0 && $empties == 0){

    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please check your input. For contact numbers, use characters 0-9 only.</center></span></div>";
}
else if ($empties > 0 && $invalid >0){

    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please fill out fields marked with *<br>For contact numbers, use characters 0-9 only.</center></span></div>";
}
 //php code for login

}//login checking
else if(isset($_POST['login'])){

if(!empty($_POST['username']) && (!empty($_POST['password']))){
  $username = $_POST['username'];
  $password = ($_POST['password']);

  $sql='SELECT CRepUsername,CRepPassword FROM clientaccount WHERE CRepUsername = "'.$username.'" AND CRepPassword = PASSWORD("'.$password.'")';


  $sql2='SELECT EmployeeUsername,EmployeePassword, employeeType, EmployeeID FROM employeeaccount WHERE EmployeeUsername = "'.$username.'" AND EmployeePassword = PASSWORD("'.$password.'")';

  $result= mysqli_query($dbc, $sql);
  $result2= mysqli_query($dbc, $sql2);

    if ($total=mysqli_num_rows($result)>0){
    $_SESSION['username'] = $username;
    $_SESSION['usertype'] = 3;
    header("location: customerDashboard.php");
    }
    else if ($total=mysqli_num_rows($result2)>0){
    $row = mysqli_fetch_array($result2);
    $asd = $row['employeeType'];
        if ($asd==1){
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = 1;
        header("location: prodManDashboard.php");
        }
        else if ($asd==2){
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = 2;
        header("location: employeeDashboard.php");
        }
    }
    else{
    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>The credentials you provided don't match our records.<br>Please try again.</center></span></div>";
    }

}
if (empty($_POST['username'])){
  $username=FALSE;
  $un="<font color='red'>*</font>";
  $empties++;

}
if (empty($_POST['password'])){
  $password=FALSE;
  $pw="<font color='red'>*</font>";
  $empties++;

}
if ($empties >0){

    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please fill out fields marked with *</center></span></div>";
}

}
/*End of main Submit conditional*/

if (isset($message)){
 echo $message;
}

?>


<center><h3><b>REQUEST ACCOUNT</b></h3></center>

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-body">

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                            <fieldset>
                                <h5><b>COMPANY DETAILS</b></h5>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Company Name" name="CName" type="text" autofocus="" value="<?php if (isset($_POST['CName']) && !$flag) echo $_POST['CName']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Company Address" name="CAddress" type="text" autofocus="" value="<?php if (isset($_POST['CAddress']) && !$flag) echo $_POST['CAddress']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Company Contact Number" name="CContactNo" type="number" autofocus="" value="<?php if (isset($_POST['CContactNo']) && !$flag) echo $_POST['CContactNo']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Company E-mail" name="CEmailAdd" type="email" autofocus="" value="<?php if (isset($_POST['CEmailAdd']) && !$flag) echo $_POST['CEmailAdd']; ?>" required>
                                </div>
                                <br>
                                <h5><b>REPRESENTATIVE DETAILS</b></h5>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Representative First Name" name="CRepFirstName" type="text" autofocus="" value="<?php if (isset($_POST['CRepFirstName']) && !$flag) echo $_POST['CRepFirstName']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Representative Last Name" name="CRepLasName" type="text" autofocus="" value="<?php if (isset($_POST['CRepLastName']) && !$flag) echo $_POST['CRepLastName']; ?>" required/>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Representative Address" name="CRepAddress" type="text" autofocus="" value="<?php if (isset($_POST['CRepAddress']) && !$flag) echo $_POST['CRepAddress']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Representative Contact Number" name="CRepContactNo" type="number" autofocus="" value="<?php if (isset($_POST['CRepContactNo']) && !$flag) echo $_POST['CRepContactNo']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Representative E-mail" name="CRepEmailAdd" type="email" autofocus="" value="<?php if (isset($_POST['CRepEmailAdd']) && !$flag) echo $_POST['CRepEmailAdd']; ?>" required/>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <br>


                                <div class="simform__actions">
			<input type="submit"  class="btn btn-fill btn-success" class="submit"  type="submit" value="Request Account" name="register" data-toggle="modal" data-target="#myModal">

			<!--<input type="submit" value="Request Account" name="register">-->
              <span class="simform__actions-sidetext">&nbsp By requesting an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
            </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
    </div>
</div>
<hr>



</div>

<!-- END OF REGISTRATION FORM -->

<div id="copyright" class="container">
	<p>&copy; Deja Vu. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>

</body>
</html>
