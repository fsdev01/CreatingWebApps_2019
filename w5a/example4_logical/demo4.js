"use strict";
function display() {
    var x;
    var age = prompt("Please enter your age:");
    var state = prompt("Input State such as vic,nsw,qld,wa,tas");
    if(state.toUpperCase() == "VIC" && age > 20)
    {
        x = "You can join the climbing club";        
    } 
    else if( state.toUpperCase() == "NSW")
    {
        x = "You can join the climbing club";   
    }
    else
    {
        x = "Sorry, you cannot attend the climbing club";  
    }
    
    /*
    if(age >=18 && age <= 28)
        x = "You can join the climbing club.";
    else
        x = "Sorry, you cannot attend the climbing club";
    */
    var hd1 = document.getElementById("hd1");
    hd1.textContent = x;
    
}

function init() {
    var clickme = document.getElementById("clickme");
    clickme.onclick = display;
}

window.onload = init;