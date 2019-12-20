<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 8 </title>
</head>
<body>
    <h1>Exercise 8 - Constants ...</h1>
    <?php
    
        //const MAX_VAL=5;
        define("MAX_VAL",8);
        echo "<ol>";
        for($i=0; $i < MAX_VAL ; $i++){
            echo "<li> item ", $i+1,"</li>\r\n";
        }
    echo "</ol>\r\n"
        
    ?>
    
</body>
    
</html>