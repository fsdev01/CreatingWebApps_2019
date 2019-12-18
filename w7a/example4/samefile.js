

function init2(){
    // Get the filename of the page that is loaded
    var pageId = window.location.href.substr(window.location.href.lastIndexOf("/") +1);
    
    // Perform the respective initalisation based on which HTML loads the JS file
    if(pageId == "page1.html"){
        alert("page1");
    }
    if(pageId == "page2.html"){
        alert("page2");
    }
    if(pageId == "page3.html"){
        alert("page3");
    }

}


function init(){

    var msg = document.getElementById("message");
    if(sessionStorage.lastPage != undefined){
        msg.textContent = "The last page you visited was " + sessionStorage.lastPage;
    } else{
        msg.textContent = "This is the first page you have visited!";
    }
    
    var menu = document.getElementsByTagName("nav");
    
    if(document.getElementById("p1") != null){
        // initialisation statements for Page 1
        var menu1 = menu[0].getElementsByTagName("a")[0];
        menu1.className = "current";
        sessionStorage.lastPage = "Page 1";
    }
    else if (document.getElementById("p2") !=null){
        var menu2 = menu[0].getElementsByTagName("a")[1];
        menu2.className = "current";
        sessionStorage.lastPage = "Page 2";
    }
    else if(document.getElementById("p3")!= null){
        // page 3 
        var menu3 = menu[0].getElementsByTagName("a")[2];
        menu3.className = "current";
        sessionStorage.lastPage = "Page 3";
    }
}

window.onload = init;