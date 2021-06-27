<?php require '../methods/functions.php';


if(isset($_POST['Username']) && isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password']))
{


	if($_POST['Username'] == "" || $_POST['Name'] == "" || $_POST['Email'] == "" || $_POST['Password'] == "" || $_POST['Confirm-Password'] == "")
	{
		header('Location : ../../signup/signup.php?error=3');
	}

	$username = $_POST['Username'];
	$fullname = $_POST['Name'];
	$email  = $_POST['Email'];
	$password = $_POST['Password'];
	$confirm_password = $_POST['Confirm-Password'];


	if($password != $confirm_password)
	{
		echo "Passwords do not match";
		header('Location : ../../signup/signup.php?error=2');
		exit();
	}

	// Hash the password
	$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
	$salt = '$thisiscrowdwingstobeginwith$';
	$hashType = $hashFormat . $salt;
	$hashPassword = crypt($password, $hashType);

	echo "$username <br>";
	echo "$fullname <br>";
	echo "$email <br>";
	echo "$hashPassword <br>";

	createUser($username, $fullname, $email, $hashPassword);
	header('Location: ../../login/login.php?newacc=yes');
	exit();

}else
{
	header('Location : ../../signup/signup.php?error=1');
	exit();
}


?>