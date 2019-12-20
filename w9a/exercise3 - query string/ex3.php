<!DOCTYPE html>
<html lang="en">
<?php
	$id = array(1001,1002,1005);
	$tool_name = array("Screw Driver","Hammer","Saw");
	$price = array(21.5,53,21.3);
?>

<body>
	<table border="1">
		<tr>
			<th>id</th>
			<th>tool name </th>
			<th>tool price </th>
		</tr>
<?php
	// Exmaple of passing as URL 
	for($i=0; $i < count($id); $i++){
		echo "<tr>";
		echo "<td>$id[$i]</td>
			  <td>$tool_name[$i]</td>
			  <td>$price[$i]</td>
			  <td><a href='process.php?toolID=$id[$i]'>Edit</a></td>
			  ";
		echo "</tr>";
	}
?>
	</table>
</body>