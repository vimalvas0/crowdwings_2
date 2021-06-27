<?php require "../methods/functions.php"; ?>

<?php

$users = getAllUsers();

if((isset($_POST['Username'])) && isset($_POST['Password']))
{
	if($_POST['Username'] == "" && $_POST['Password'] == "")
	{
		header('Location: ../../login/login.php?error=3');
		exit();
	}
	$username= $_POST['Username'];
	$password = $_POST['Password'];

	$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
	$salt = '$thisiscrowdwingstobeginwith$';
	$hashType = $hashFormat . $salt;
	$hashPassword = crypt($password, $hashType);


	while($row = mysqli_fetch_assoc($users))
	{
		if($row['username'] == $username && $row['password'] == $hashPassword)
		{
			// echo 'UserExists <br>';
			// echo "Name : " . $row['name'];
			echo 'Yes';
			$user = $row;
			break;
		}
	}

	if(!isset($user))
	{
		// echo "User not found";
		header('Location: ../../login/login.php?error=2');
		exit();
	}


	$USERNAME  = $user['username'];
	$NAME = $user['name'];
	$EMAIL = $user['email'];

	// If no error -> start the session, set the variables and redirect to index page
	session_start();

	$_SESSION['logedin'] = true;
	$_SESSION['username'] = $USERNAME;
	$_SESSION['name'] = $NAME;
	$_SESSION['email'] = $EMAIL;
	$_SESSION['message'] = 'Hi, ' . explode(" ", $user['name'])[0];

	header('Location: ../../homepage/index.php');

}
else
{
	header('Location: ../../login/login.php?error=1');
}

?>