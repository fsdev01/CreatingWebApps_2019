<!DOCTYPE html>
<html lang="en">
<head>
	<title>Expression of Interest</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Rohirrim Booking Form" />
	<meta name="keywords"    content="" />
</head>
<body>
	<h1> Expression of Interest </h1>


<!-- Begin Processing -->
<?php

	
	// Function - sanitise input
	function sanitise_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}



	/**************************************** PART 1: EXTRACTS DATA FROM FROM *****************************************/


	// STEP 1: CHECK WHETHER processEOI.php was triggered by a form submit, if not display error messsage
	// Variable 1: Job Reference
	if( isset($_POST["jobRef"])){ // Check whether form data exists
		$jobRef = $_POST["jobRef"]; // Extract form data
		$jobRef = sanitise_input($jobRef);
	} else {
		// Display error message, if process not triggered by a form submit
		echo "<p>Error: Enter data in the <a href=\"apply.php\">form</a></p>\n";

		// Redirect to form, if process not triggered by a form submit
		header("location: apply.php");
	}



	// Assign the remaining of the form values to PHP Variables:

	// Variable 2: First Name
	if(isset($_POST["firstName"])){ // Check whether form data exists
		$firstname = $_POST["firstName"]; // Extract form data
		$firstname = sanitise_input($firstname); // Sanitise inputs 
	}

	// Variable 3: Last Name
	if ( isset($_POST["lastName"])){ // Check whether form data exists
		$lastname = $_POST["lastName"]; // Extract form data
		$lastname = sanitise_input($lastname); // Sanitise inputs 
	}


	// Variable 4: Date of Birth
	if ( isset($_POST["birthdate"])){ // Check whether form data exists
		$birthdate = $_POST["birthdate"]; // Extract form data
		$birthdate = sanitise_input($birthdate); // Sanitise inputs 
	}


	// Variable 5: Street Address 
	if ( isset($_POST["address"])){ // Check whether form data exists
		$streetaddress = $_POST["address"];  // Extract form data
		$streetaddress = sanitise_input($streetaddress); // Sanitise inputs 
	}

	// Variable 6: Suburb
	if ( isset($_POST["suburb"])){ // Check whether form data exists
		$suburb = $_POST["suburb"]; // Extract form data
		$suburb = sanitise_input($suburb); // Sanitise inputs 
	}


	// Variable 7: State
	if ( isset($_POST["state"])){ // Check whether form data exists
		$state = $_POST["state"]; // Extract form data
		$state = sanitise_input($state); // Sanitise inputs 
	} else {
		$state = "Unknown"; // State not selected by Userl
	}

	// Variable 8: Postcode
	if ( isset($_POST["postcode"])){ // Check whether form data exists
		$postcode = $_POST["postcode"]; // Extract form data
		$postcode = sanitise_input($postcode); // Sanitise inputs 
	}

	// Variable 9: Email Address
	if ( isset($_POST["email"])){ // Check whether form data exists
		$email = $_POST["email"]; // Extract form data
		$email = sanitise_input($email); // Sanitise inputs 
	}


	// Variable 10: Phone Number
	if ( isset($_POST["phoneNo"])){ // Check whether form data exists
		$phonenumber = $_POST["phoneNo"]; // Extract form data
		$phonenumber = sanitise_input($phonenumber); // Sanitise inputs 
	}

	// Variable 11: Other Skills TextArea
	if ( isset($_POST["oskill"])){ // Check whether form data exists
		$otherskillstext = $_POST["oskill"]; // Extract form data
		$otherskillstext = sanitise_input($otherskillstext); // Sanitise inputs 
	}


	// Variable 12 - Gender
	if(isset($_POST["gender"])){
		$gender = $_POST["gender"]; // Handle selection made - 
		$gender = sanitise_input($gender); // Extract form data
	} else {
		$gender = "Unknown"; // Handle no selection made - Not Selected
	}


	// Variable 13 - Skills Selected via Checkbox 
	// Resource: http://form.guide/php-form/php-form-checkbox.html
	if(isset($_POST["skills"])){ 
		$skillarray = $_POST["skills"]; // Handle selection made
		$listskill = "";
		for($i = 0 ; $i < count($skillarray); $i++){
			if ($listskill == ""){ // String was empty
				$listskill = $skillarray[$i];
			} else { // String not empty, so append skill
				$listskill = $listskill . "," . $skillarray[$i];

			}
		}
	}



	/**************************************** PART 2:  DATA VALIDATION RULES  *****************************************/



	$errMsg = ""; // String to store error message

	// Validation Rule 1: Job Reference NUmber contains exactly 5 alphanumeric characters
	if(!preg_match("/^[A-Za-z0-9]{5}$/",$jobRef)){
		$errMsg .= "<p>Job Reference Number: must contain 5 alphanumeric characters</p>\n";
	}


	// Validation Rule 2: First Name can maximum of 20 alpha characters
	if(!preg_match("/^[A-Za-z]{1,20}$/",$firstname)){
		$errMsg .= "<p>First Name: must contain a maximum number of 20 alpha characters and can't be empty</p>\n";
	}



	// Validation Rule 2: Last Name can maximum of 20 alpha characters
	if(!preg_match("/^[A-Za-z]{1,20}$/",$lastname)){
		$errMsg .= "<p>Last Name: must contain a maximum number of 20 alpha characters and can't be empty</p>\n";
	}

	// Validation Rule 3: Date of Birth must follow dd/mm/yyyy format and age must between 15 and 80 (inclusive)
		// Rule 3a: Date follows dd/mm/yyyy format
	if(!preg_match("/^\d{1,2}\/\d{1,2}\/\d{4}$/",$birthdate)){
		$errMsg .= "<p>Date of Birth: must follow dd/mm/yyyy format</p>\n";
	} 
	else{
		// Rule 3b: Check the components dd (day), mm (month) and , yyyy (year) are valid
		$dateArray = explode("/",$birthdate); // Convert date string into an array of date components
		if(!checkdate($dateArray[1], $dateArray[0], $dateArray[2])){ // Check whether the date is valid using in-built php checkdate() function
			$errMsg .= "<p>Date of Birth: the date is not a valid date dd/mm/yyyy. Check dd or mm or yyyy components</p>\n";
		}else {
			// Rule 3c: Ensure that age is between 15 and 80 (inclusive)
			// Source: https://www.php.net/manual/en/function.date-diff.php
			// Source: https://www.geeksforgeeks.org/php-date_diff-function/
			$current = new DateTime(); // Current Date
			$dob = new DateTime("$dateArray[2]-$dateArray[1]-$dateArray[0]"); // Birthday
			$ageYears = date_diff($dob, $current)->y; // age in years - difference
			//echo "Your age is: $ageYears";
			if($ageYears < 15 | $ageYears > 80){
				$errMsg .= "<p>Date of Birth: Your age must between 15 and 80 (inclusive)</p>\n";
			}
		}
	}


	// Validation Rule 4: Gender is selected
	if($gender == "Unknown"){
		$errMsg .= "<p>Gender: please select a gender male/female</p>\n";
	}
 

	// Validation Rule 5: Maximum of 40 characters for Street Address
	if( strlen($streetaddress) >40){
		$errMsg .= "<p>Street Address: Maximum of 40 characters</p>\n";
	}



	// Validation Rule 6: Maximum of 40 characters for Suburb
	if( strlen($suburb) >40){
		$errMsg .= "<p>Suburb: Maximum of 40 characters</p>\n";
	}


	// Validation Rule 7: State must VIC/NSW/QLD/NT/WA/SA/TAS/ACT
	if($state == "Unknown"){
		$errMsg .= "<p>State: Please Select a State</p>\n";
	}

	/**
	if( !($state == "VIC"||$state == "NSW"||$state =="QLD"||$state == "NT"||$state == "WA"|| $state == "SA"|| $state =="TAS"||$state == "ACT")) {
			$errMsg .= "<p>State: Please select a state</p>";
	} **/


	// Validation Rule 8: 4 digits and matches state

	// Validation Rule 8a: matches exactly 4 digits
	if(!preg_match("/^[0-9]{4}$/",$postcode)){
		$errMsg .= "<p>Postcode: must be 4 digits</p>\n";
	} else {
		// Validation Rule 8b: Postcode must match state
		$firstDigit = substr($postcode,0,1);
		if($state == "VIC"){ // VIC state's first digit: 3 or 8
			if(!($firstDigit == 3 || $firstDigit == 8)){
				$errMsg .= "<p>Postcode Error: VIC selected. Postcode must start with 3 or 8 </p>\n";
			}
		}
		if($state == "NSW"){ // NSW state's first digit: 1 or 2
			if(!($firstDigit == 1 || $firstDigit == 2)){
				$errMsg .= "<p>Postcode Error: NSW selected. Postcode must start with 1 or 2 </p>\n";
			}
		}

		if($state == "QLD"){ // QLD state's first digit: 4 or 9
			if(!($firstDigit == 4 || $firstDigit == 9)){
				$errMsg .= "<p>Postcode Error: QLD selected. Postcode must start with 4 or 9 </p>\n";
			}
		}

		if($state == "NT"){ // NT state's first digit: 0
			if(!($firstDigit == 0)){
				$errMsg .= "<p>Postcode Error: NT selected. Postcode must start with 0 </p>\n";
			}
		}

		if($state == "WA"){ // WA state's first digit: 6
			if(!($firstDigit == 6)){
				$errMsg .= "<p>Postcode Error: WA selected. Postcode must start with 6 </p>\n";
			}
		}

		if($state == "SA"){ // SA state's first digit: 5
			if(!($firstDigit == 5)){
				$errMsg .= "<p>Postcode Error: SA selected. Postcode must start with 5 </p>\n";
			}
		}

		if($state == "TAS"){ // TAS state's first digit: 7
			if(!($firstDigit == 7)){
				$errMsg .= "<p>Postcode Error: TAS selected. Postcode must start with 7 </p>\n";
			}
		}

		if($state == "ACT"){ // ACT state's first digit: 0
			if(!($firstDigit == 0)){
				$errMsg .= "<p>Postcode Error: ACT selected. Postcode must start with 0 </p>\n";
			}
		}


	}

	// Validation Rule 9: Validate Email Address
	//Source: Slide 20 - Week 9 Lecture Notes
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errMsg .= "<p>Email: Invalid Email Format </p>\n";
	}



	// Validation Rule 10: Phone number must contain between 8 to 12 digits with spaces
	if(!preg_match("/^(\s*\d\s*){8,12}$/",$phonenumber)){
		$errMsg .= "<p>Phone Number: must contain between 8 to 12 digits with spaces </p>\n";

	}


	// Validation Rule 11: Other TextArea Not empty if other skill check box is selected
	if(isset($_POST["skills"])){ // Check whether user has selected any skills
		$checkedStatus = false;
		for($i = 0 ; $i < count($skillarray) ; $i++){ // Determine whether the "other skill" checkbox was ticked.
			if($skillarray[$i]=="other"){
				$checkedStatus = true;
			}
		}

		if($checkedStatus == true){ // if other skill checkbox is selected, then skills description can't be empty
			if(strlen($otherskillstext) == 0){
				$errMsg .= "<p> Other Skills: Other Skill Checkbox Selected. Must fill in other skills text box </p>\n";
			}
		}
	}



	// Display Erorr Message if it exists
	if($errMsg != ""){
		echo "<h1> Errors in Form </h1>\n";
		echo $errMsg;
	} else {
		echo "<h1>Form Data: </h1>\n";
		echo "<p>JobRef is $jobRef <br/>
			Your first name is $firstname <br/>
			Your last name is $lastname <br/>
			Your gender is $gender <br/>
			Your date of birth is $birthdate <br/>
			Your street address is $streetaddress <br/>
			Your suburb is $suburb <br/>
			Your state is $state <br/>
			Your postcode is $postcode <br/>
			Your email is $email <br/>
			Your phonenumber is $phonenumber <br/>
			Your skills is $listskill <br/>
			Your otherskills is $otherskillstext
		</p>";

	}
	


	/******************************* PART 3: INSERT RECORD INTO THE DATABASE ***************************************/
	if($errMsg == ""){ // ONLY INSERT IF THERE IS NO ERRORS IN FORM
		require_once("settings.php"); // Connection Information (i.e. host, user, pwd, database name)

		$conn = @mysqli_connect($host,$user,$pwd,$sql_db);




		// Checks if connection is successful
		if(!$conn){ 	// CASE1: Connection not successful
			echo "<p>ERROR: Failed to connect to database </p>";
		} else { // Case 2: Connection is sucessful

			$sql_table = "eoi";

			// Source: http://www.learningaboutelectronics.com/Articles/How-to-check-if-a-MySQL-table-exists-using-PHP.php
			// Check whether the eoi table exists
			// Postcode is varchar because int does not store leading 0's. E.g. Postcode 0001 will be stored as 1 with int
			$query = "CREATE TABLE eoi (
    		EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    		jobref VARCHAR(5),
    		fname VARCHAR(20),
    		lname VARCHAR(20),
   			streetname VARCHAR(40),
    		suburb VARCHAR(40),
   			state VARCHAR(15),
    		postcode VARCHAR(4),
		    email VARCHAR(100),
		    phonenumber VARCHAR(20),
		    skills VARCHAR(400),
		    otherskills VARCHAR(100),
		    status VARCHAR(10) DEFAULT 'NEW'
    		)";

    		// Check whether table eoi exists
			$tableStatus = mysqli_query($conn,"Select * FROM $sql_table");	
			if($tableStatus == false){ // If Table does not exist, then create the table in the database
				$result = mysqli_query($conn,$query); // Create the table.
				if($result == false){ // Check whether the table was succesfully created.
					echo "<p>ERROR: Something went wrong with creating the table </p>";
				}
			} 




			// SQL INSERTION Query stored in a string
			$query = "insert into $sql_table (jobref,fname,lname,streetname,suburb,state,postcode,email,phonenumber,skills,otherskills) values ('$jobRef','$firstname','$lastname','$streetaddress','$suburb','$state','$postcode','$email','$phonenumber','$listskill','$otherskillstext')";

			// Execute Query
			$result = mysqli_query($conn,$query);

			// Checks if the execution was successful
			if(!$result){
				echo "<p>ERROR: Something wrong with SQL query </p>";
			} else {
			// Source: https://www.php.net/manual/en/mysqli.insert-id.php
			$eoinumber = mysqli_insert_id($conn);
			echo "<h4>SUCCESS: Your application has been added with record EOInumber $eoinumber</h4>";
			}

			mysqli_close($conn);
		}
	} 






?>


</body>
</html>