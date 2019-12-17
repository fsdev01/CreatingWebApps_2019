"use strict";

function myFunction(){
    var myV;
    
    var str1="hello";
    var str2 = new String("Welcome to CWA!");
    
    myV = typeof(str1) + " ... " + typeof(str2);
    
    // Notice case insensitive
    //myV = str2.replace(/cwa/i,"Creating Web Applications");
    
    // Exercise: use string method toUpperCase() to convert str2 to uppercase
    
    var myH1 = document.getElementById("welcome");
    myH1.textContent = myV;
    
}

function init(){
    // Note that JS will automatically convert string primitive to String object.
    document.getElementById("button").onclick=myFunction;
}

window.onload = init;