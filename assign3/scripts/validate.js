/**
	Filename: validate.js
	Author: Vinh Huynh 102125413
	Target: apply.html
	Purpose: Validate Input Form data and Data Transfer
	Created: 9/4/19
	Last Updated: 26/4/19

**/


"use strict"; // avoid global variables in functions


function filljobapp() {
	/* Purpose: The purpose of this prefill the form with the data stored in sessionStorage
	   This function is called, when the window loads.
	*/


	/**------------------Section 1: Initalise Variables - Extract job applicant's details stored in HTML5 Web Storage-------------------------*/
	var jobrefnumber = localStorage.jobref; // Job referenced extracted depends on the "job application" hyperlink clicked on apply.html 
	var firstname = sessionStorage.firstname; // Extract First Name
	var lastname = sessionStorage.lastname; // Extract Last Name
	var dob = sessionStorage.dob; // Extract date of birth of applicant
	var gender = sessionStorage.gender; // Extract gender - male/female
	var address = sessionStorage.address; // Extract address (street name)
	var suburb = sessionStorage.suburb; // Extract suburb name
	var state = sessionStorage.state; // Extract state (VIC,NSW,QLD,...)
	var postcode = sessionStorage.postcode; // Extract postcode 
	var email = sessionStorage.email; // Extract email address
	var phoneno = sessionStorage.phoneNo; // Extract phone number
	var skillstext = sessionStorage.skills; // Extract skills of applicants stored in string e.g. "python,c,js,sql,other"
	var otherskill = sessionStorage.otherskill; // Extract description of other skills that the applicant possess.

	var selectother = false; // Flag Variable - Assumes the <input> with type "checkbox" and id="other" is not checked/selected by applicant.
	// This variable "selectother" is required, as by default the "other" checkbox is selected.
	// Need to handle the case/scenario, where the user does not select the "other checkbox" and thus that setting must be saved 
	//(i.e. if "other skill" checkbox is not selected, then the prefill-form will not tick the "other skill" checkbox.)




	/**------------------Section 2: Prefill the form by updating input <input> elements with stored data in localStorage/sessionStroage-------*/

	// Prefill form with Job Reference Number
	if( jobrefnumber != undefined){  	//Check whether job reference number was stored.
		document.getElementById("jobRef").value = jobrefnumber; // Update the <input> box with the job ref. number from localStorage.jobref
		document.getElementById("readjobref").textContent=": " + jobrefnumber ; // Show the job reference no. in <span> element in <p>.Read Only.
		document.getElementById("jobRef").setAttribute("type", "hidden"); // Hide the <input> box with the job ref no.
	}

	// Prefill form with firstname
	if(firstname!= undefined){  	//Check whether firstname was stored.
		document.getElementById("fName").value=firstname; // Update the text <input> with stored first name in SessionStorage
	}

	// Prefill form with lastname
	if(lastname!=undefined){  //Check whether lastname was stored.
		document.getElementById("lName").value = lastname; // Update the text <input> with stored last name in SessionStorage
	}

	// Prefill form with date of birth of the applicant
	if(dob!=undefined){  //Check whether date of birth was stored.
		document.getElementById("dob").value = dob; // Update the text <input> with stored date of birth in SessionStorage
	}

	// Prefill form with gender of the applicant - Radio Buttons
	if(gender!=undefined){  //Check whether the gender was stored
		if(gender=="male"){ // If the gender is male, then select the male radio button
			document.getElementById("male").checked = true;
		}
		if(gender=="female"){ // If the gender is female, then select the female radio button
			document.getElementById("female").checked = true;
		}
	}

	// Prefill form with the address of the applicant 
	if(address!= undefined){  //Check whether the gender was stored
		document.getElementById("address").value = address;  // Update the text <input> with saved address
	}

	// Prefill form with the suburb of the applicant 
	if(suburb!= undefined){ //Check whether the suburb was stored
		document.getElementById("suburb").value = suburb; // Update the text <input> with saved suburb
	}

	// Prefill form with the state of the applicant 
	if(state!= undefined){ //Check whether the state was stored
		document.getElementById("state").value = state; // Update the text <input> with saved state
	}

	// Prefill form with the postcode of the applicant 
	if(postcode!=undefined){ //Check whether the postcode was stored
		document.getElementById("postcode").value = postcode; // Update the text <input> with saved postcode
	}

	// Prefill form with the email address of the applicant 
	if(email!=undefined){ //Check whether the email address was stored
		document.getElementById("email").value = email; // Update the text <input> with saved email address
	}

	// Prefill form with the phone number of the applicant 
	if(phoneno!=undefined){  //Check whether the phone number was stored
		document.getElementById("phoneNo").value = phoneno; // Update the text <input> with saved phone number
	}

	// Prefill form with the other skills description of the applicant  - <textarea> element
	if(otherskill!=undefined){ //Check whether any other skills text was stored.
		document.getElementById("oskill").value = otherskill; // Update the <textarea> with stored skill description
	
	}

	// Prefill form with the ticked checkboxes choosen by the applicant.
	if(skillstext!=undefined){  // Check whether list of skills was stored in sessionStorage
		var skillarray = skillstext.split(","); // Extract list of checkbox skills into an array.[python,c,js,sql,other]

		// Prefill skills section described using <input> with input type "checkbox".
		// Go through list of skills represented as an array of skills.For example: [python,c,js,sql,other]
		for(var i=0; i < skillarray.length;i++){ 
			var theskill = skillarray[i]; // Extract the specified/particular skill such as "python"

			// If the skill matches any of the below, then tick the relevant checkboxes.
			if(theskill=="python"){ 
				document.getElementById("python").checked = true;
			}
			if(theskill=="c"){
				document.getElementById("c").checked = true;
			}
			if(theskill=="js"){
				document.getElementById("js").checked = true;
			}
			if(theskill=="sql"){
				document.getElementById("sql").checked = true;
			}
			if(theskill=="other"){
				document.getElementById("other").checked = true;
				selectother = true; // Indicate
			}
		}


		// Need to handle the case/scenario, where the user does not select the "other checkbox" and thus that setting must be saved 
		// (i.e. if "other skill" checkbox is not ticked, then the prefill-form will not tick the "other skill" checkbox.)
		// Reason: This is because by default, the "other skills" checkbox is selected when the page is loaded as per Part 1 Assignment 
		if(selectother == false){ // Check whether the "other skills" checkbox has been ticked/selected
			document.getElementById("other").checked = false;
		}

	}







}

