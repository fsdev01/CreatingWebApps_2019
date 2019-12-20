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
if (isset($_GET['fname'])) {
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];

	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
}

if(isset($_SESSION['fname'])){
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	echo "<p>Welcome $fname $lname. </p>";

}
?>

<h1> page 2 </h1>
<p> This is page 2 </p>

</body>
</html>