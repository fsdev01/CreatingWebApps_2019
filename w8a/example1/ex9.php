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
    <h1>Exercise 9 - Arrays and others ...</h1>
    <?php
        $provinces = array("Newfoundland and Labrador",
                          "Prince Edward Island",
                           "Nova Scotia",
                           "New Brunswick",
                           "Quebec",
                           "Ontario",
                           "Manitoba",
                           "Saskatchenwan",
                           "Alberta",
                           "British Columbia"
                          );
        
        $provinces2[] = "Newfoundland and Labrador";
        $provinces2[] = "Prince Edward Island";
        $provinces2[] = "Nova Scotia";
        $provinces2[] = "New Brunswick";
        $provinces2[] = "Quebec";
    
        $territories = array("Nunavut","Northwest Territories","Yukon Territory");
    
    echo "<p>Canada's smallest province is $provinces[1]</p>\r\n";
    echo "<p>Canada's largest province is $provinces2[4].</p>\r\n";
    
    echo "<p>Canada has ", count($provinces), " provinces and ",count($territories), " territories.</p>\r\n";
    
    print_r($territories);
    
    $hospitalDepts = array("Anesthesia","Molecular Biology","Neurology");
    $hospitalDepts[0] = "Anesthesiology";
    
        
    ?>
    
</body>
    
</html>