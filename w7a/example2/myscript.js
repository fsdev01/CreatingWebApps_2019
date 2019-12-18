"use strict";
function myFunction() {
    
    // Change things on the fly
    var para = document.getElementById("demo");
    // Change Css by using JS
    para.style.width = "400px";
    para.style.backgroundColor  = "lightblue"; // camel case
    para.style.border = "dashed 5px red";
    para.style.fontSize = "40px"; // camel case
    // Change css by adding ".orange" class
    para.className = "orange"; // add the "class" attribute to the "demo" object
}

function init() {
    var btn = document.getElementById("clickme");
    btn.onclick = myFunction;
}

window.onload = init;