<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 12 - Variables</title>
</head>
<body>
    <h1>Exercise 12 - Understanding Varibales</h1>
    <?php
        function testScope(){
            $localVariable = "<p>Local Variable </p>";
            echo "<p>$localVariable</p>";
            // prints successfully.
        }
        
        $globalVariable = "Global Variable";
        testScope();
        echo "<p>$globalVariable</p>";
        //echo "<p>$localVariable</p>"; // Error Message
    
        // global keyword - not good practice. sol: pass var as paramters 
        function test2(){
            global $globalVar;
            echo "<p>$globalVar</p>";
        }
        $globalVar = "Global Variable";
        test2();
    
    ?>
    
</body>
    
</html>