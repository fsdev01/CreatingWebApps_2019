<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="process"/>
    <meta name="author" content="VH"/>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>

<!-- Begin processing -->
<?php
    
    //Sanitise Input
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    //Checks if process was triggered by a form submit, if not display error message
    // Variable 1: firstname
    if(isset($_POST["firstname"])){
        $firstname = $_POST["firstname"];
        $firstname = sanitise_input($firstname);
        //echo "<p>This is a test: Your first name is $firstname </p>\r\n";
    } else {
        // Display error message, if process not triggered by a form submit
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
        // Redirect to form, if process not triggered by a form submit
        header("location: register.html");
        
    }
    // assign the rest of the form values to PHP variables here ...
    
    //Variable 2: lastname
    if(isset($_POST["lastname"])){
        $lastname = $_POST["lastname"];
        $lastname = sanitise_input($lastname);
        //echo "<p>This is a test: Your last name is $lastname </p>\r\n";
    }
    
    //Variable 3: age
    if(isset($_POST["age"])) {
        $age = $_POST["age"];
        $age = sanitise_input($age);
        //echo "<p>This is a test: Your age is $age </p>\r\n";
    }
    
    //Variable 4: food
    if(isset($_POST["food"])) {
        $food = $_POST["food"];
        $food = sanitise_input($food);
        //echo "<p>This is a test: Food is $food </p>\r\n";
        if($food =="none"){
            echo "<p>Warning: Please select a menu preference </p>\r\n";
        }
    }
    
    //Variable 5: partySize
    if(isset($_POST["partySize"])) {
        $partySize = $_POST["partySize"];
        $partySize = sanitise_input($partySize);
        //echo "<p>This is a test: partySize is $partySize </p>\r\n";
    }

    // Variable 6: species radio
    if(isset($_POST["species"])){
        $species = $_POST["species"];
        $species = sanitise_input($species);
    } else {
        $species = "Unknown species";
    }
    
    //Variable 7: Tour
    $tour = "";
    
    //$tripArray = $_POST["trips"];
    //echo "<p>Special:" . count($tripArray) . " - " . empty($tripArray) . " </p>\r\n";
    
    
    if(isset($_POST["trips"])){
        $trips = $_POST["trips"];
        $nTrips = count($trips);
        for($i = 0 ; $i < $nTrips ; $i++){
            $tour = $tour . $trips[$i] . "trip ";
        }
    } else {
        echo "<p>Error: Zero Trips Selected <p>";
    }
    


    $errMsg = ""; // Store Error Message 
    // Validate Age
	if($age == ""){
		$errMsg = $errMsg ."<p>Please enter your age .</p>";
	} else if(!is_numeric($age)){  
		$errMsg = $errMsg . "<p>Only digits allowed in your age .</p>";
	} else if($age < 18 || $age >=10000){ 	// Check Age
		$errMsg = $errMsg . "<p>Your age must not be less 18 or more than 10,000</p>";
	} else {
        echo "<p> Welcome $firstname $lastname <br/>
              You are booked on the $tour <br/>
              Species: $species <br/>
              Age: $age <br/>
              Meal Preference: $food <br/>
              Number of Travellers: $partySize </p>\r\n";
    }
    
    

    
?>
    
</body>
</html>