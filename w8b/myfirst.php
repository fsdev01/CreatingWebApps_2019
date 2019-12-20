<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Using PHP Variables, arrays and operators</title>
    <!-- add other meta -->
    <meta name="description" content="First PHP Lab"/>
    <meta name="keywords" content="php,lab"/>
    <meta name="author" content="VH"/>
</head>
<body>
    <h1> Creating Web Applications - Lab08</h1>
<?php
    $marks = array(85,85,95); // declare and initalise array
    $marks[1] = 90; // modify second element
    $ave = ($marks[0] + $marks[1] + $marks[2]) / 3 ; // Compute Arrays
    if($ave >= 50){
        $status = "PASSED";
    } else {
        $status = "FAILED";
    }
    echo "<p>The average score is $ave. You have $status</p>\r\n";
    
?>
</body>
</html>