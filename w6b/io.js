/**
*Author: VH
*Target: clickme.html
*Purpose: Demo Purposes
*Created: 17 Dec 2019
*Last Modified: 17 Dec 2019
*Credit
**/
"use strict"; // prevent creation of global variables in functions

function promptName(){
    var sName = prompt("Enter your name.\nThis prompt should show up when the \nClick Me button is clicked.","Your Name");
    alert("Hi there " + sName + ". Alert boxes are a quick way to check the state\n of your variables when you are developing code.");
    rewriteParagraph(sName);
    
    
}

function rewriteParagraph(userName){
    // 1. get a reference to the element with id “message” and assign it to a local variable
    // 2. write text to the html page using the innerHTML property
    var message = document.getElementById("message");
    message.innerHTML = "Hi " + userName + ". If you can see this you have sucessfully overwitten the contents of this paragraph.Congratulations!!";
}

function writeNewMessage(){
    var message = document.getElementById("msg2");
    message.textContent = "You have now finished Task 1";
    
}

//this function is called when the browswer window loads
// it will register functions that will respond to browser events
function init()
{
    var clickMe = document.getElementById("clickme");
    clickme.onclick = promptName;
    //var clickHd = document.getElementById("hd1");
    var clickHd = document.getElementsByTagName("h1")[0];
    clickHd.onclick = writeNewMessage;
}

window.onload = init;