<?php require "../methods/functions.php"; ?>



<?php 

if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Name']) && isset($_POST['Password']) && isset($_POST['Confirm-Password'])){

	if($_POST['Username'] =="" || $_POST['Email'] =="" || $_POST['Name'] =="" || $_POST['Password'] =="" || $_POST['Confirm-Password'] ==""){
		header('Location: ../../signup/signup.php?error=3');
	}

	$username = $_POST['Username'];
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$confirm_pass = $_POST['Confirm-Password'];

	if($password === $confirm_pass)
	{
		$hashFormat = "$2a$10";    // Check Documentation - Blowfish function
		$salt = '$thisiscrowdwingstobeginwith$';
		$hashType = $hashFormat . $salt;
		$hashPassword = crypt($password, $hashType);
	}else
	{
		header('Location: ../../signup/signup.php?error=2');
		die();
	}

	// echo $username . '<br>';
	// echo $name . '<br>';
	// echo $email . '<br>';
	// echo $hashPassword;

	createUser($username, $name, $email, $hashPassword);

	header('Location: ../../login/login.php?newacc=yes');

}else
{
	header('Location: ../../signup/signup.php?error=1');
	die();
}



?>