function storedetails(){
	/** Purpose: store the form data entered by the user into HTML Web Storage sessionStorage.
		sessionStorage - the data will be stored with limited lifetime (dependent on window)
		Note these details will be stored as strings.
	**/

	sessionStorage.firstname = document.getElementById("fName").value; // Store the firstname of the applicant
	sessionStorage.lastname = document.getElementById("lName").value; // Store the lastname of the applicant
	sessionStorage.dob = document.getElementById("dob").value; // Store the date of birth of the applicant
	sessionStorage.address = document.getElementById("address").value; // Store the adddress of the applicant
	sessionStorage.suburb = document.getElementById("suburb").value; // Store the suburb 
	sessionStorage.state = document.getElementById("state").value; // Store the state selected
	sessionStorage.postcode = document.getElementById("postcode").value; // Store the postcode entered
	sessionStorage.email = document.getElementById("email").value; // Store the email address of the applicant
	sessionStorage.phoneNo = document.getElementById("phoneNo").value; // Store the phone number of the applicant
	sessionStorage.otherskill = document.getElementById("oskill").value; // Store the description of the "other skills" <textarea>


	//AIM: Store the gender of the applicant - either male or female <select> and <option>
	// 	   ONLY IF the user has selected a radio input option
	var ismale = document.getElementById("male").checked; // Extract the checked status of the male radio button
	var isfemale = document.getElementById("female").checked; //Extract the checked status of the female radio buton

	//Check which gender is selected.
	if (ismale){
		sessionStorage.gender = "male"; // Male radio button selected
	}
	if(isfemale){
		sessionStorage.gender = "female"; // Female radio button selected.
	}



	//AIM: Store the skills selected by the applicant as a String
	//     For example "python,c,js,sql,other"
	//Note: The skills are selected by <input> elements with type "checkboxes"
	var skills = ""; // String used to store list of skills - concatenated as a string
	// Check which skills (checkboxes) are selected by the applicant
	var pythonskill = document.getElementById("python").checked; // The applicant has ticked the "python" skill checkbox
	var cskill = document.getElementById("c").checked; // The applicant has ticked the "c"skill checkbox
	var jsskill = document.getElementById("js").checked; // The applicant has ticked the "python" skill checkbox
	var sqlskill = document.getElementById("sql").checked; // The applicant has ticked the "sql" skill checkbox
	var otherskill = document.getElementById("other").checked; // The applicant has ticked the "other" skill checkbox
	// Store the selected skills (checkboxes) in the concatenated string.
	if(pythonskill){
		skills += "python";
	}
	if(cskill){
		skills += (skills=="") ? "c" : ",c"; // Use ternary operator.
	}
	if(jsskill){
		skills += (skills=="") ? "js" : ",js";
	}
	if(sqlskill){
		skills += (skills=="") ? "sql" : ",sql";
	}
	if(otherskill){
		skills += (skills=="") ? "other" : ",other";
	}
	sessionStorage.skills = skills; // Store the skill string in sessionStroage.

}

