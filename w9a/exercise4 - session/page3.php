<!DOCTYPE html>
<html lang="en">
<head>
	<link href="style.css" rel="stylesheet"/>
</head>
<body>

<?php
	include_once("nav.inc");
?>

<?php
session_start();
if(isset($_SESSION['fname'])){
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	echo "<p>Welcome $fname $lname </p>";
}

?>

<h1> page 3 </h1>
<p> This is page 3</p>

</body>
</html>