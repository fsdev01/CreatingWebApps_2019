<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<?php
	include_once("nav.inc");
?>

<?php
session_start();
$_SESSION = array(); // reset the session global variable
session_destroy();
echo "<p>Session is destroyed.</p>"

?>
</body>
</html>