function ageyears(dateArray){
	/** Purpose: Calculate the age in years based on the given date.
		Parameter: "dateArray" is array representing a date. [day,month,year]
		            For example: [28,04,2019] represents 28/04/2019
		Source: Week 6 Lecture Notes - Slide 12 (as suggested)
	**/

	// Initalise Variables - Create Date Objects 
	// Javascript months start from 0. so 0 = Jan.
	var currentdate = new Date(); // Create Date object with current date and time
	var birthday = new Date(dateArray[2],dateArray[1]-1,dateArray[0]);  //Construct date object for birthday of the applicant


	// Caculate the difference in milliseconds between birthday and current time. Then convert back to days.
	var difference = (currentdate.valueOf()-birthday.valueOf())/(365.25*24*60*60*1000);
	//alert(difference);


	// Note that valueof() return milliseconds since 1/1/1970 0:00
	// source: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/valueOf
	// Number of milliseconds in Year: 365.25 days * 24 hours * 60 minutes * 60 seconds * 1000 milliseconds

	//Return the applicant's age.
	return difference;
}

function checkvaliddateformat(birthdate){
	/** Purpose: Check whether the input date follows the "dd/mm/yyyy" format.
		Parameter: "birthdate" is the input string representing birthday.
		Return: "errMsg" represents the  error message. If there are no errors, then errMsg is empty.
	**/

	var errMsg = ""; // Stores the error message;

	// Check whether input folow dd/mm/yyy format (numbers)
	if(!birthdate.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)){
		errMsg= "INVALID FORMAT: Date must follow dd/mm/yyyy format.<br>";
	}

	return errMsg;
}


