<?php 
session_start(); 

require_once('../mysql_connect.php');

?>

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
<title>SERVICES</title>
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
        <h1><a href="websiteHome.php"><font color="#68B3C8">DOLLJOY</font></a></h1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="websiteHome.php" accesskey="1" title="">Homepage</a></li>
			<li><a href="websiteFAQs.php" accesskey="4" title="">FAQS</a></li>
			<li><a href="#" accesskey="5" title="">Services</a></li>
            <li class="active"><a href="websiteLogin.php" accesskey="6" title="">Login</a></li>
            <li><a href="websiteRequestAccount.php" accesskey="6" title="">Request Account</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>
		</ul>
	</div>
</div>
    
<div id="banner"></div>    
<div id="featured" class="container">
    
<!-- START OF LOGIN FORM -->     
    
    
    
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<center><h3><b>Order NOW</b></h3></center>    
    
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div style = "width:50%; display: inline-block">
                    <div class="col-md-12">
                        
                        <div class="card">
                                <div class="content table-responsive table-full-width">
                                    
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category">Doll Name</p></th>
                                        <th><p class="category">Size</p></th>
                                        <th><p class="category">Description</p></th>
                                        <th><p class="category">Photo</p></th>
                                    </thead>
                                    
                                    <?php
                                    require_once('../mysql_connect.php');
                                    $message="";
                                    $query="SELECT * FROM appdev.product";
                                    $result=mysqli_query($dbc,$query);
                                    
                                    $numRows = mysqli_num_rows($result);
                                    if($numRows ==0){
                                        $message="No accounts to show";
                                    }
                                    
                                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        
                                        $name = $row['ProductName'];
                                        $size = $row['ProductSize'];
                                        $desc = $row['ProductDescription'];
                                        
                                        echo
                                            '
                                            <tr>
                                            <td>'.$name.'</td>
                                            <td>'.$size.'</td>
                                            <td>'.$desc.'</td>
                                            
                                            <td>Insert photo here</td>
                                            
                                            <td align = "left"><input type="submit" name="activate" class="btn btn-success btn-fill" value="Add to Cart" /></td>
                                            '
                                            ;
                                        echo '</tr>';
                                    }
                                        echo '</table>';    
                                    ?>
                                    </table>
                                        </div>
                                    
                            </div>
                            
                        </div>
                    </div>
                </div>
    </div>
    </div>
    
    <center><h3><b>Shopping Cart</b></h3></center>  
    
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="content table-responsive table-full-width">
                                    <div style = "width:50%; display: inline-block">
                                <table class="table table-hover">
                                    <thead>
                                        <th><p class="category">Doll Name</p></th>
                                        <th><p class="category">Size</p></th>
                                        <th><p class="category">Description</p></th>
                                        <th><p class="category">Photo</p></th>
                                    </thead>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
                                        

<!-- END OF LOGIN FORM -->
    

<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
    
    
</body>
</html>