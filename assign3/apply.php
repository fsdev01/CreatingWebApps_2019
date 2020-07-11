<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Apply for Position" />
	<meta name="keywords" content="Express,Interest,Application,Apply" />
	<meta name="author" content="Vinh Huynh"  />
	<title> Register Job Interest </title>

	<!-- Main Style Sheet -->
	<link href="styles/style.css" rel="stylesheet" type="text/css"/>
	<!-- Style Sheet for Apply Job Page -->
	<link href="styles/applystyle.css" rel='stylesheet' type="text/css"/>

	<!-- External Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"/>
	<!-- Link to enhancement script -->
	<script src="scripts/enhancementsTwo.js"></script>
	<!-- Link to validation script -->
	<script src="scripts/validate.js"></script>

</head>
<body>

<?php 
	include("header.inc"); // include common header
	include("menu.inc"); // include common menu
?> 


	<div class="content">
		<header>
			<h1 id="t1"> Register Job Interest </h1>
		</header>

		<!-- Input Controls as per requirements -->
		<form id="applyForm" method="post" action="processEOI.php" novalidate="novalidate">
			<p>
				<label for="jobRef" >Job Reference Number<span id="readjobref"></span></label>
				<input type="text" id="jobRef" name='jobRef' pattern="[A-Za-z0-9]{5}" title="Exactly 5 alphanumeric characters" required="required" />
			</p>


			<p>
				<label for="fName"> First Name </label>
				<input type="text" id="fName" name="firstName" pattern="[A-Za-z]+" maxlength="20" title="Enter Alphabetical characters only" required="required" />
			</p>
			<p>
				<label for="lName"> Last Name </label>
				<input type="text" id="lName" name="lastName" pattern="[A-Za-z]+" maxlength="20" title="Enter Alphabetical characters only" required="required" />
			</p>


			<p>
				<label for="dob"> Date of Birth </label>
				<input type="text" id="dob" name="birthdate" placeholder="dd/mm/yyyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" title="Required Format: dd/mm/yyyy" maxlength="10" size="10" required="required" />
			</p>
			<p id="doberror"></p>


			<fieldset>
				<legend>Gender</legend>
				<p>
					<input type="radio" id="male" name="gender" value="male" required="required"/>
					<label for="male">Male</label>
				</p>
				<p>
					<input type="radio" id="female" name="gender" value="female"/>
					<label for="female">Female</label>
				</p>
			</fieldset>


			<p>
				<label for="address"> Address </label>
				<input type="text" id="address" name="address" maxlength="40" required="required"/>
			</p>


			<p>
				<label for="suburb">Suburb</label>
				<input type="text" id="suburb" name="suburb" maxlength="40" required="required"/>
			</p>


			<p>
				<label for="state">State</label>
				<select id="state" name="state" required="required">
					<option value="" disabled="disabled" selected="selected">Please Select</option>
					<option value="VIC">VIC</option>
					<option value="NSW">NSW</option>
					<option value="QLD">QLD</option>
					<option value="NT">NT</option>
					<option value="WA">WA</option>
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="ACT">ACT</option>
				</select>
			</p>


			<p>
				<label for="postcode">Postcode</label>
				<input type="text" id="postcode" name="postcode" pattern="\d{4}" maxlength="4" size="4" required="required" title="Format: 4 Digit Postcode"/>
			</p>
			<p id="posterror"></p>



			<p>
				<label for="email">Email</label>
				<!-- Source: Pattern from Lecture 2 Notes Page 30 -->
				<input type="text" id="email" name="email" pattern="^.+@.+\..{2,3}$" required="required"/>
			</p>

			<p>
				<label for="phoneNo">Phone Number </label>
				<!-- Source for Pattern Expression:https://stackoverflow.com/questions/7126345/regular-expression-to-require-10-digits-without-considering-spaces -->
				<input type="text" id="phoneNo" name="phoneNo" pattern="^(\s*\d\s*){8,12}$" required="required" title="8 to 12 digits (with spaces)" />
			</p>


			<p>Skills
				<br />
				<input type="checkbox" id="python" name="skills[]" value="python"/>
				<label for="python">Python </label>

				<input type="checkbox" id="c" name="skills[]" value="c" />
				<label for="c">C </label>

				<input type="checkbox" id="js" name="skills[]" value="javascript" />
				<label for="js">JavaScript </label>

				<input type="checkbox" id="sql" name="skills[]" value="sql" />
				<label for="sql">SQL </label>

				<input type="checkbox" id="other" name="skills[]" value="other" checked="checked"/>
				<label for="other">Other Skills</label>
			</p>

			<p>
	      		<label for="oskill">Other Skills</label>
	      		<br />
	      		<textarea id="oskill" name="oskill" rows="10" cols="50" placeholder="Describe your skills"></textarea>
	      	</p>
	      	<p id="othertexterror"></p>



	      <p>
	      	<input type="submit" value="Apply" id="submit"/>
	      	<input type="reset" value="Reset" id="reset"/>
	      </p>
		</form>
	</div>

<?php 
	include("footer.inc"); // include common footer
?> 

</body>
</html>