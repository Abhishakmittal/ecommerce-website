
<?php
@session_start();

include("Includes/Database.php");
?>


<div>



<form action="checkout.php" method="POST">

	<table width="600" bgcolor="grey" align="center">


		<tr>
			<td><h2>Login Or Register</h2></td>
		</tr>

	<tr>
		<td><b>Your email:</td></b>
			<td><input type= "text" name="c_email" value="Enter your email"></td>
	</tr>

	<tr>
		<td><b>Your password:</b></td>
	<td><input type="password" name="c_pass" value="Enter your password"></td>
	</tr>


	<tr align="center">
		<td colspan="4"><a href="forgot_pass.php">Forgot Password</a></td>
	</tr>

	<tr align="center">
		<td colspan="4"><input type="Submit" name="c_login" value="Login"></td>
	</tr>

	<tr align="center">
		<td colspan="4"><h2 style="float:right; padding:10px" ><a href="customer_register.php"> Register </a></h2> </td>
	</tr>



</table>
</form>




</div>




<?php

if(isset($_POST['c_login'])){


	$customer_email= $_POST['c_email'];
	$customer_pass= $_POST['c_pass'];

	$sel_customer="SELECT * from Customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer=  mysqli_query($con, $sel_customer);

	if(mysqli_num_rows($run_customer)>0)
{

		

		$_SESSION['customer_email']= $customer_email;

		echo "<script>window.open('index.php','_self')</script>";


}

else{

	echo "<script>alert('Email or Password wrong. Try again')</script>";
}

}


?>