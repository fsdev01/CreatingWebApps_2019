<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Using PHP Variables, arrays and operators</title>
    <!-- add other meta -->
    <meta name="description" content="Task 2 - Lab 8"/>
    <meta name="keywords" content="php,lab"/>
    <meta name="author" content="VH"/>
</head>
<body>
    <h1> Creating Web Applications - Lab8 Task 2</h1>
<?php
    $days = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    $daysString = "";
    foreach($days as $day){
        if($daysString == ""){
            $daysString = $day;
        } else {
            $daysString = $daysString . ", $day";
        }
    }
    
    echo "<p>The Days of the week in English are:  $daysString </p>\r\n";
    
    $days = array("Dimanche","Lundi","Mardi","Mercredi","Thursday","Jeudi","Vendredi","Samedi");
    $dayString = "";
    foreach($days as $day){
        if($dayString == ""){
            $dayString = $day;
        } else {
            $dayString = $dayString . ", $day";
        }
    }
    
    echo "<p>The Days of the week in French are: $dayString </p>\r\n";
?>
</body>
</html>