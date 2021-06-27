const addChoice = document.getElementById("addChoice");
const choices = document.getElementsByClassName("choices")[0];

let id = 3;

addChoice.addEventListener('click',() => {
	let p = document.createElement("p");
	p.innerText = `Choice ${id}`;
	choices.appendChild(p);

	let input = document.createElement("input");
	input.setAttribute("type","text");
	input.setAttribute("id",id);
	input.setAttribute("name",`Choice${id}`);

	input.setAttribute("placeholder","Choice...");
	choices.appendChild(input);

	let br = document.createElement("br");
	choices.appendChild(br);

	id += 1;
})