<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 1 - Week 9 </title>
</head>
<body>
    <h1>PHP Exercise 1 - Revision</h1>
    <?php
    	$arr = ["a","b","c"];

    	// remove 2nd element
    	unset($arr[1]);
    	// if removal frequently, use linkedlinked -> php library linked list

    	// pre is needed to print out the array because structured format is required
    	echo "<pre>";
    	print_r($arr);
    	echo "</pre>";

    	// var_dump provides more information about the variable
    	var_dump($arr);

    	// server name
    	echo $_SERVER['SERVER_SOFTWARE'];
    	// server protocol
    	echo $_SERVER['SERVER_PROTOCOL'];



    ?>
    
</body>
    
</html>