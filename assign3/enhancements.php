<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="description" content="Listing of Enhancements" />
  <meta name="keywords" content="Enhancements,improvements,additions" />
  <meta name="author" content="Vinh Huynh"  />
  <title> List of Enhancements </title>


  <!-- Main Style Sheet -->
  <link href="styles/style.css" rel="stylesheet" type="text/css"/>
  <link href="styles/enhance.css" rel="stylesheet" type="text/css"/>
  <!-- External Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"/>


</head>
<body>

  
<?php 
  include("header.inc"); // include common header
  include("menu.inc"); // include common menu
?> 

    <div class="content">
      <h1> List of Enhancements</h1>
      <h3> Requirement 1: Use of HTML elements not covered in tutorials </h3>
      <h3>Enhancement 1: HTML Elements Used to Enhance Skills Section of about.html </h3>
      <h4>Element 1:&lt;progress&gt; element</h4>
      <p>Source: https://www.hongkiat.com/blog/html5-progress-bar/ </p>
      <p>Visual Representation (Bar) of proficiency of skills</p>
      <a href="about.php#mskills">Link to Usage</a>
      <br/>
      <h4>Element 2:&lt;details&gt; element</h4>
      <p>Source: https://www.w3schools.com/tags/tag_details.asp </p>
      <p>Additional Details that can be expanded or closed - by clicking on the triangle </p>
      <a href="about.php#mskills">Link to Usage</a>


      <h4>Element 3:&lt;pre&gt; element</h4>
      <p>Source: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre </p>
      <p>Source: https://www.sitepoint.com/everything-need-know-html-pre-element/ </p>
      <p>Preserve the whitespaces in a string - Easier Alignment</p>
      <a href="about.php#mskills">Link to Usage</a>


      <br />
      <br />

      <h3> Requirements 2: A number of additional CSS properties or selectors not covered in tutorials</h3>
      <h3>Enhancement 2: Fixed the Navigation Bar When Scrolling </h3>
      <p> Source: https://www.w3schools.com/css/css_navbar.asp </p>
      <p> Key Benefit: Navigation Bar is always acessible </p>
      <p> Refer to id selector #navbarin style.css</p>
      <a href="index.html#navbar">Link to Usage in HTML</a>
      <a href="styles/style.css"> Link to Style Sheet</a>

      <h3> Other CSS Enhancements: </h3>
      <h4>CSS Property 2: Rounded Corners around profile image </h4>
      <p> Source: https://www.w3schools.com/css/css3_borders.asp</p>
      <p> Refer to img element in aboutstyle.css </p>
      <a href="about.html#imgprofile">Link to Usage in HTML</a>
      <a href="styles/aboutstyle.css"> Link to Style Sheet</a>
      <br />
      <h4> CSS Property 3: Using Colors with opacity option </h4>
      <p> Source: https://www.w3schools.com/cssref/func_rgba.asp </p>
      <p> Benefit: Set Background that is transparent, so text is more readable </p>
      <p> This is evident on home page, where transparent black boxes are used </p>
      <p> Refer to .desc class in indexstyle.css </p>
      <a href="index.html">Link to Usage in HTML</a>
      <a href="styles/indexstyle.css"> Link to Style Sheet</a>


    </div>




<?php 
  include("footer.inc"); // include common footer
?> 

</body>
</html>