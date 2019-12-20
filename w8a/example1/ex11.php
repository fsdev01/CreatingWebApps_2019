<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 11 - Functions</title>
</head>
<body>
    <h1>Exercise 11 - Functions</h1>
    <?php
        function printNames($name1,$name2,$name3){
            echo "<p>$name1</p>\r\n";
            echo "<p>$name2</p>\r\n";
            echo "<p>$name3</p>\r\n";
        }
    
        function printCompanyName($companyName){
            echo "<p>$companyName</p>\r\n";
        }
    
        function averageNumbers($a,$b,$c){
            $sum = $a + $b + $c;
            $result = $sum / 3;
            return $result;
        }
        printCompanyName("Web App Creators");
        echo "<p>",averageNumbers(6,5,4),"</p>\r\n";
        if(is_int(3)){
            echo "<p>Int Detected </p>\r\n";
        }
    
    echo str_replace("world","Peter","Hello world!");
    $arr = array("blue","red","green","yellow");
    $newArr = str_replace("red","pink",$arr,$i);
    print_r($newArr);
    echo "# of replacements: $i";
    
    if(isset($arr)){
        echo "Valid";
    }
    if(isset($doesNotExist)){
        echo "Variable set";
    } else {
        echo "Variable not set";
    }
        
    
        
    
    


        
    ?>
    
</body>
    
</html>