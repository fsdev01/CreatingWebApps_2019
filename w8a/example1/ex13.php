<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 13 - conditionals </title>
</head>
<body>
    <h1>Exercise 13 - Conditionals</h1>
    <?php
        $exampleVar = 5;
        if($exampleVar == 5){
            echo "<p>The condition evaluates to true. </p>";
            echo '<p>$exampleVar is equal to ',$exampleVar,".</p>";
            echo "<p>Each of these lines will be printed</p>";
        }
    echo "<p>This statement will execute after the 'if'. </p>";
    
    
        $today = "Tuesday";
        if($today == "Monday")
            echo "<p>Today is Monday</p>";
        else
            echo "<p>Today is not Monday</p>";
    
        $color = "red";
        switch ($color) {
            case "red":
                echo "Red!";
                break;
            case "blue":
                echo "Blue!";
                break;
            case "green":
                echo "Green!";
                break;
            default:
                echo "Some other color!";
        }
    ?>
    
</body>
    
</html>