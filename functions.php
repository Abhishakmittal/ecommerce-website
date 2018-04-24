<?


$db= mysqli_connect("localhost","root","","myshop");

global $db;


// function for getting ip address

function getRealIpAddress(){

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 //check for ip from share internet
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 // Check for the Proxy User
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}
return $ip;
}


//creating cart

function Cart(){


if(isset($_GET['add_cart']))
{

	global $db;


	$ip_add= getRealIpAddress();
	$p_id= $_GET['add_cart'];
	$check_pro="Select * from Cart where ip_add='$ip_add' AND p_id='$p_id'";
	$run_check= mysqli_query($db,$check_pro);

	if(mysqli_num_rows($run_check)>0){

		echo ""; //means it will get refereged and nothing will be added
	}
	else{

		$q= "INSERT into Cart (p_id,ip_add) values ('$p_id','$ip_add')";

		$run_q=mysqli_query($db,$q);

		echo "<script>windows.open('index.php','_self')</script>";
		}

}



				}


//getting the number of utems from the cart

function Items(){


if(isset($_GET['add_cart']))

   {

	global $db;

	$ip_add= getRealIpAddress();

	$get_items= "SELECT * from Cart where ip_add='$ip_add'";

	$run_items=mysqli_query($db,$get_items);

	$count_items= mysqli_num_rows($run_items);


	}

	else
	{
		$ip_add= getRealIpAddress();

	global $db;

	$get_items= "SELECT * from Cart where ip_add='$ip_add'";

	$run_items=mysqli_query($db,$get_items);

	$count_items= mysqli_num_rows($run_items);

	}


     echo "$count_items";


				}




//getting total price of items from cart

				function total_price() {

						$ip_add= getRealIpAddress();

						global $db;


						$total= 0;

						$sel_price= "SELECT * from Cart where ip_add='$ip_add'";

						$run_price= mysqli_query($db, $sel_price);

						while($record=mysqli_fetch_array($run_price))
						{

							$pro_id= $record['p_id'];
							$pro_price="Select * from Products where Product_id='$pro_id'";
							$run_pro_price= mysqli_query($db,$pro_price);
							while($p_price=mysqli_fetch_array($run_pro_price)) {

								$Product_price = array($p_price['Product_price']);

								$values= array_sum($Product_price);

								$total +=$values;


							}

						}

								echo "Rs." .$total;

				}




//getting products display


function getProduct()
{
		global $db;


					if(!isset($_GET['category'])){

						if(!isset($_GET['brand'])){



	
								$get_product_query= "SELECT * FROM Products order by rand() LIMIT 0,5";
								$result= mysqli_query($db,$get_product_query);

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

							}
						}

								 
}




// getting category products

function getCategoryProduct()
{
		global $db;


					if(isset($_GET['category'])){

						$category_id= $_GET['category'];

						


	
								$get_category_product= "SELECT * FROM Products where category_id='$category_id'";
								$result= mysqli_query($db,$get_category_product);

								$count=mysqli_num_rows($result);

								if($count==0){

									echo "<h2>Product not found for this category<h2>";
								}

								while($row_category_product=mysqli_fetch_array($result))
								{
									$prod_id= $row_category_product['Product_id'];
									$prod_title= $row_category_product['Product_title'];
									$prod_brand= $row_category_product['Brand_id'];
									$prod_price= $row_category_product['Product_price'];
									$prod_description= $row_category_product['Product_description'];
									$prod_image1=$row_category_product['Product_img1'];
									

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

							}
						

								 
}


//getting the pbrands to display

function getBrands()
{
global $db;

$query= "SELECT * from Brands";
$result= mysqli_query($db,$query);

while($rows=mysqli_fetch_array($result)){

	$brand_id = $rows['Brand_id'];
	$brand_title=$rows['Brand_title'];

	echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
}



}




//getting brands product

function getBrandProduct()
{
		global $db;


					if(isset($_GET['brand'])){

						$brand_id= $_GET['brand'];

						


	
								$get_brand_product= "SELECT * FROM Products where brand_id='$brand_id'";
								$result= mysqli_query($db,$get_brand_product);

								$count=mysqli_num_rows($result);

								if($count==0){

									echo "<h2>Product not found for this brand<h2>";
								}

								while($row_brand_product=mysqli_fetch_array($result))
								{
									$prod_id= $row_brand_product['Product_id'];
									$prod_title= $row_brand_product['Product_title'];
									$prod_brand= $row_brand_product['Brand_id'];
									$prod_price= $row_brand_product['Product_price'];
									$prod_description= $row_brand_product['Product_description'];
									$prod_image1=$row_brand_product['Product_img1'];
									

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

							}
						

								 
}



//getting categories to display

function getCategory()
{

	global $db;

$query= "SELECT * from Categories";
$results= mysqli_query($db, $query);

while($rows=mysqli_fetch_array($results)){

	$category_id= $rows['Category_id'];
	$category_title=$rows['Category_title'];

	echo "<li><a href='index.php?category=$category_id'>$category_title</a></li>" ;
}


					
}


?>