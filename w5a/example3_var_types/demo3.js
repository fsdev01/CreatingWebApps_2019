"use strict";
function display()
{
    
    // Mix types
    var x = "hello";
    x = x + 4;
    
    var hd1 = document.getElementById("hd1");
    hd1.textContent = x;
}

function init()
{
    var btn = document.getElementById('clickme');
    btn.onclick = display;
}

window.onload = init;