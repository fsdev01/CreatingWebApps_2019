/* FileName: lect5_htm_io
   Target HTML: main
   Purpose: demo
   Author: VH
   Date Written: 16 Dec 2019
   Revisions:

*/

"use strict";

function getInput() {
    var myString;
    myString = prompt("Enter the String","None");
    alert("Your output: " + myString);
    var outputMessage = document.getElementById("mymessage");
    outputMessage.textContent = "Your output: " + myString;
}


function init() {
    var clickme = document.getElementById("clickme");
    clickme.onclick = getInput;
}


window.onload = init;
