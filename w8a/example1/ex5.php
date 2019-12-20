<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 5 </title>
</head>
<body>
    <h1>Exercise 5</h1>
    <?php
        for($i = 1 ; $i < 7 ; $i++){
            echo "<h$i>";
    ?>
    Heading
    <?php
            echo "$i </h$i> \r\n"; } 
            
    ?>
    
    <?php
        $votingAge = 18;
        echo $votingAge;
    ?>
    
</body>
    
</html>