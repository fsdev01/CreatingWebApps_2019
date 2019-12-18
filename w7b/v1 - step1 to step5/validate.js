"use strict";

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
        errMsg += "You must select one specicies\n";
        result = false;
    }
        
    if(errMsg != ""){ //only display message box if there is something to show
        alert(errMsg);
    }
    return result; // if false the information will not be sent to the server
}


function init() {
    var regForm = document.getElementById("regform");
    regForm.onsubmit = validate;
}


window.onload = init;