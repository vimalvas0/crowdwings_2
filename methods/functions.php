<?php

	require "../db/db.php";

?>


<?php 

	function createUser($username, $name, $email, $password)
	{
		global $connection;


		$pretopics = "";

		if($connection) echo'Connection exists...';

		$query = "INSERT INTO users (username, name, email, password, pretopics) ";
		$query .= "VALUES ('$username', '$name', '$email', '$password', '$pretopics') ";

		$result = mysqli_query($connection, $query);


		if($result)
		{
			echo "User is created... <br>";
			// Header
		}
		else{
			die('Action FAILED : ' . mysqli_error($connection));
		}
	}


	function getAllUsers()
	{
		global $connection;	

		$query = "SELECT * FROM users";
		$result =  mysqli_query($connection, $query);


		return $result;
	}


	function savePost($tempArr)
	{
		$jsonFile = file_get_contents('../db/posts.json');

		// print_r($jsonFile);

		$decodedJson = json_decode($jsonFile, true, 5);

		// print_r($decodedJson);

		array_unshift($decodedJson, $tempArr);

		$newJson = json_encode($decodedJson, JSON_PRETTY_PRINT);


		file_put_contents('../db/posts.json', $newJson);
	}

?>