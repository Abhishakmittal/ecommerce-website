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

														<div id="products_box"><br>

															<form action="cart.php" 
															method="POST" enctype="multipart/form-data">
															
															<table width="780" align="center" bgcolor="skyblue">
																<tr align="center">
																	<td><b>Remove</b></td>
																	<td><b>Product(s)</b></td>
																	<td><b>Quantity</b></td>
																	<td><b>Total Price</b></td>
																</tr>


															<?php	
															
														
															$total= 0;

															$sel_price= "SELECT * from Cart where ip_add='$ip_add'";

															$run_price= mysqli_query($con, $sel_price);

															while($record=mysqli_fetch_array($run_price))
															{

																$pro_id= $record['p_id'];
																$pro_price="Select * from Products where Product_id='$pro_id'";
																$run_pro_price= mysqli_query($con,$pro_price);
																while($p_price=mysqli_fetch_array($run_pro_price)) {

																	$Product_price = array($p_price['Product_price']);
																	$Product_title= $p_price['Product_title'];
																	$Product_image=$p_price['Product_img1'];
																	$only_price=$p_price['Product_price'];

																	$values= array_sum($Product_price);

																	$total +=$values;


																

															

																	

																	?>

																<tr>
																	<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" > </td>
																	<td><?php echo $Product_title; ?><br> 
																		<img src="Admin_area/Product_images/<?php echo
																		$Product_image;?>"" height="100" width="100"></td>
																	<td><input type="text" name="qty" value="1" size="5"</td>
																	<td><?php echo $only_price; ?></td>
																</tr>


																<<?php 

																}

																} ?>

																<tr align="right">
																	<td colspan="5"><b> Sub total</b></td>
																	<td><b><?php echo "Rs.".$total; ?></b></td>
																</tr>
																



																
																	<tr></tr>
																	<tr></tr>
																	<tr></tr>
																	<tr></tr>
																	<tr></tr>
																	<tr>
																	<td colspan="2"><input type="Submit" name="update" value="Update"></td>
																	<td colspan="2"> <input type="Submit" name="continue" value="Continue Shopping"></td>
																	<td colspan="3"><button><a href="checkout.php">Checkout</a></button></td>
																</tr>






																	</table>

																</form>


															
																
														</div>



											</div>
										<!--Content STOPS-->
										 		




										
									
								</div>


								</body>
								</html>