<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> My First PHP code executed by the server</title>
</head>
<body>
    <h1>Multiple Script Sections</h1>
    <h2>First Script Section</h2>
    <?php echo "<p>Output from the first " . "script section.</p>\r\n"; ?>
    <h2>Second Script Section</h2>
    <?php echo "<p>Output from the second " . "script section.</p>\r\n"; 
    // Handle images
    echo "<img src=\"logo.png\" />\r\n";
    
    ?>

</body>
</html>