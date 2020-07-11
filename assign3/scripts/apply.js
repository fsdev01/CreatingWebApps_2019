/**
	Filename: apply.js
	Author: Vinh Huynh 102125413
	Target: jobs.html
	Purpose: Store the Job Reference Numbers in localStorage (Local client side storage)
	Created: 21/4/19
	Last Updated: 21/4/19

**/

"use strict"; // avoid global variables in functions

function storejobone(){
	//Store Job 1 Reference Number - TA040 - Big Data Analyst
	localStorage.jobref = "TA040";
}

function storejobtwo(){
	// Store Job 2 Reference Number - TA045 - Graduate Software Engineer
	localStorage.jobref = "TA045";
}
function init(){

	// Add click event - triggered when the user clicks on the hyperlink of first job ad - Big Data Analyst
	document.getElementById("TA040").onclick = storejobone;

	// Add click event - triggered when the user clicks on the hyperlink of second job ad - Graduate Software Engineer
	document.getElementById("TA045").onclick = storejobtwo;

}
window.onload = init; // call init function when window loads.