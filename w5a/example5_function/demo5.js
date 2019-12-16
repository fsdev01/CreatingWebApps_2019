"use strict";

// Calculate a dog's age in human years
function calcPuppyAge(age){
    var dogYears = age *  7; 
    return dogYears;
}

function sum(x,y){
    var s = x + y;
    return s;
}

function display(){
    //var x = sum(10,20);
    var x = sum("Hello ","World");
    
    var hd1= document.getElementById("hd1");
    hd1.textContent = x;
}

function init(){
    var clickme = document.getElementById("clickme");
    clickme.onclick = display;
    
    var temp = prompt("Enter Puppy's age:");
    alert("Your doggie is " + calcPuppyAge(temp) + " years old in dog years");
    
}

window.onload = init;