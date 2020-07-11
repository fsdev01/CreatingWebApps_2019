/**
	Filename: enhancementsOne.js
	Author: Vinh Huynh 102125413
	Target: home.html
	Purpose: Animation effects for Home page
	Created: 27/4/19
	Last Updated: 27/4/19

**/

"use strict";


function init(){

	// Source: https://www.abeautifulsite.net/a-clean-fade-in-effect-for-webpages 
	// Remove the "fadeEffect" class of the main content of the home page to fade-in effect
	// Refer to indexstyle.css and index.html (Styling for Fade Effect)
	var fadeElement = document.getElementsByClassName("content")[0];//HTML element to fade out
	if(fadeElement){
		fadeElement.classList.remove("fade"); 
	}

}

window.onload = init; // call init function when window loads.