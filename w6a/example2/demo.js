"use strict";

function redClicked(){
    var red = document.getElementById("red");
    var green = document.getElementById("green");
    red.style.backgroundColor = "red";
    green.style.backgroundColor = "white";
    
}

function greenClicked(){
    var green = document.getElementById("green");
    var red = document.getElementById("red");
    green.style.backgroundColor = "green";
    red.style.backgroundColor = "white";
}



function init() {
    var red = document.getElementById("red");
    red.onclick = redClicked;
    
    var green = document.getElementById("green");
    green.onclick = greenClicked;
}

window.onload = init;