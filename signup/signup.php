<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign up | Crowd Wings</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./../main.css">
	<link rel="stylesheet" href="signup_style.css?v=1.0">
</head>
<body>
	<nav>
		<a href="../homepage/index.php" class="heading1">Crowd Wings</a>
		
		<h3>Already a member?</h3>
		<a class="login" href="../login/login.php">Log in</a>
	</nav>
	<div id="under-nav"></div>

	<div id="login-header">
		<h1>Join now</h1>
		<h2>It's Free!</h2>
	</div>


	<?php
	if(isset($_REQUEST['error']))
	{
		$error = $_REQUEST['error'];
		if($error == 1)
		{
			$message = "Could not process credentials. INTERNAL ERROR!";
		}
		elseif($error == 2)
		{
			$message = "Passwords do not match!";
		}
		elseif($error == 3)
		{
			$message = "Any of field cannot be empty!";
		}else
		{
			$message = "ERROR. TRY LATER....";
		}

		echo '<div id="error-box">
		<p>'. $message . '</p>
		</div>';
	}

	?>

	<div id="login-box">
		<form action="../controllers/signup.php/" method="post">
			<label>Create your username:</label>
			<input type="text" name="Username" placeholder="Username">
			<label>Enter your name:</label>
			<input type="text" name="Name" placeholder="Your Full Name">
			<label>Enter your email:</label>
			<input type="text" name="Email" placeholder="Email">
			<label>Create your password:</label>
			<input type="password" name="Password" placeholder="Password">
			<label>Confirm your password:</label>
			<input type="password" name="Confirm-Password" placeholder="Confirm Password">
			<button type="submit">Sign Up</button>
		</form>
	</div>

</body>
</html