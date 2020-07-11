/**
	Filename: enhancementsTwo.js
	Author: Vinh Huynh 102125413
	Target: apply.html
	Purpose: Set Time Limit for filling the application form
	Created: 27/4/19
	Last Updated: 27/4/19

**/

"use strict";

function sessiontimer(){
	/** Purpose: Call the timeout function 
		Source: https://www.elated.com/javascript-timers-with-settimeout-and-setinterval/
	**/

	// Note: 1 second = 1000 milliseconds, 1 minute = 60 seconds
	var elapsedtime = 1000 * 60 * 5; // Allow 5 minute limit to fill application. IF NEEDED ADJUST VALUE, FOR TESTING PURPOSES.
	setTimeout("redirectweb()",elapsedtime);

}

function redirectweb(){
	/** Purpose: Redirect the website after x amount of period
	**/
	var msg = "WARNING: 5 Minute Limit EXCEEDED to Fill Application.\nPlease review job adverts and reapply."
	alert(msg); // Disaply Alert Message
	window.location = './jobs.html';  // Redirect browser to job listing page

}



function init(){
	//sessiontimer(); //When the window loads,call function that which execute timeout();
	// Note: sessiontimer() will be called from the validate.js file
	// Thus, enhancementTwo.js definition will be loaded before validate.js
}
window.onload = init; // call init function when window loads.