function checkvaliddate(birthdate){
	/** Purpose: Check whether the components of "dd/mm/yyyy" is a valid date.
				 dd - represents the day of the month 
				 mm - represents the month 1 ... 12
				 yyyy - represents the year. The year should be greater than 1582.
		Parameter: "birthdate" is string "dd/mm/yyyy" representing birthday of an applicant
		Return: "errMsg" represents the concatenated error message. If there are no errors, then errMsg is empty.
	**/

	var errMsg = ""; // Stores the concatenated error message

	var dateArray = birthdate.split("/"); // Split the string into an array [day,month,year]
	var day = dateArray[0]; // Extract the day component dd
	var month = dateArray[1]; // Extract the month component mm
	var year = dateArray[2]; // Extract the year componet yyyy


	//MONTH COMPONENT: Check whether the month is valid. 12 months in a given year.
	if( month > 12 || month < 1){
		errMsg +="INVALID MONTH: Month must be between 1 and 12<br>";
	}

	//YEAR COMPONENT: Check whether the year is valid. VALID YEARS > 1582
	//Source: https://www.timeanddate.com/calendar/julian-gregorian-switch.html
	if (year <= 1582){
		errMsg +="INVALID YEAR: Year must be greater than year 1582<br>"
	}

	//DAY COMPONENT: Dependent on the month.
	var monthNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'] // Month Names represented in array.

	//MONTHS THAT HAVE 31 DAYS: Jan (1), March(3), May(5), July(7), August(8), October(10) and December(12) 
	if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month==12){
		if(day<1 || day > 31){
			errMsg += "INVALID DAY: Month" + monthNames[month-1] + " can have between 1 and 31 days (inclusive)<br>";
		}
	}


	//MONTHS THAT HAVE 30 DAYS: April (4) , June(6), September (9) and November(11)
	if(month == 4 || month == 6 || month == 9 || month == 11){
		if( day < 1 || day > 30 ){
			errMsg += "INVALID DAY: Month " + monthNames[month-1] + " can have between 1 and 30 days (inclusive)<br>";
		}
	} 


	//LEAP YEAR: DETERMINE WHETHER YEAR IS A LEAP YEAR.
	//SOURCE: https://support.microsoft.com/en-au/help/214019/method-to-determine-whether-a-year-is-a-leap-year
	var leapyear = false;
	if((year % 4 == 0)){
		if(year%100 == 0){
			if( year %400 == 0){
				leapyear = true;
			}
			else {
				leapyear = false;
			}
		}
		else{
			leapyear = true;
		}
	}

	//FEB either has 28 or 29 days depending on whether the year is a leap year.
	if(month == 2){
		if(leapyear){ // Leap year => 29 days in FEB
			if(day < 1 || day > 29){
				errMsg += "Month " + monthNames[month-1] + " can have between 1 and 29 days (inclusive) in a leap year<br>";
			}
		} else { // not a leap year => 28 days in FEB
			if( day < 1 || day > 28){
				errMsg += "Month " + monthNames[month-1] + " can have between 1 and 28 days (inclusive)<br>";
			}
		}
	}

	return errMsg;

}


function checkvalidage(birthdate){
	/** Purpose: Check whether the applicant has a valid age and output error message if invalid age.
				 Age must be between 15 and 80 years.
		Parameter: "birthdate" is string "dd/mm/yyyy" representing birthday of an applicant
		Return: "errMsg" represents the concatenated error message. If there age is valid, then empty string will be returned.

	**/


	var ageinyears = ageyears(birthdate.split("/")); // Calculate Age in Years
	var errMsg = ""; // Store the error message
	if(ageinyears <15 || ageinyears > 80){ // Check whether the age is valid.
		errMsg = "You must be between 15 and 80 years old<br>";
	}

	return errMsg;

}


function matchstatepostcode(){
	/** Purpose: The state selected from the drop-down list should match the first digit of the postcode
				 For Example, postcode 3122 should match state VIC. 
		Return: "errMsg" represents error message. If the state matches the postcode, then errMsg will be empty.
	    Note: Assume that four digits are supplied from HTML input validation
	**/


	// Initalise Variables 
	var state = document.getElementById("state").value; // Extract the selected state by the user
	var postcode = document.getElementById("postcode").value; // Extract the entered postcode
	var firstdigit = postcode.substring(0,1); // Extract first digit of the postcode
	var errMsg = ""; // Store error message if the state doesn't match the postcode

	switch(state){ // Check whether the first digit of the postcode matches the state
		case "VIC":
			if(! (firstdigit==3 || firstdigit == 8)){
				errMsg = "VIC state selected. VIC Postcode must begin with 3 or 8";
			}
			break;
		case "NSW":
			if(! (firstdigit==1 || firstdigit == 2)){
				errMsg = "NSW state selected. NSW Postcode must begin with 1 or 2";
			}
			break;

		case "QLD":
			if(! (firstdigit == 4 || firstdigit == 9)){
				errMsg = "QLD state selected. QLD Postcode must begin with 4 or 9";
			}
			break;
		case "NT":
			if(firstdigit!=0){
				errMsg =  "NT state selected. NT Postcode must begin with 0";
			}
			break;
		case "WA":
			if(firstdigit!=6){
				errMsg =  "WA state selected. WA Postcode must begin with 6";
			}
			break;
		case "SA":
			if(firstdigit!=5){
				errMsg =  "SA state selected. SA Postcode must begin with 5";
			}
			break;
		case "TAS":
			if(firstdigit!=7){
				errMsg =  "TAS state selected. TAS Postcode must begin with 7";
			}
			break;
		case "ACT":
			if(firstdigit!=0){
				errMsg =  "ACT state selected. ACT Postcode must begin with 0";
			}
			break;
	}

	return errMsg; 


}


