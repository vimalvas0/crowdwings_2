<?php 

// Get the updated JSON
$requestPayload = file_get_contents('php://input');


// Store it into newObj (JSON)
$newObj = $requestPayload;


// make it pushable to array, name it arrObj (ARRAY)
$arrObj = json_decode($newObj, true, 5);


// Get db as current_db (JSON)
$current_db = file_get_contents('../db/posts.json');



// make it array, name it current_db_array (ARRAYS)
$current_db_array = json_decode($current_db, true, 5);


// Find this array in the current_db_array and then replace it
foreach($current_db_array as $index => $value)
{
	if($value['id'] == $arrObj['id'])
	{
		unset($current_db_array[$index]);
	}
}

array_unshift($current_db_array, $arrObj);
$new_db_json = json_encode($current_db_array, JSON_PRETTY_PRINT);



// Update the original db
if(file_put_contents('../db/posts.json', $new_db_json))
{
	echo 'Db updated';
}
else
{
	echo 'Db update failed...';
}

// echo '<pre>';
// print_r($arrObj);
// echo '</pre>';


?>