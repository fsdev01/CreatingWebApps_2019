function getinput(){
    var inMsg = prompt("What is your name?");
    var msgLabel = document.getElementById("mymessage");
    msgLabel.textContent = "Hello " + inMsg;
}

function tarray(){
    var scores = [3,4,1,5,4];
    var num; // current number
    var ans = ""; // string for temp output
    var msg = ""; // string for final output
    
    // Demonstrates how to use for-in loop
    for (var i=0; i < scores.length ; i++){
        num = scores[i];
        ans = num.toString() + " : ";
        for (var j=0 ; j < num ; j++){
            ans = ans + "*";
        }
        msg = msg + ans + "\n";
    }
    alert(msg)
}

function getAgeInYears(dobStr){
    var age = -1;
    // store millisecs in non-leap year as constant
    const YEAR_IN_MILLISECS = 365 * 24 * 60 * 60 * 1000;
    var now = new Date();
    //var dobStr = document.getElementById("dob").value;
    //var dobStr = prompt("Enter your date of birth");
    var dmy = dobStr.split("/");
    var dob = new Date(dmy[2],dmy[1],dmy[0],0,0,0);
    return age = (now.valueOf() - dob.valueOf())/YEAR_IN_MILLISECS;
}

function isDobOK(dob){
    var validDOB = true; // set to false if not ok
    var now = new Date(); // set current date and time
    //var dob = document.getElementById("dob").value;
    var dateMsg = "";
    
    // split date into array with elements dd mm yyyy using / as separator
    var dmy = dob.split("/");
    // check each part of the date is a number
    for(var i = 0;  i < dmy.length; i++){
        if(isNaN(dmy[i])){
            dateMsg = dateMsg + "You must enter only numbers into the date" + "\n";
            validDOB = false;
        }
    }
    return validDOB;
}


function checkPhoneNumber(phoneNo){
    var phoneRE = /^\(\d\d\) \d\d\d\d-\d\d\d\d$/;
    var isOK = false;
    //if(phoneNo.match(phoneRE))
    if(phoneRE.test(phoneNo))
    {
        isOK = true;
    } else {
        alert("The phone number entered is invalid");
    }
    return isOK;
}
function init(){
    var clickbtn = document.getElementById("clickme");
    clickbtn.onclick = getinput;
    //tarray();
    //alert(isDobOK("1/1/19k90"));
    alert(checkPhoneNumber("(03) 9798-0000"));
    
    
    
}


window.onload = init;