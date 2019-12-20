<!DOCTYPE html>
<html lang="en">
<body>
<?php
	$goal = $_POST["goal"];

	//example of redirection 
	if(preg_match("/play/",$goal))
		// implied window.location
		header("location:play?id=56");
	else
		header("locaation:study.php");
?>


</body>
</html>