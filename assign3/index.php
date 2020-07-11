<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="description" content="Frontem Technologies Home Page" />
	<meta name="keywords" content="Frontem,Technologies,Home,Page" />
	<meta name="author" content="Vinh Huynh"  />
	<title>Welcome to Frontem Technologies</title>
	
	<!-- Main Style Sheet -->
	<link href="styles/style.css" rel="stylesheet" type="text/css"/>
	<link href="styles/indexstyle.css" rel="stylesheet" type="text/css"/>
	<!-- External Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"/>

	<!-- Link to enhancement JS script -->
	<script src="scripts/enhancementsOne.js"></script>

</head>


<body>

<?php 
	include("header.inc"); // include common header
	include("menu.inc"); // include common menu
?> 


	

	<div class="content fade">
		<!-- Company Slogan -->
		<header>
			<h1 id="slogan">/ High Performance Innovation /</h1>
			<hr id="underline"/>
		</header>
		<br />

		<!-- Description about the company -->
		<section class="desc">
			<p><span id="hText"> Frontem Technologies</span>  is a consulting firm that is focused on building technical solutions to business problems and improve the client’s technical capabilities. In particular, we assist clients with building software and statistical models. We have helped several mid firm with their problems such as inventory forecasting, to avoid stockouts. </p>
		</section>

		<section class="desc">
			<h3>We offer the following services:</h3>
			<ul>
				<li>Mobile App Development</li>
				<li>Web Development </li>
				<li> Big Data Analytics </li>
			</ul>
		</section>

		<section class="desc">
			<h3> Technologies that we use include </h3>
			<ul>
				<li> Slack </li>
				<li> Git </li>
				<li> HTML </li>
				<li> CSS </li>
				<li> Matlab </li>
			</ul>
		</section>
	</div>

<?php 
	include("footer.inc"); // include common footer
?> 


</body>
</html>