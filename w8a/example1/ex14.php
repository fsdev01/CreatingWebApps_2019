<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 14 - HTML Special Characters </title>
</head>
<body>
    <h1>PHP Exercise 14 - HTML Special Characters</h1>
    <!-- The htmlspecialchars() function converts some predefined characters to HTML entities
        & (ampersand) becomes &quot;
        " (double quote) becomes &quot;
        ' (single quote) becomes &#039;
        < (less than) becomes &lt;
        > (greater than) becomes &gt;
    -->
    <?php
        $str1 = "<img src='logo.png' src='picture'/>";
        $str2 = htmlspecialchars($str1);
        
        echo "str1 is: ",$str1;
        echo "<hr>";
        echo "str2 is: ", $str2;
    ?>
    
</body>
    
</html>