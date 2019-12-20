<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 6 </title>
</head>
<body>
    <h1>Exercise 6 - Variables</h1>
    <?php
        $votingAge = 18;
        echo $votingAge;
    
        for($i=0; $i<10 ; $i++){
            echo "<p>Number " , $i +1 , "</p>";
            // The addition of 1 won't work in these below contexts/situations
            echo "<p>Number " . $i . "</p>";
            echo "<p>Number $i  </p>";
        }
    ?>
    
</body>
    
</html>