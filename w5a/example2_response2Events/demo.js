/*
 Purpose: Demonstrate JS Basics
 Author: A Lectuer
*/

"use strict";
function changeBg()
{
    var hd1= document.getElementById("hd1");
    hd1.style.backgroundColor = "yellow";
}

function changeText()
{
    var para2 = document.getElementById("para2");
    para2.textContent = "We are learning JS";
    
}

function changeTextColor()
{
    var hd1 = document.getElementById("hd1");
    hd1.textContent = "JavaScript Introduction";
    hd1.style.color = "red";
}

function init()
{
    var para1 = document.getElementById("para1");
    para1.onclick = changeText;
    
    var para2 = document.getElementById("para2");
    para2.onclick = changeBg;
    
	// Exercise: when para 3 is clicked, 
	//          - change the h1 text to "Javascript Introduction"
	//          - chang the h1 text color to red (hint: use .style.color  )
    var para3 = document.getElementById("para3");
    para3.onclick = changeTextColor;
     
    
    
}

window.onload = init;