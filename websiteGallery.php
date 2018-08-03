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
<title>GALLERY</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    
</head>
    
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 20px;
    text-align: center;
    font-size: 12px;
    cursor: pointer;
}

.button:hover {
    background: green;
}
        
/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
    
<body>
<div id="header" class="container">
	<div id="logo">
<h1><a href="websiteHome.php"><font color="#68B3C8">DOLLJOY</font></a></h1>	</div>
	<div id="menu">
		<ul>
			<li><a href="websiteHome.php" accesskey="1" title="">Homepage</a></li>
			<li class="active"><a href="websiteGallery.php" accesskey="5" title="">Gallery</a></li>
            <li><a href="websiteServices.php" accesskey="5" title="">Services</a></li>
            <li><a href="websiteLogin.php" accesskey="6" title="">Login</a></li>
            <li><a href="websiteRequestAccount.php" accesskey="6" title="">Request Account</a></li>
			<li><a href="#" accesskey="7" title="">Contact Us</a></li>            
		</ul>
	</div>
</div>
<div id="page" class="container">
	<div class="boxA">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll1.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 1</font></h2>
		</div>
        
	</div>

	<div class="boxB">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll2.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 2</font></h2>
		</div>
	</div>

	<div class="boxC">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll3.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 3</font></h2>
		</div>
	</div>
    <div class="boxA">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll4.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 4</font></h2>
		</div>
	</div>

	<div class="boxB">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll5.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 5</font></h2>
		</div>
	</div>

	<div class="boxC">
		<div class="box">
			<a href="#" class="image image-full"><img src="images/doll6.jpg" alt="" /></a>
            <h2><font color="#68B3C8">Doll 6</font></h2>
		</div>
	</div>
    <p align="center">Want to order dolls from us?<br> You must first <a href="websiteLogin.php" style="color:#ED9B3E"><b>login</b></a> or <a href="websiteRequestAccount.php" style="color:#99D649"><b>request an account</b></a> with Dolljoy.</p>
</div>
    

    
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}    
</script>

<div id="copyright" class="container">
	<p>&copy; Dolljoy. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
