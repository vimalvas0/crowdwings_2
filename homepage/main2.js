// let data = [
// 	{
// 		username:"ayush123",
// 		id:101,
// 		image:"../circle.svg",
// 		profile_link:"#",
// 		date:"14 january",
// 		status:"Student",
// 		likes:[
// 			"Samarth",
// 			"Vimal",
// 			"Gamer",
// 			"Ninja",
// 			"Chris",
// 			"John"
// 		],
// 		comment:0,
// 		votedby:["Gamer","Vimal","Chris"],
// 		ques:"When do think covid-19 cases will start declining?",
// 		ques_options:[
// 			{
// 				choice:"In April",
// 				id:0,
// 				votes:2
// 			},
// 			{
// 				choice:"In May-July",
// 				id:1,
// 				votes:5
// 			},
// 			{
// 				choice:"In August-October",
// 				id:2,
// 				votes:6
// 			},
// 			{
// 				choice:"Even later(comment)",
// 				id:3,
// 				votes:1
// 			}
// 		],
// 		comments:[
// 			{
// 				username:"ab123",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"12:24 AM",
// 				comment:"Looking at the current daily cases NOT SOON!"
// 			},
// 			{
// 				username:"coder",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:24 AM",
// 				comment:"If the variant is like before it could start declining in August-October."
// 			},
// 			{
// 				username:"Gamer202",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:35 AM",
// 				comment:"In May-July, I hope so."
// 			},
// 			{
// 				username:"code-007",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:40 AM",
// 				comment:"It is dependent on various factors so cannot be certain."
// 			},
// 			{
// 				username:"john404",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:50 AM",
// 				comment:"The new Variant is more deadly so not very soon I think."
// 			},
// 			{
// 				username:"anoynmous321",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"2:00 AM",
// 				comment:"I think in late June or July."
// 			}
// 		]
// 	},
// 	{
// 		username:"vimalvas03",
// 		id:102,
// 		image:"../circle.svg",
// 		profile_link:"#",
// 		date:"14 April",
// 		status:"Trainee",
// 		likes:[
// 			"Samarth",
// 			"Vimal",
// 			"Gamer",
// 			"Ninja",
// 			"Chris",
// 			"John",
// 			"Ayush"
// 		],
// 		comment:0,
// 		ques:"Which is the best programming language for machine learning",
// 		ques_options:[
// 			{
// 				choice:"Java",
// 				id:0,
// 				votes:10
// 			},
// 			{
// 				choice:"Python",
// 				id:1,
// 				votes:20
// 			},
// 			{
// 				choice:"Javascript",
// 				id:2,
// 				votes:12
// 			},
// 			{
// 				choice:"C/C++",
// 				id:3,
// 				votes:7
// 			},
// 			{
// 				choice:"C#",
// 				id:4,
// 				votes:7
// 			},
// 			{
// 				choice:"Other",
// 				id:5,
// 				votes:3
// 			}
// 		],
// 		comments:[
// 			{
// 				username:"username",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"12:27 AM",
// 				comment:"Python is the best for machine learning!"
// 			},
// 			{
// 				username:"ayush123",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:24 AM",
// 				comment:"First one!"
// 			},
// 			{
// 				username:"Levi",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"1:33 AM",
// 				comment:"Which language would you recomment for starting with maching learning?"
// 			},
// 			{
// 				username:"abc312",
// 				profileLink:"#",
// 				ppic: "../circle.svg",
// 				time:"12:24 AM",
// 				comment:"For starters python is a good language for maching learning."
// 			}
// 		]
// 	}
// ]

// const currentUser = "Ayush";



function getAllPosts(username)
{
	var dbData;
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "../controllers/load_db.php", true);
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xhr.onreadystatechange = function()
	{
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			var data = JSON.parse(xhr.responseText);
			console.log(data);
			showPosts(data, true, username);
		}
	}

	xhr.send();
}


function updateData(updatedData)
{
	const stringData = JSON.stringify(updatedData);

	var xhr = new XMLHttpRequest();
	xhr.open('POST', '../controllers/saveCurrentConfig.php/', true);
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xhr.setRequestHeader('Content-type', 'application/json');

	xhr.onreadystatechange = function()
	{
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			console.log("Values updated");
		}
	}

	xhr.send(stringData);
}



// function updateData(updatedData)
// {
// 	const stringData = JSON.stringify(updatedData);

// 	var xhr = new XMLHttpRequest();
// 	xhr.open('POST', '../controllers/get_posts.php/', true);
// 	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
// 	xhr.setRequestHeader('Content-type', 'application/json');

