// Change the image by modifying the "src" attribute and textContent
"use strict";
var running;
var currentImg = 0; // set start position as global
var theImages = new Array("img0.png","img1.png","img2.png");
var theTexts = new Array("text0","text1","text2");

function cycleImage()
{
    var figImg = document.getElementById("picImage");
    var figCap = document.getElementById("picText");
    if(document.images){
        currentImg++;
        currentImg = currentImg % theImages.length; // values 1 2 0 1 2 0
        figImg.src = theImages[currentImg];
        figCap.textContent = theTexts[currentImg];
    }
    
}

function startSlideShow(){
    // Notice the "cycleImage()"
    // Every 2000 milliseconds = 2 seconds call function cycleImage()
    running = setInterval("cycleImage()",2000); // 2 secs
}

function stopSlideShow(){
    window.clearInterval(running);
}

function init() {
    document.getElementById("start").onclick = startSlideShow;
    document.getElementById("stop").onclick = stopSlideShow;
}

window.onload = init;