"use strict";

function addCuteThing(){
    var cuteThing = prompt("Add another cute thing","");
    var cute_list = document.getElementById("cute_list");
    var item = document.createElement("LI");
    var itemText = document.createTextNode(cuteThing);
    item.appendChild(itemText);
    cute_list.appendChild(item);
}


function changeTextColor(){
    var body = document.getElementById("main");
    var p = document.getElementById("color_set");
    body.style.color = "green";
}

function changeAnyTextColor(){
    var body = document.getElementById("main");
    body.style.color = document.getElementById("color_picker").value;
}

function getCatName(){
    var catname = prompt("What is the name of your cat?","Mystery");
    return catname;
}

function init(){
    
    // Update header with cat's name
    var catname = getCatName();
    var title_name = document.getElementById("catname");
    title_name.textContent = catname;
    
    // replace existing HTML content - method
    var replaceStr = "<h2> All About <em>"+catname +"</em></h2>";
    document.getElementById("replaceThisHTML").innerHTML = replaceStr;
    
    
    
    
    // Add new item to list
    document.getElementById("add_cute").onclick = addCuteThing;
    
    // Change body text to green
    document.getElementById("color_set").onclick = changeTextColor;
    
    // Change body text to any color
    document.getElementById("color_picker").onchange = changeAnyTextColor;
    
    cat_picture.onclick = changePicColor;
}

function changePicColor(){
    var e2 = document.getElementById("cat_picture");
    if(e2.style.backgroundColor == "lightblue")
        e2.style.backgroundColor = "white";
    else
        e2.style.backgroundColor = "lightblue";
}

window.onload = init;