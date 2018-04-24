<?php

include("Includes/Database.php");

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert product</title>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
		tinymce.init({selector:'textarea'});
</script>
</head>

<body bgcolor="grey">


<form method="POST" action="insert_product.php" enctype="multipart/form-data">

	<table width="700" align="center" border="1" bgcolor="#006699">

		<tr>

			<td colspan="2" align="center"><H2>Insert new product:</H2></td>

		</tr>

		<tr>
				<td align="right"><b>Product Title</b></td>
			<td><input type="text" name='product_title' placeholder="Name" size="50"></td>

		</tr>

		<tr>
				<td align="right"><b>Product Category</b></td>
			<td><select name='product_category'>
					<option>Select a Category</option>
<?php

$query= "SELECT * from Categories";
$results= mysqli_query($con, $query);

while($rows=mysqli_fetch_array($results)){

	$category_id= $rows['Category_id'];
	$category_title=$rows['Category_title'];

	echo "<option value='$category_id'>$category_title</option>";

}

?>



			</select>

			</td>

		</tr>

		<tr>
					<td align="right"><b>Product Brand</b></td>
			<td> <select name='product_brand'>
				<option>Select a category</option>


<?php

$query= "SELECT * from Brands";
$results= mysqli_query($con,$query);

while($rows=mysqli_fetch_array($results)){

	$brand_id= $rows['Brand_id'];
	$brand_title=$rows['Brand_title'];

echo "<option value='$brand_id'>$brand_title</option>";
}

?>


				
			</select> 
		</td>

		</tr>

		<tr>
					<td align="right"><b>Product Image 1</b></td>
			<td><input type="file" name='product_img1'></td>

		</tr>

		<tr>
					<td align="right"><b>Product Image 2</b></td>
			<td><input type="file" name='product_img2'></td>

		</tr>

		<tr>
					<td align="right"><b>Product Image 3</b></td>
			<td><input type="file" name='product_img3'></td>

		</tr>

		<tr>
					<td align="right"><b>Product Price</b></td>
			<td><input type="text" name='product_price' placeholder="Price" size="50"></td>

		</tr>

		<tr>
					<td align="right"><b>Product Description</b></td>
			<td><textarea name='product_description' cols= "40" rows="20"placeholder="Description" size="50">
				
			</textarea></td>

		</tr>

		<tr>
					<td align="right"><b>Product Keywords</b></td>
			<td><input type="text" name='product_keyword' placeholder="Product keyword" size="50"></td>

		</tr>

		<tr>

			<td colspan="2" align="center"><input type="Submit" name='insert_product' value="Insert"></td>

		</tr>



	</table>
</form>
</body>

</html>

<?php


if(isset($_POST['insert_product']))

			{
			//text data variables
				$product_title= $_POST['product_title'];
				$product_category= $_POST['product_category'];
				$product_brand= $_POST['product_brand'];
				$product_price= $_POST['product_price'];
				$product_description= $_POST['product_description'];
				$product_keyword= $_POST['product_keyword'];
				$insert_product=$_POST['insert_product'];
				$status= 'on';

			//image names

				$product_img1= $_FILES['product_img1']['name'];
				$product_img2= $_FILES['product_img2']['name'];
				$product_img3= $_FILES['product_img3']['name'];

			//tmp names image
				$temp_name1= $_FILES['product_img1']['tmp_name'];
				$temp_name2= $_FILES['product_img2']['tmp_name'];
				$temp_name3= $_FILES['product_img3']['tmp_name'];

						if(empty($product_title)||empty($product_category)||empty($product_brand)||empty($product_price)||
							empty($product_description)||empty($product_keyword)||empty($product_img1))
							
								{
									  echo  "<script>alert('Enter something!')</script>";
								}

								else
								{


										 move_uploaded_file($temp_name1, "Product_images/$product_img1");
										 move_uploaded_file($temp_name2, "Product_images/$product_img2");
										 move_uploaded_file($temp_name3, "Product_images/$product_img3");

											$insert_query = "Insert into Products 
											(Category_id,Brand_id,Date,Product_title,Product_img1,Product_img2,Product_img3,Product_price,
												Product_description,Status) values ('$product_category','$product_brand',NOW(),'$product_title','$product_img1',
											'$product_img2','$product_img3','$product_price','$product_description','$status') ";


											$result=mysqli_query($con, $insert_query);

															if($result){

																		echo "<script>alert('Product inserted successfully')</script>";
																		}		
							
								}


						
			}

?>