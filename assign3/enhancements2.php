<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="description" content="Listing of Enhancements - Javascript" />
  <meta name="keywords" content="Enhancements,improvements,additions" />
  <meta name="author" content="Vinh Huynh"  />
  <title> List of JS Enhancements </title>


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
      <h1>List of JS Enhancements</h1>

      <h3>Requirements:</h3>
      <ul>
        <li>Enhancements should use JS techniques not discussed in Labs </li>
        <li>Describe interaction to trigger event </li>
        <li>Describe Implementation </li>
      </ul>


      <h3>Enhancement 1: Visual Fade effect using Javscript and CSS</h3>
      <h4>Description: </h4>
      <p> The index/home page will have a fade transition visual effect</p>
      <h4>Trigger Event: </h4>
      <p> When the page loads, the fade effect will occur</p>
      <h4>Implementation: </h4>
      <p> JS File: enhancementsOne.js </p>
      <p> When the page loads (window.onload), use JS to remove (using classList property) classname from an element with css style. </p>
      <p> The effect of the removal of the classname causes fade effect </p>
      <h4>Sources: </h4>
      <p> Source 1: https://www.abeautifulsite.net/a-clean-fade-in-effect-for-webpages </p>
      <p> Source 2: https://www.w3schools.com/howto/howto_js_add_class.asp </p>
      <a href="index.php">Link to Usage</a>

      <br/>
      <br/>

      <h3>Enhancement 2: Redirect webpage using JS timing events</h3>
      <p>Based on the suggested example in the assignment 2 document</p>
      <h4>Description: </h4>
      <p>The user has a limited amount of time (5 Minutes) to complete the job application.</p>
      <p>This time limit feature, is used to suggest to the applicant that he/she may need more time to review the details of the job position.</p>
      <h4>Trigger Event: </h4>
      <p>When the set time limit has exceeded, the browser redirects to jobs.html (job listing page) </p>
      <p>NOTE THAT: This 5 Minute limited can be reduced by adjusting the "elapsedtime" variable to 3000 (3 seconds) in the enhancementsTwo.js </p>
      <h4>Implementation: </h4>
      <p> JS File: enhancementsTwo.js </p>
      <p>Use of JS Timing Events - setTimeOut(thefunction,milliseconds) - thefunction is called after milliseconds has elapsed</p>
      <h4>Sources: </h4>
      <p> Source 1: https://www.w3schools.com/js/js_timing.asp</p>
      <p> Source 2: https://www.elated.com/javascript-timers-with-settimeout-and-setinterval/ </p>
      <a href="apply.php">Link to Usage</a>






    </div>




<?php 
  include("footer.inc"); // include common footer
?> 

</body>
</html>