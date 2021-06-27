<?php 

if($_POST['query'])
{

	// Get db as current_db (JSON)
	$current_db = file_get_contents('../db/posts.json');


	// make it array, name it current_db_array (ARRAYS)
	$current_db_array = json_decode($current_db, true, 5);
	$noOfResult = 0;


	$query_array = explode(" ", $_POST['query']);

	$result = '<ul id="list-unstyled">';
	foreach($current_db_array as $key => $value)
	{

		foreach($query_array as $query)
		{

			if(preg_match("/$query/i", $value['ques']))
			{
				$result .= '<li>' . $value['ques'] . '</li>';
				$noOfResult++;
				break;
			}
		}
	}

	if($noOfResult == 0)
	{
		$result .= 	'<li><b>' . "NO RESULT FOUND" . '</b></li>';
	}


	$result .= '</ul>';

	echo $result;

}
else
{
	exit();
}


?>