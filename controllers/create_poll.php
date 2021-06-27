<?php



// [
//     "username"=> "",
//     "id"=> ,
//     "image"=> "",
//     "profile_link"=> "",
//     "date"=> "",
//     "status"=> "",
//     "likes"=> [
//     ],
//     "votedby"=> [
        
//     ],
//     "ques"=> "Which is the best programming language for machine learning",
//     "ques_options"=> [
//         [
//             "choice"=> "Java",
//             "id"=> 0,
//             "votes"=> 3
//         ],
//         [
//             "choice"=> "Python",
//             "id"=> 1,
//             "votes"=> 6
//         ],
//         [
//             "choice"=> "Javascript",
//             "id"=> 2,
//             "votes"=> 4
//         ],
//         [
//             "choice"=> "C\/C++",
//             "id"=> 3,
//             "votes"=> 3
//         ],
//         [
//             "choice"=> "C#",
//             "id"=> 4,
//             "votes"=> 2
//         ],
//         [
//             "choice"=> "Other",
//             "id"=> 5,
//             "votes"=> 2
//         ]
//     ],
//     "comments"=> [
//     ],
		// "topics" => ""
// ]


// Fetch the question
$ques = $_POST['ques'];


// Get topics
$topics =  $_POST['topics'];

//Find out username
$dummyUsername = 'user123';
$username = $dummyUsername;

//Find unique id
$id= md5(uniqid($username, true));

// Calculate the date 
$today = date("F j, Y, g:i a");
$datearr = explode(',', $today);
$date = $datearr[0] . $datearr[1];


// Format in which a poll will be made : 
$data = [
	"username"=> $username,
    "id"=> $id,
    "image"=> "",
    "profile_link"=> "",
    "date"=> "$date",
    "status"=> "",
    "likes"=> [
    ],
    "votedby"=> [],
    "ques"=> $ques,
    "ques_options" => [],
    "comments"=> [
    ],
    "topics" => explode(' ', $topics)
];

$i = 1;
while(isset($_POST["Choice$i"]))
{
	$data['ques_options'][] = ['choice'=> $_POST["Choice$i"], 'id' => $i-1, 'votes' => 0];
	$i++;
}

$jsonData = json_encode($data, JSON_PRETTY_PRINT);


// push this code to current db

// Get db as current_db (JSON)
$current_db = file_get_contents('../db/posts.json');

// make it array, name it current_db_array (ARRAYS)
$current_db_array = json_decode($current_db, true, 5);

array_unshift($current_db_array, $data);
$new_db_json = json_encode($current_db_array, JSON_PRETTY_PRINT);

// Update the original db
if(file_put_contents('../db/posts.json', $new_db_json))
{
	header('Location: ../homepage/index.php');
}
else
{
	echo 'Db update failed...';
}

array_unshift


?>