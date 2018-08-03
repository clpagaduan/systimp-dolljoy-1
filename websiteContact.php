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
<title>CONTACT</title>
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
        <h1><a href="websiteHome.php" target="_blank"><img src="http://i65.tinypic.com/29mwvnm.jpg" border="0" alt="Image and video hosting by TinyPic" style="width:250px"></a></h1>
	</div>
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
<section id="contact">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-6 col-sm-12">

				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15445.953535431661!2d121.0820898!3d14.5712246!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6da367deebb40694!2sDolljoy+Gallery+and+Museum!5e0!3m2!1sen!2s!4v1489816896769" width="540" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

		<div class="wow fadeInUp col-md-6 col-sm-12">
			<h1>Let's work together!</h1>
			<div class="contact-form">
				<form id="contact-form" method="post" action="#">
					<input name="name" type="text" class="form-control" placeholder="Your Name" required>
					<input name="email" type="email" class="form-control" placeholder="Your Email" required>
					<textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea>
					<div class="contact-submit">
						<input type="submit" class="form-control submit" value="Send a message">
					</div>
				</form>
			</div>
		</div>

		<div class="clearfix"></div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media">
					<div class="media-object pull-left">
						<i class="fa fa-tablet"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Phone</h3>
						<p>+63 2672 1939</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media">
					<div class="media-object pull-left">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Email</h3>
						<p>inquiry@dolljoygallery.com</p>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="wow fadeInUp media">
					<div class="media-object pull-left">
						<i class="fa fa-globe"></i>
					</div>
					<div class="media-body">
						<h3 class="media-heading">Address</h3>
						<p>31 C. Raymundo Ave, Pasig<br>
                        Metro Manila, Philippines</p>
					</div>
				</div>
			</div>

      </div>
   </div>
</section>

    
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
