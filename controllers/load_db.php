<?php 

// Get all the data in db/posts.json

$data = file_get_contents('../db/posts.json');

echo $data;

?>