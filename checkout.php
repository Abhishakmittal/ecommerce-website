<?php
session_start();


include("Includes/Database.php");
include("Functions/functions.php");

?>



								<!DOCTYPE HTML>
								<html>
								<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
								<title>My Website</title>

								<link rel="stylesheet" href="Styles/styles.css" media="all" />
								<!--media all makes sure that our style sheet can be opened in mobiles/laptop/any system --> </head>

								<body>

									<!--Main Container STARTS-->
									<div class="main_wrapper">

										<!--Header Starts-->
										<div class="header_wrapper">
										<a href="index.php"><img src="images/logo.gif" style="width:300px;height:100px;float:left;">
											<img src="images/ad_banner.gif" style="width:300px;height:100px;float:right;">
											<img src="images/paypal.gif" style="width:300px;height:100px;float:right;">
										</div>
										<!--Header ENDS-->

										<!--Navigation Bar STARTS-->
										<div id="navbar">
											
											<ul id="menu">
												<li> <a href="index.php">Home</a></li>
												<li><a href="all_products.php">All Products</a></li>
												<li><a href="my_account.php">My Account</a></li>
												<li><a href="user_register.php">Sign Up</a></li>
												<li><a href="cart.php">Shopping Cart</a></li>
												<li><a href="contact.php">Contact Us</a></li>
												</ul>

								<div id="form">
									<form method="GET" action="results.php" enctype="multipart/enctype">
										<input type="text" name="user_query" placeholder="Search">
										<input type="submit" name="search" value="submit">
									</form> 
								</div>

										</div>
										<!--Navigatiob Bar ENDS-->

										<!--Content STARTS-->
										<div class="content_wrapper">

											<div id="left_sidebar">

												<div id="sidebar_title">Categories</div>

													<ul id="cats">
													
															<?php
															getCategory();
															?>		

															<!-- 
															<li><a href="#">Laptops</a></li>
															<li><a href="#">Mobiles</a></li>
															<li><a href="#">Cameras</a></li>
															<li><a href="#">Tables</a></li>
															<li><a href="#">DSLR</a></li>
															<li><a href="#">Desktops</a></li>
															<li><a href="#">I-pad</a></li> -->
														</ul> 

												<div id="sidebar_title">Brands</div>	

													<ul id="cats">

															<?php
															getBrands();
															?>

														<!--	<li><a href="#">Apple</a></li>
															<li><a href="#">Motorolla</a></li>
															<li><a href="#">Lenovo</a></li>
															<li><a href="#">Nokia</a></li>
															<li><a href="#">HP</a></li>
															<li><a href="#">Sony</a></li>
															<li><a href="#">Dell</a></li> -->
														</ul>

												</div>


											<div id="right_content">
												<?php
												 Cart(); 

												 echo $ip_add=getRealIpAddress();
												 ?>
												
													<div id="headline">

														<div id="headline_content">
															<b>Welcome Guest</b>
															<b style="color:yellow;">Shopping Cart</b>
															<span>- Total Items:  <?php Items(); ?> - Total Price: <?php total_price(); ?> <a href= "cart.php" style="color:yellow">Go to Cart</a></span>
														</div>



											</div>

											<?php
											echo getRealIpAddress();
											?>

														<div id="products_box">

																<?php 

																if(!isset($_SESSION['customer_email']))
																{

																		include("Customers/customer_login.php");

																}

																else

																{


																	include("Customers/payment_options.php");
																}

																 ?>



														</div>



											</div>
										<!--Content STOPS-->
										 		




										<!--Footer STARTS-->
										<div class="footer">
											
													<h1 style="color:#000;padding-top:30px;text-align: center;">&copy 2018 - By Abhishek Mittal</h1>

										</div>
										<!--Footer STOPS-->

								</div>


								</body>
								</html>