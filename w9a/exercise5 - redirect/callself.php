<!DOCTYPE html>
<html lang="en">
<body>

<?php
	if(isset($_POST["submit"]))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		echo "<h1>Welcome $fname $lname! </h1>";

	} else {
?>


<!-- action='callself.php' alternative-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<input type="text" name="fname"><br>
	<input type="text" name="lname"><br>
	<input type="submit" name="submit" value="login"><br>
</form>

<?php
}
?>

<hr>
<h2> Welcome to Creating Web Applications! </h2>
<h3> We will learning HTML, CSS, JavaScript, PHP and MySql. </h3>
</body>
</html>