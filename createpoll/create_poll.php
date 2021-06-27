<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create new Poll | Crowd Wings</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./../main.css">
	<link rel="stylesheet" href="./../homepage/home_style.css">
	<link rel="stylesheet" href="create_poll_style.css?v=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
	<nav>
		<h1><a href="#">Crowd Wings</a></h1>
		<ul class="nav-buttons">
			<li><a href="#"><i class="fas fa-home"></i></a></li>
			<li><a href="#"><i class="fas fa-book"></i></a></li>
			<li><a href="#"><i class="fas fa-bell"></i></a></li>
			<li><a href="#"><i class="fas fa-plus"></i></a></li>
		</ul>
		<a id="nav-account" href="#">
			<img src="../circle.svg"/>
			<span class="username">Dummy</span>
		</a>
		<ul class="account-dropdown">
			<li><a href="#">Settings</a></li>
			<li><a href="#">Log out</a></li>
		</ul>
	</nav>

	<h1 class="heading1">Create new Poll</h1>
	<div id="create-poll-box">
		<form method="post" action="../controllers/create_poll.php">
			<label>Enter a Question:</label>
			<input type="text" name="ques" placeholder="Enter a Question..."><br>
			<label>Enter Poll Choices:</label>
			<div class="choices">
				<p>Choice 1</p>
				<input type="text" id="1" name="Choice1" placeholder="Choice..."><br>
				<p>Choice 2</p>
				<input type="text" id="2" name="Choice2" placeholder="Choice..."><br>
			</div>
			<a id="addChoice"><i class="fas fa-plus"></i></a>
			<button type="submit">Create Poll</button>
			<label>Put tags on it : </label>
			<input type="text" name="topics" placeholder="Make sure topics are seperated by spaces, e.g. computer-science geography etc."><br>
		</form>
	</div>



	<script type="text/javascript" src="./../homePage/main.js"></script>
	<script type="text/javascript" src="createPoll.js"></script>
</body>
</html
