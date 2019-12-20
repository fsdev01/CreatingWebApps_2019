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

<h1> page 4 </h1>
<p> This is page 4</p>

</body>
</html>