// 	xhr.onreadystatechange = function()
// 	{
// 		if(xhr.readyState == 4 && xhr.status == 200)
// 		{
// 			console.log("Values updated");
// 		}
// 	}

// 	xhr.send(stringData);
// }


function showPosts(data, login, currentUser)
{
	// Making the dropdown list of account nav
	const navAccountBtn = document.getElementById("nav-account");
	const accountDropdown = document.getElementsByClassName("account-dropdown")[0];

	if(navAccountBtn)
	{
		navAccountBtn.addEventListener('click',() => {
			if(accountDropdown.style.display == "block"){
				accountDropdown.style.display = "none";
			}else{
				accountDropdown.style.display = "block";
			}
		});
	}
	

	// Calculating the total votes
	function totalVotes(qi){
		let totalvotes = 0;

		for(let i = 0; i<data[qi].ques_options.length;i++){
			totalvotes += parseInt(data[qi].ques_options[i].votes);
		}

		return totalvotes;
	}

	// Creating all the ques box from data

	const quesArea = document.getElementById("ques-area");

	for (var i = 0; i < data.length; i++) {
		let quesBox = document.createElement("div");
		quesBox.setAttribute("class","ques-box");
		quesBox.setAttribute("id",data[i].id);

		let quesInfo = document.createElement("div")
		quesInfo.setAttribute("class","ques-info");

		let img = document.createElement("img");
		img.setAttribute("src", data[i].image);
		quesInfo.appendChild(img);

		let name = document.createElement("span");
		name.setAttribute("class","name");
		let a = document.createElement("a");
		a.setAttribute("href",data[i].profile_link);
		a.innerText = data[i].username;
		name.appendChild(a);
		quesInfo.appendChild(name);

		let date = document.createElement("span");
		date.setAttribute("class","date");
		date.innerText = data[i].date;
		quesInfo.appendChild(date);

		let br = document.createElement("br");
		quesInfo.appendChild(br);

		let status = document.createElement("span");
		status.setAttribute("class","status");
		status.innerText = data[i].status;
		quesInfo.appendChild(status);

		quesBox.appendChild(quesInfo);

		let ques = document.createElement("h1");
		ques.setAttribute("class","ques");
		ques.innerText = data[i].ques;
		quesBox.appendChild(ques);

		let total_votes = document.createElement("span");
		total_votes.setAttribute("class","totalVotes");
		let tv = totalVotes(i);
		total_votes.innerText = tv + " votes";
		quesBox.appendChild(total_votes)

		let quesOptions = document.createElement("form");
		quesOptions.setAttribute("class", "ques-options");

		for(let j = 0; j < data[i].ques_options.length;j++){
			let choice = document.createElement("label");
			choice.className = "choice " + (data[i].ques_options[j].id).toString();
			choice.setAttribute("votes",data[i].ques_options[j].votes);
			choice.innerText = data[i].ques_options[j].choice;

			let radio = document.createElement("input");
			radio.setAttribute("type","radio");
			radio.setAttribute("name",data[i].id);
			radio.setAttribute("value",data[i].ques_options[j].choice);

			radio.className = "radio";
			choice.appendChild(radio);
		 	quesOptions.appendChild(choice);
		}

		let voteBtn = document.createElement("button");
		voteBtn.setAttribute("type","submit"); 
		voteBtn.className = "vote-btn";
		voteBtn.innerText = "Vote";
		quesOptions.appendChild(voteBtn);

		quesBox.appendChild(quesOptions);		

		let graph = document.createElement("canvas");
		graph.className = "graphs";

		quesBox.appendChild(graph);

		let queslc = document.createElement("div");
		queslc.setAttribute("class","ques-l-c");
		
		let thumbsUp = document.createElement("a");
		thumbsUp.className = "like-btn";

		let thi = document.createElement("i");
		thi.className = "fas fa-thumbs-up like-btn-symbol";
		thumbsUp.appendChild(thi);

		let thSpan = document.createElement("span");
		thSpan.setAttribute("class","likes");
		thSpan.innerText = `${data[i].likes.length} likes`;
		thumbsUp.appendChild(thSpan);

		queslc.appendChild(thumbsUp);

		let comment = document.createElement("a");
		comment.className = "open-comment-section";

		let ci = document.createElement("i");
		ci.setAttribute("class","fas fa-comments");
		comment.appendChild(ci);

		queslc.appendChild(comment);

		quesBox.appendChild(queslc);

		let commentSection = document.createElement("div");
		commentSection.className = "comment-section";

		let createComment = document.createElement("form");
		createComment.className = "create-comment";

		let commentInput = document.createElement("input");
		commentInput.setAttribute("type","text");
		commentInput.setAttribute("name","comment");
		createComment.appendChild(commentInput);

		let createCommentButton = document.createElement("button");
		createCommentButton.setAttribute("type","submit");
		createCommentButton.innerText = `Comment`;
		createComment.appendChild(createCommentButton);

		commentSection.appendChild(createComment);

		let comments = document.createElement("div");
		comments.className = "comments";

		for(let j = 0; j < data[i].comments.length;j++){
			let hr = document.createElement("hr");
			comments.appendChild(hr);

			let comment = document.createElement("div");
			comment.className = "comment";

			let commentInfo = document.createElement("div");
			commentInfo.className = "comment-info";

			let profileImg = document.createElement("img");
			profileImg.setAttribute("src",data[i].comments[j].ppic);
			commentInfo.appendChild(profileImg);

			let username = document.createElement("p");
			username.className = "username";
			username.innerText = data[i].comments[j].username;
			commentInfo.appendChild(username);

			let time = document.createElement("p");
			time.className = "time";
			time.innerText = data[i].comments[j].time;
			commentInfo.appendChild(time);

			comment.appendChild(commentInfo);

			let commentText = document.createElement("p");
			commentText.className = "comment-text";
			commentText.innerText = data[i].comments[j].comment;

			comment.appendChild(commentText);

			comments.appendChild(comment);
		}

		commentSection.appendChild(comments);

		quesBox.appendChild(commentSection);
		quesArea.appendChild(quesBox);
	}



	function addRandomStyle(elements){
		let colors = randomColor();
		for(let i = 0; i<elements.length-1;i++){
			elements[i].style.background = colors[i];
			elements[i].style.color = "black";
			elements[i].style.boxShadow = "";
			elements[i].style.border = `1px solid ${colors[i]}`;
		}
	}

	function selectedStyle(e){
		e.target.style.background = "var(--sred)";
		e.target.style.color = "white";
		e.target.style.boxShadow = "0px 0px 10px 4px var(--sred)";	
		e.target.style.border = "0px";
	}

	function userLikedIndex(i){
		let isLiked = null;
		for(let j = 0;j < data[i].likes.length;j++){
			if(data[i].likes[j] == currentUser){
				isLiked = j;
			}
		}
		return isLiked;
	}

	function searchData(object,id){
		let quesIndex = 0;
		for(let i = 0; i< object.length;i++){
			if(object[i].id == id){
				quesIndex = i;
			}
		}
		return quesIndex;
	}

	function randomColor(){
		let arr = ["#8AFF19","#00EAFF","#FFB321","#2475FF","#607D8B","#11FF21","#F84EFF"]

		var currentIndex = arr.length, temporaryValue, randomIndex;

	  	// While there remain elements to shuffle...
	  	while (0 !== currentIndex) {
		    randomIndex = Math.floor(Math.random() * currentIndex);
		    currentIndex -= 1;
		    temporaryValue = arr[currentIndex];
		    arr[currentIndex] = arr[randomIndex];
		    arr[randomIndex] = temporaryValue;
		}	
	  	return arr;
	}

	function changePolls(elements,qi){
		let total_votes = totalVotes(qi);

		for(let i = 0; i<data[qi].ques_options.length;i++){
			let votes = parseInt(data[qi].ques_options[i].votes);
			let newWidth = ((votes/total_votes) * 40).toString();
			elements[i].style.width = `${newWidth}em`
		}
	}

	const error = document.getElementsByClassName('error')[0];
	const errh1 = error.querySelector("h1");
	error.addEventListener('click', (e) => {
		if(e.target !== errh1){
			error.style.height = "0%";
		}	
	});

	// Chaning the polling by putting event listeners on quesboxes
	const quesBox = document.getElementsByClassName("ques-box");

	function wrapper(data,isLogedIn,currentUser){
		for(let i = 0;i<quesBox.length;i++){
			let choices = quesBox[i].childNodes[3].childNodes;

			//Adding styles and changing the polls before user interaction 
			addRandomStyle(choices);
			changePolls(choices,i);
			
			//Adding event listenerser on like button	
			let like_btn = document.getElementsByClassName("like-btn")[i];
			let likes = document.getElementsByClassName("likes")[i];
			let like_btn_symbol = document.getElementsByClassName("like-btn-symbol")[i];
			
			// Adding styles to like button if user is in array[] of likes 
			if(data[i].likes.indexOf(currentUser) > -1){
				likes.style.color = `var(--sred)`;
				like_btn_symbol.style.color = `var(--sred)`;
			}else{
				likes.style.color = `grey`;
				like_btn_symbol.style.color = `grey`;
			}

			//Adding event listener to like button
			like_btn.addEventListener('click', () => {
				if(isLogedIn){

					if(data[i].likes.indexOf(currentUser) > -1){
						data[i].likes.splice(data[i].likes.indexOf(currentUser),1);
						likes.innerText = `${data[i].likes.length} likes`;
						likes.style.color = `grey`;
						like_btn_symbol.style.color = `grey`;
						updateData(data[i]);
					}else{
						data[i].likes.push(currentUser);
						likes.innerText = `${data[i].likes.length} likes`;
						likes.style.color = `var(--sred)`;
						like_btn_symbol.style.color = `var(--sred)`;
						updateData(data[i]);
					}
				}else{
					error.style.height = "100%";
				}
			})

			// Adding event listener on comment button
			let openCommentSection = document.getElementsByClassName("open-comment-section")[i];
			let commentSection = document.getElementsByClassName("comment-section")[i];
			let commentSymmbol = openCommentSection.querySelector(".fa-comments");
			openCommentSection.addEventListener('click', () => {
				if(isLogedIn){
					if(	commentSection.style.display === "block"){
						commentSection.style.height = '0%';
						commentSection.style.display = "none";
						commentSymmbol.style.color = "grey";
					}else{
						commentSection.style.height = "auto";
						commentSection.style.display = "block";
						commentSymmbol.style.color = "var(--sred)";
					}
				}else{
					error.style.height = "100%";
				}
			})

			let quesOptions = document.getElementsByClassName("ques-options")[i];
			let voteBtn = document.getElementsByClassName("vote-btn")[i];

			if(data[i].votedby.indexOf(currentUser) > -1){
				voteBtn.disabled = true;
				voteBtn.style.cursor = "not-allowed";
			}else{
				voteBtn.disabled = false;
			}

			quesOptions.addEventListener("submit", (e) => {
				e.preventDefault();
				if(isLogedIn){
					let optionIndex = 0;
					if(data[i].votedby.indexOf(currentUser) > -1){
						
					}else{
						for(let j = 0;j<e.target.length;j++){
							if(e.target[j].checked){
								optionIndex = j;
							}
						}
						data[i].ques_options[optionIndex].votes += 1;
						data[i].votedby.push(currentUser);
						let tvSpan = document.getElementsByClassName("totalVotes")[i];
						tvSpan.innerText = `${totalVotes(i)} votes`; 

						voteBtn.disabled = true;
						voteBtn.style.cursor = "not-allowed";

						changePolls(choices,i);
						updateData(data[i]);
					}
				}else{
					error.style.height = "100%";
				}

			})

			for(j = 0; j < choices.length;j++){	
				choices[j].addEventListener('click',(e) => {
					for(let k = 0;k<choices.length;k++){
						if(e.target == choices[k]){
							if(isLogedIn){
								if(data[i].votedby.indexOf(currentUser) > -1){
									alert("Sorry, you have already voted on this, you cannot vote again");
								}else {
									addRandomStyle(choices);
									selectedStyle(e);
								}
							}else{
								error.style.height = "100%";
							}
						}
					}
				});
			}
		}
	}

	wrapper(data,login,currentUser);

	function graph(i){
		let quesOptions = [];
		let optionsValue = [];
		let ranCol = randomColor(data[i].ques_options.length);
		for(let j =0; j < data[i].ques_options.length;j++){
			
			quesOptions.push(data[i].ques_options[j].choice);
			optionsValue.push(data[i].ques_options[j].votes);
		}	
		let graph = document.getElementsByClassName("graphs")[i];
		graph.getContext("2d");

		console.log(Chart.defaults);
		
		let chart = new Chart(graph, {
			type:"pie",
			data:{
				labels:[...quesOptions],
				datasets:[{
					label:"Population",
					data:[...optionsValue],
					backgroundColor:[...ranCol],
					borderWidth:1,
					borderColor:"white",
					hoverBorderWidth:8
				}]
			},
			options: {
		        plugins: {
		        	title:{	
						display:true,
						text:data[i].ques,
						align:"center",
						padding:{
							bottom:-60
						},
						font:{
							size:20
						}
		        	},
		            legend: {
		            	position:"right",
		                labels: {
		                    font: {
		                        size: 18
		                    }
		                }
		            }
		        }
	   		}
		});
	}
	for(let i = 0;i<data.length;i++){
		graph(i);
	}
}


// getAllPosts(un);
// console.log(data);
