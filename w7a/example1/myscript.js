/*
  1) getELementById or getElementsByTagName
  2) access html objec attributes
  3) document.getELementsByTagName / obj.getELementsByTagName
*/
"use strict";
function myFunction() {
    
    // return array or html collection of 6 input objects
    // example of using getElementsByTagName
    //var inputElement = document.getElementsByTagName("input");
    
    
    var inputElement = document.getElementById("colors").getElementsByTagName("input");
    var msg="";
    for(var i = 0 ; i < inputElement.length; i++){
        msg += inputElement[i].value + " " + inputElement[i].checked + "<br/>";
    }
    document.getElementById("demo").innerHTML = msg;
}

function init()
{
    var btn = document.getElementById("clickme");
    btn.onclick = myFunction;
}

window.onload = init;