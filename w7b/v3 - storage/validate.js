"use strict";

// check if session data on user exists and if so prefill the form 
function prefill_form(){
    if(sessionStorage.firstname != undefined){ // if storage for username is not empty
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("age").value = sessionStorage.age;
        document.getElementById("partySize").value = sessionStorage.partysize;
        document.getElementById("food").value = sessionStorage.food;
        
        
        switch(sessionStorage.species){
            case "Human":
                document.getElementById("human").checked = true;
                break;
            case "Dwarf":
                document.getElementById("dwarf").checked = true;
                break;
            case "Hobbit":
                document.getElementById("hobbit").checked = true;
                break;
            case "Elf":
                document.getElementById("elf").checked = true;
                break;
        }
        
        // Convert string to array
        var tripsString = sessionStorage.trip;
        var tripsArray = tripsString.split(",");
        for(var i = 0; i < tripsArray.length ; i++){
            var dayValue = tripsArray[i];
            if(dayValue == "1day"){
                document.getElementById("1day").checked = true;
            } else if(dayValue == "4day"){
                document.getElementById("4day").checked = true;
            } else if(dayValue == "10day"){
                document.getElementById("10day").checked = true;
            }
        }
    }
}


// return the species selected as string
function getSpecies(){
    // intialise variable in case does not get reinitialised properly
    var speciesName = "Unknown";
    
    // Use getElementsByTagName to get all input elements
    var speciesArray = document.getElementById("species").getElementsByTagName("input");

    for(var i = 0 ; i < speciesArray.length ; i++){
        if(speciesArray[i].checked){
            speciesName = speciesArray[i].value;
        }
    }
    return speciesName;
}

// if rule violated return error message
function checkSpeciesAge(age){
    // Assume the parameter age has already been checked for general contraints e.g. > 18
    var errMsg = "";
    var species = getSpecies();
    switch(species){
        case "Human":
            if(age > 120){
                errMsg = "You can't be a Human and over 120.\n";
            }
            break;
        case "Dwarf": // note no break so next case will be selected if dwarf
        case "Hobbit":
            if (age > 150 ){
                errMsg = "You cannot be a " + species + " and over 150.\n";
            }
            break;
        case "Elf": // eleves can be any age so no error possible
            break;
        default:
            errMsg = "We don't allow your kind on our tours.\n";
    }
    return errMsg;
}


function checkBeardLength(){
    var age = document.getElementById("age").value;
    var beardlength = document.getElementById("beard").value;
    var errMsg = "";
    var species = getSpecies();
    
    if(species=="Dwarf" && age > 30){
        if(beardlength <= 12){
            errMsg = "Dwarf is > 30 years old must have beard length > 12 inches\n";
        }
    }
    
    if(species=="Elf" || species=="Hobbit" ){
        if(beardlength != 0){
            errMsg = species + "cannot have beard.It must be 0 inches.\n";
        }
    }
    
    return errMsg;
    
}

function validate() {
    //Initalise local variables
    var errMsg = ""; // stores the error message
    var result = true; // assumes no errors
    
    //get variables from FORM and check rules 
    // if something is wrong set result = false, and concatenate error message
    // ...
    
    
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var age = document.getElementById("age").value;
    var noOfTrav = document.getElementById("partySize").value;
    var foodOption = document.getElementById("food").value;

    // Case 1: Check for valid first name
    if(!firstname.match(/^[a-zA-Z]+$/)){
        errMsg +="Your first name must only contain alpha characters\n";
        result = false;
    }
    
    // Case 2: Check for valid last anme
    if(!lastname.match(/^[a-zA-Z\-]+$/)){
        errMsg += "Your last name must only contain alpha characters or hyphens \n";
        result = false;
        
    }
    
    // Case 3: Check for valid age
    if(isNaN(age)){
        errMsg +="Age is not a valid number\n";
        result = false;
    } else if (age < 18){
        errMsg += "Your age must be 19 or older\n";
        result = false;
    } else if (age >=1000){
        errMsg += "It is infeasible that you are that old!!!\n";
        result = false;
    } else { // Each Species must have valid age
        var tempMsg = checkSpeciesAge(age);
        if(tempMsg != ""){
            errMsg += tempMsg;
            result = false;
        }
    }
    
    // Case 4: Check number of travellers is valid b/w 1 and 100
    if(isNaN(noOfTrav)){
        errMsg +="The Number of Travellers is not a valid number\n";
        result = false;
    } else if(noOfTrav < 1 || noOfTrav > 100){
        errMsg +="Invalid Number of Travellers.Must be between 1 and 100.\n";
        result = false;
    }
    
    // Case 5: Check a food option from the menu is selected
    if(foodOption == "none"){
        errMsg +="You must select a food preference\n";
        result = false;
    }
    
    // Case 6: Check that at least one trip is selected
    var is1day= document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if(!(is1day || is4day || is10day)){
       errMsg +="Please select at least 1 trip";
       result = false;
    }
    
    // Case 7: Check that a species is selected
    var isHuman = document.getElementById("human").checked;
    var isDwarf = document.getElementById("dwarf").checked;
    var isElf = document.getElementById("elf").checked;
    var isHobbit = document.getElementById("hobbit").checked;
    
    if(!(isHuman||isDwarf||isHobbit ||isElf)){
        errMsg += "You must select one species\n";
        result = false;
    }
        
    // Case 8: Check Beard Length
    var tempErr = checkBeardLength();
    if(tempErr!=""){
        errMsg +=tempErr;
        result = false;
    }
    
    
    if(errMsg != ""){ //only display message box if there is something to show
        alert(errMsg);
    } else {
        storeBooking(firstname,lastname,age,getSpecies(),is1day,is4day,is10day); // only store data in webStorage when they are valid
    }
    return result; // if false the information will not be sent to the server
}


/* Store data in the sessionStorage */
function storeBooking(firstname,lastname,age,species,is1day,is4day,is10day){
    // get value and assign them to sessionStorage attribute
    // we use the same name for the attribute and the element id to avoid confusion
    
    // Store Trip Value
    var trip = "";
    if(is1day){
        trip = "1day";
    }
    if(is4day){
        if(trip==""){
            trip = "4day";
        }else{
            trip+=", 4day";
        }
    }
    if(is10day){
        if(trip==""){
            trip="10day";
        } else{
            trip +=", 10day";
        }
    }
    sessionStorage.trip = trip;
    
    // Store other values
    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.age = age;
    sessionStorage.species = species;
    sessionStorage.food = document.getElementById("food").value;
    sessionStorage.partysize = document.getElementById("partySize").value;;
    
    alert("Trip stored: " + sessionStorage.trip); // testing purposes
}
function init() {
    var regForm = document.getElementById("regform");
    regForm.onsubmit = validate;
    prefill_form();
}


window.onload = init;