function skilltextbox(){
	/** Purpose: The <textarea> must be filled with information if the "other" skill checkbox is selected by the user.
		Return: "errMsg" represents error message. If the state matches the postcode, then errMsg will be empty.
	**/


	var checkboxstatus = document.getElementById("other").checked // Check whether the otherskills checkbox has been selected.
	var skilltext = document.getElementById("oskill").value; // Extract text from textarea box
	var errMsg = ""; // Store error message if the "other" checkbox is selected and textarea is empty


	if(checkboxstatus == true && skilltext==""){ // Error if user has selected "other skills" checkbox and skills textarea is empty
		errMsg = "ERROR: Please fill in the 'other skills' text box <br>You have selected 'otherskills' checkbox and this means the 'other skills' textbox section can't be empty<br>";
	}

	return errMsg;

}


function validate(){
	/** Purpose: Validate the data entred by the applicant.
			     There are three main validation rules specified by the Assignment's requirements.
			     1. Birthday date field - the dd/mm/yy must be valid (i.g. the values day,month and year must be valid) .
			     						- the person's age must be between 15 and 80 (inclusive).
			     2. VIC state and Postcode Field - The first digit of the postcode must correspond to the correct state
			     								 - For example, a postcode beginning with 3 or 8 corresponds to the VIC state
			     3. Ensure that if the "other skills" checkbox is selected, then the "Other Skills" text area cannot be blank
		This section will primarly be responsible for displaying the error messages on the HTML Page.
		Return: "validSucess" is variable that stores a boolean value - "true" or "false"
		Note: This is based on template provided in Lab Exercises and Lecture 6 Slide 27

	**/


	var validateSucess = true; // Assume the inputs satisfy the validation rules (i.e. true)



	/*********************** VALIDATION RULE 1 - CHECK BIRTHDAY FIELD ********************************************/

	// Rule 1a: First check whether the given input follows the dd/mm/yyyy format.
	// Rule 1b: The given input dd/mm/yyyy must be a valid day such that dd mm yyyy components are valid.
	// Rule 1c: Age is between 15 and 80 years.


	var dob = document.getElementById("dob").value; // Extract the date of birth from the user

	// Setup the HTML to display the Error Message
	var dobError = document.getElementById("doberror"); // Get the HTML element that will display the error message
	dobError.innerHTML = ""; // Reset the contents of the HTML element, if the user resubmits the form
	dobError.classList.remove('errorMsg'); // Reset style class for error message, if the user resubmits the form

	
	// Rule 1a: Check whether date follows the dd/mm/yyy format
	var validDateFormat = checkvaliddateformat(dob);  // Function returns error msg if input does not match dd/mm/yyyy format
	if(validDateFormat!=""){ // Display Error Message
		dobError.innerHTML = "ERROR: Invalid Date of Birth.<br>"+validDateFormat; 
		dobError.classList.add('errorMsg'); // Style the Error Message
		validateSucess = false;
	}


	//Rule 1b: The given input dd/mm/yyyy must be a valid day such that dd mm yyyy components are valid.
	// This rule is executed if the input follows the dd/mm/yyy format (i.e. satisfy rule 1a)
	if(validDateFormat==""){ // Only execute if the input follows the dd/mm/yyyy FORMAT 
		var validDateComponents = checkvaliddate(dob); 	// Rule1b: Check whether the components dd or mm or yyyy is valid
		if(validDateComponents!=""){ // Display Error Message, if data components dd mm yyyy are invalid.
			dobError.innerHTML = "ERROR: Invalid Date of Birth.<br>"+validDateComponents;
			dobError.classList.add('errorMsg'); // Style the Error Message
			validateSucess = false;
		}
	}


	// Rule 1c: Age is between 15 and 80 years.
	// This rule can be executed if rule 1a and 1b are satisifed. (i.e. valid data format and valid date components dd mm yy)
	if(validDateFormat=="" && validDateComponents == ""){
		var validAgeMsg = checkvalidage(dob); // Rule 1c: Check whether the age is valid b/w 15 and 80 years
		if(validAgeMsg!=""){ // if error, display error message
			dobError.innerHTML = "ERROR: Invalid Date of Birth.<br>"+validAgeMsg;
			dobError.classList.add('errorMsg'); // Style the Error Message			
			validateSucess = false;  // Set validation status to false.
		}
	}



	






	/*********************** VALIDATION RULE 2 - CHECK STATE MATCHES THE POSTCODE ********************************************/
	//Rule 2: State should match the first digit of postcode
	var validStatePostcodeMsg = matchstatepostcode(); // CHeck whether postcode and state are valid
	if(validStatePostcodeMsg!=""){
		validateSucess = false; // Set validation status to false.

	}

	// Display the error message for rule 2
	var postError = document.getElementById("posterror"); // Get the HTML element that will display the error message
	postError.innerHTML = ""; // Reset the contents of the HTML element, if the user resubmits the form
	postError.classList.remove('errorMsg'); // Reset style class for error message, if the user resubmits the form


	if(validStatePostcodeMsg!=""){
		postError.innerHTML = "Invalid Postcode: "+validStatePostcodeMsg;
		postError.classList.add('errorMsg'); // Style the Error Message

	}




	/*********************** VALIDATION RULE 3 - CHECK TEXTAREA IS NOT EMPTY WHEN "OTHER" CHECKBOX IS TICKED ******************/
	// Rule 3: If the checkbox "otherskills" is selected, then other skills text cannot be blank;
	var validTextAreaMsg = skilltextbox(); // // Check whether validation rule 3 is violated. If violated, then msg will be returned.
	if(validTextAreaMsg!=""){
		validateSucess = false; // Set validation status to false.
	}

	// Display the error message for rule 3

	var textAreaElement = document.getElementById("othertexterror"); // Get the HTML element that will display the error message
	textAreaElement.innerHTML = ""; // Reset the contents of the HTML element, if the user resubmits the form
	textAreaElement.classList.remove('errorMsg'); // Reset style class for error message, if the user resubmits the form

	if(validTextAreaMsg!=""){
		textAreaElement.innerHTML = validTextAreaMsg; // Add the text to the HTML element
		textAreaElement.classList.add('errorMsg'); // Style the Error Message

	}


	return validateSucess;
}

function validateAux(){
	// Adjustment for Assignment 3

	var debug = true; // (1) True => Turn off JS Validation   (2) False => Turn on JS Validation
	var validateSucess = false;

	if(debug == true){  // Debug Mode - Disable JS Form Validation
		validateSucess = true
	} else { // Normal Mode - Allow JS Form Validation
		validateSucess = validate(); 
	}


	/**** IF THERE ARE NO VALIDATION ERRORS - STORE THE PREFILLED JOB APPLICATION DATA *******/
	if(validateSucess){ 
		storedetails();
	}

	return validateSucess; // Return to onclick event




}



function init(){
	// Reference to input element (submit button)
	var submitButton = document.getElementById("submit");
	//If validate function returns true, the form is actioned. Otherwise, the form is not actioned.
	submit.onclick =  validateAux;  
	

	//Prefill the form using the stored data in sessionStorage
	filljobapp();

	// redirect webpage - timeout feature
	sessiontimer(); // From the enhancementsTwo.js

	
}


window.onload = init; // call init function when window loads.