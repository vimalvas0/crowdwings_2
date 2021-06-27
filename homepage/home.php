

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home | Crowd Wings</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./../main.css">
	<link rel="stylesheet" href="home_style.css?v=1.0">
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


		<?php 
		if($login)
		{
			echo '<a id="nav-account" href="#">
				<img src="../circle.svg"/>
				<span class="username">' . $message . '</span>
			</a>
			<ul class="account-dropdown">
				<li><a href="#">Settings</a></li>
				<li><a href="#">Log out</a></li>
			</ul>'
		}	

		?>
	</nav>

	<div class="error">
		<h1>Please Log in if you want to share your opinion with other people</h1>
	</div>

	<div id="left-bar">
		<div id="auth-option">
			<a href="#">Login</a>
			<span> OR</span>
			<a href="#">Sign up</a>
		</div>
		<div id="related-topics">
			<h1>Related topics</h1>
			<ul>
				<li><a href="#"><img src="../circle.svg"></img><span>Politics</span></a></li>
				<li><a href="#"><img src="../circle.svg"></img><span>Sports</span></a></li>
				<li><a href="#"><img src="../circle.svg"></img><span>Computer Science</span></a></li>
				<li><a href="#"><img src="../circle.svg"></img><span>World</span></a></li>
				<li><a href="#"><img src="../circle.svg"></img><span>Space</span></a></li>
				<li><a href="#"><img src="../circle.svg"></img><span>Mathematics</span></a></li>
			</ul>
		</div>
	</div>

	<div id="search-bar">
		<input type="text" placeholder="Search...">
	</div>
	<div id="ques-area">
		<!-- <div id="101" class="ques-box">
			<div class="ques-info">
				<img src="../circle.svg"></img>
				<span class="name"><a href="#">Samarth Garg</a></span>
				<span class="date">15 january</span><br>
				<span class="status">Student</span>
			</div>
			<h1 class="ques">Which operating systerm is ideal for programming</h1>
			<span class="totatVotes"></span>
			<div class="ques-options">
				<label id="0" class="choice">Windows</label>
				<label id="1" class="choice">MacOS</label>			
				<label id="2" class="choice">linux</label>
				<label id="3" class="choice">Other</label>
			</div>
			<div class="ques-l-c">
				<a href="#"><i class="fas fa-thumbs-up"></i></a>
				<a href="#"><i class="fas fa-comments"></i></a>
			</div>
			<div class="comment-section">
				<form class="create-comment">
					<input type="text" name="comment">
					<button type="submit">Comment</button>
				</form>
				<div class="comments">
					<hr>
					<div class="comment">
						<div class="comment-info">
							<img src="../circle.svg">
							<p class="username">Username</p>
							<p class="time">12:31 AM</p>
						</div>
						<p class="comment-text">The comment made by the user.</p>
					</div>
				</div>
			</div>
		</div> -->
	</div>


	<script type="text/javascript" src="main.js"></script>
	<script type="text/javascript">
		// let posts = getAllPosts();
		// console.log(posts);
	</script>
</body>
</html
