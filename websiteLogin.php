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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header" class="container">
	<div id="logo">
<h1><a href="websiteHome.php"><font color="#68B3C8">DOLLJOY</font></a></h1>	</div>
	<div id="menu">
		<ul>
			<li><a href="websiteHome.php" accesskey="1" title="">Homepage</a></li>
			<li><a href="websiteFAQs.php" accesskey="4" title="">FAQS</a></li>
			<li><a href="websiteServices.php" accesskey="5" title="">Services</a></li>
            <li class="active"><a href="websiteLogin.php" accesskey="6" title="">Login</a></li>
            <li><a href="websiteRequestAccount.php" accesskey="6" title="">Request Account</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>
		</ul>
	</div>
</div>
    
<!--    <center><img src="/images/bnwdolls.jpg" style="width:1440px;height:600px" /></center>-->
<div id="featured" class="container">
    
<!-- START OF LOGIN FORM -->       
    
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php 
session_start(); 

require_once('../mysql_connect.php');

 $flag=0;
 $message=null;
    if(isset($_POST['login'])){
        
        

   $empties=$invalid=0;

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
    header("location: clientDashboard.php");
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
    
    $message="<div class='alert alert-danger'><span aria-hidden='true'><b><center>Please do not leave the fields blank</center></span></div>";
}
    
}
    /*End of main Submit conditional*/

    if (isset($message)){
     echo '<font color="blue">'.$message. '</font>';
    }

?>    
<center><h3><b>LOGIN</b></h3></center>
    
<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-body">
                        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                            <fieldset>
                                <div class="form-group">
                                    <label class="string optional" for="user-name">Username</label>
                                    <input class="string optional form-control" maxlength="255" name="username" id="user-name" placeholder="Username" type="username" size="50" value="<?php if (isset($_POST['username']) && !$flag) echo $_POST['username']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="string optional" for="user-pw">Password</label>
                                    <input class="string optional form-control" maxlength="255" name="password" id="user-pw" placeholder="Password" type="password" size="50" value="<?php if (isset($_POST['password']) && !$flag) echo $_POST['password']; ?>" />
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <br>
                                <div   class="simform__actions"><input  class="btn btn-fill btn-success" class="sumbit"  type="submit" value="Log In" name="login"></div>
                            </fieldset>
                        </form>
<?php
   
?>
                    

                    </div>
                </div>
    </div>
</div>
<hr>

</div>
    
<!-- END OF LOGIN FORM -->   

<div id="copyright" class="container">
	<p>&copy; Deja Vu. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>