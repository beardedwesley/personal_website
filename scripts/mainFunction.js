"use strict";

/** Event Listeners **/
window.onload = prepPage();
window.addEventListener("resize", prepPage);

/** Functions **/
function formReset() {
	window.location.replace("/pages/contact.html");
	return;
}

function goHome() {
	window.location.replace("/index.html");
	return;
}

function goResume() {
	window.location.replace("/pages/resume.html");
	return;
}

function toggleMenu() {
	document.getElementById("icon").classList.toggle("change");
	var y = (document.getElementById("nav")).getElementsByTagName("a");
	var i;
	for(i = 1; i < y.length; ++i){
		y[i].classList.toggle("collapse");
		y[i].classList.toggle("small");
	}
	console.log("Menu toggled.\n");
	
	return;
}


function prepPage() {
	var w = window.innerWidth;
	var z = document.getElementById("menuButton");
	var y = (document.getElementById("nav")).getElementsByTagName("a");
	
	if (w < 700) {
		z.style.display = "initial";
		var i;
		if (!(y[1].classList.contains("collapse"))){
			for(i = 1; i < y.length; ++i){		
				y[i].classList.add("collapse");
			}
			console.log("Class \"collapse\" added to links.\n");
		}
	}
	else {
		z.style.display = "none";
		var i;
		if (y[1].classList.contains("collapse")){
			for(i = 1; i < y.length; ++i){
				y[i].classList.remove("collapse");
			}
			console.log("Class \"collapse\" removed from links.\n");
		}
	}

	return;
}