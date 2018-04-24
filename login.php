<?  



$con= mysqli_connect("localhost","root","","task_admin");

if(!$con){

	die("Connection unsuccussful");
}

else{

	echo "Ok";
}



if(isset($_POST['login']))

{

	$username=$_POST['username'];
	$password=$_POST['password'];

	if(empty($username)||empty($password))

	{

		echo "<script>alert('Enter something')</script>";
	}

		else{

		$query="INSERT into users(username,password) values('$username','$password')";
		$result = mysqli_query($con,$query);

						if($query=$username AND $query=$password)
							{

							echo "<script>alert('You have been logged in')</script>";
							}

						else{

							echo "<script>alert('Invalid credentials')</script>";
							}

			}


}




		














?>



<!DOCTYPE HTML>
<html>
<head>
	
</head>

<body>

<div class="body"> </div>

<form action=task.php method="POST">
	Username:<input type="text" placeholder="username" name="username"><br>
	Password:<input type="text" placeholder="password" name="password"><br>
	<input type="submit" value="Login" name="login"> 
	<a href='register.php'> <button>Register</button> </a>

	


	
	
</form>
</body>
</html>