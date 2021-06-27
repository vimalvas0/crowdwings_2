<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log in | Crowd Wings</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./../main.css">
	<link rel="stylesheet" href="login_style.css?v=1.0">
</head>
<body>
	<nav>
		<a href="../homepage/index.php" class="heading1">Crowd Wings</a>
		
		<h3>Not a member already?</h3>
		<a class="signup" href="../signup/signup.php">Sign up</a>
	</nav>
	<div id="under-nav"></div>

	<div id="login-header">
		<h1>Almost there...</h1>
		<h2>35%</h2>
	</div>

	<?php
	if(isset($_REQUEST['error']))
	{
		$error = $_REQUEST['error'];
		if($error == 1)
		{
			$message = "Could not process credentials. INTERNAL ERROR.";
		}
		elseif($error == 2)
		{
			$message = "Username or password in incorrect. Try again...";
		}
		elseif($error == 3)
		{
			$message = "Username or password fields cannot be empty";
		}else
		{
			$message = "ERROR. TRY LATER....";
		}

		echo '<div id="error-box">
		<p>'. $message . '</p>
		</div>';
	}

	if(isset($_REQUEST['newacc']))
	{
		echo '<div id="congo-box">
		<p>'. "Your account is made successfully." . '</p>
		<p>You can login to continue</p>
		</div>';
	}

	?>
		<div id="login-box">
		<form action="../controllers/login.php/" method="post">
			<label>Email or username:</label>
			<input type="text" name="Username" placeholder="Email or username">
			<label>Password:</label>
			<input type="password" name="Password" placeholder="Password">
			<button type="submit">Log in</button>
		</form>
	</div>

</body>
</html