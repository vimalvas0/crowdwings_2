<?php 

// Get the updated JSON
$requestPayload = file_get_contents('php://input');

// Store it into newObj (JSON)
$query = $requestPayload;

// Get db as current_db (JSON)
$current_db = file_get_contents('../db/posts.json');

// make it array, name it current_db_array (ARRAYS)
$current_db_array = json_decode($current_db, true, 5);

$noOfResult = 0;


$query_array = explode(" ", $query);

$result = [];

foreach($current_db_array as $key => $value)
{

	foreach($query_array as $query1)
	{

		if(preg_match("/$query1/i", $value['ques']))
		{
			$result[] = $value;
			break;
		}
	}
}



if(empty($result))
{
	$result[] = [
		"empty" => true
	];
}


$finalResult = json_encode($result, JSON_PRETTY_PRINT);

echo $finalResult;


?>
