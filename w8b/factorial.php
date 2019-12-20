<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Week 8 Lab Task 3</title>
    <!-- add other meta -->
    <meta name="description" content="Week 8 Lab Task 3"/>
    <meta name="keywords" content="php,lab"/>
    <meta name="author" content="VH"/>
</head>
<body>
<?php
    include("mathfunctions.php");
?>
    <h1> Creating Web Applications - Week 8 Lab Task 3</h1>
<?php
    $num = 5; // enter some different values here to test - remove later
    if (isPositiveInteger($num)){ // call the function defined in step 1 task 3
        echo "<p>",$num,"! is ", factorial($num), ".</p>\r\n"; // ditto for factorial
    } else { // number is not integer
        echo "<p>Please enter a positive integer.</p>\r\n";
    }
    echo "<p><a href='factorial.html'>Return to the Entry Page </a></p>\r\n";
    
?>
</body>
</html>