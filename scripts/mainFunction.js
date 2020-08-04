"use strict";

/** Event Listeners **/
window.onload = prepPage();
window.addEventListener("resize", prepPage);

/** Functions **/
function formReset() {
	window.location.replace("/pages/contact.html");
}

function goHome() {
	window.location.replace("/index.html");
}

function toggleMenu() {
	let icon = document.getElementById("icon");
	if (icon.getAttribute("src") === "images/menu_icon.png") {
		icon.setAttribute("src", "images/cancel_icon");
	} else {
		icon.setAttribute("src", "images/menu_icon.png")
	}
	let y = (document.getElementById("nav")).getElementsByTagName("a");
	let i;
	for(i = 1; i < y.length; ++i){
		y[i].classList.toggle("collapse");
		y[i].classList.toggle("small");
	}
	console.log("Menu toggled.\n");
}


function prepPage() {
	let w = window.innerWidth;
	let z = document.getElementById("menuButton");
	let y = (document.getElementById("nav")).getElementsByTagName("a");
	
	if (w < 700) {
		z.style.display = "initial";
		let i;
		if (!(y[1].classList.contains("collapse"))){
			for(i = 1; i < y.length; ++i){		
				y[i].classList.add("collapse");
			}
			console.log("Class \"collapse\" added to links.\n");
		}
	}
	else {
		z.style.display = "none";
		let i;
		if (y[1].classList.contains("collapse")){
			for(i = 1; i < y.length; ++i){
				y[i].classList.remove("collapse");
			}
			console.log("Class \"collapse\" removed from links.\n");
		}
	}
}