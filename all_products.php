<?php

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
												
													<div id="headline">

														<div id="headline_content">
															<b>Welcome Guest</b>
															<b style="color:yellow;">Shopping Cart</b>
															<span>- Items: - Price: </span>
														</div>



											</div>

														<div id="products_box">

																<?
																$get_product_query= "SELECT * FROM Products";
														$result= mysqli_query($con,$get_product_query);

														while($row=mysqli_fetch_array($result))
														{
															$prod_id=$row['Product_id'];
															$prod_title= $row['Product_title'];
															$prod_brand= $row['Brand_id'];
															$prod_price= $row['Product_price'];
															$prod_description= $row['Product_description'];
															$prod_image1=$row['Product_img1'];
															

															echo "
															<div id='single_product'>

															<h3>$prod_title </h3>
															<img src='admin_area/product_images/$prod_image1' width='180' height='180'/>
															Rs.$prod_price

															<a href='details.php?pro_id=$prod_id' style=float:left;'>Details</a>
															<a href='index.php?add_cart=$prod_id'><button>Add to cart</button></a>


															</div>
																	";




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