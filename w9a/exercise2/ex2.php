<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="Intro,PHP"/>
    <meta name="author" content="VH"/>
    <title> PHP Exercise 2 - Week 9 </title>
</head>
<body>
    <h1>Application Form</h1>

    <form method="post" action="process.php">
	    <p>
	    	First Name: <input type="text" name="fname"/>
	    </p>
	    <p>
	    	Last Name: <input type="text" name="lname"/>
	    </p>
	    <p>
	    	Email: <input type="text" name="email"/>
	    </p>
	    <p> Please select:
	    	<input type="radio" name="gender" value="M"/>Male
	    	<input type="radio" name="gender" value="F"/>Female
	    </p>
	    <p>
	    	<input type="submit" value="Process"/>
	    </p>
	</form>


    <?php



    ?>
    
</body>
    
</html>