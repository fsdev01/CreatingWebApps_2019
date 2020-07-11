<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="description" content="HR Manager Queries" />
  <meta name="keywords" content="HR,Manager,Queries" />
  <meta name="author" content="Vinh Huynh"  />
  <title> HR Manager Queries</title>


  <!-- Main Style Sheet -->
  <link href="styles/style.css" rel="stylesheet" type="text/css"/>
  <link href="styles/manage.css" rel="stylesheet" type="text/css"/>
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
  <h1> HR Manager Queries</h1>

<?php 
  include("querymenu.inc"); // include common menu
?>



    <br/>

    <div id="menuone">
      <form method="post" action="manageProcess.php">
        <fieldset>
          <legend>List all EOI records</legend>
          <input type="hidden" name="menu" value="listall"/>
          <p> <input type="submit" value="View All" /></p>
        </fieldset>
      </form>
    </div>

    <br/>


    <div id="menutwo">
      <form method="post" action="manageProcess.php">
        <fieldset>
          <legend>Search By Job Reference Number</legend>
          <input type="hidden" name="menu" value="filterjobref"/>
          <p> 
            <label for="jobref1">Job Reference Number: </label>
            <input type="text" name="jobref" id="jobref1" />
          </p>
          <p> <input type="submit" value="Search" /></p>
        </fieldset>
      </form>
    </div>

    <br/>

    <div class="menuthree">
      <form method="post" action="manageProcess.php">
        <fieldset>
          <legend>Search By First Name or Last Name or both</legend>
          <input type="hidden" name="menu" value="filtername"/>
          <p> 
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" />
          </p>
          <p> 
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname" />
          </p>
          <p> <input type="submit" value="Search" /></p>
        </fieldset>
      </form>
    </div>

    <br/>


    <div id="menufour">
      <form method="post" action="manageProcess.php">
        <fieldset>
          <legend>Change Status of EOI for a particular applicant</legend>
          <input type="hidden" name="menu" value="changestatus"/>
          <p> 
            <label for="eoinumber"> EOI Number </label>
            <input type="text" name="eoinumber" id="eoinumber" />
          </p>
          <p> 
            <label for="status">Status</label>
            <select id="status" name="status">
              <option value="NEW">New</option>
              <option value="CURRENT">Current</option>
              <option value="FINAL">Final</option>
            </select>
          </p>
          <p> <input type="submit" value="Update Status" /></p>
        </fieldset>
      </form>
    </div>


    <br/>


    <div id="menufive">
      <form method="post" action="manageProcess.php">
        <fieldset>
          <legend>Delete EOI records with specified Job Reference Number</legend>
          <input type="hidden" name="menu" value="deletejobref"/>
          <p> 
            <label for="jobref">Job Reference Number: </label>
            <input type="text" name="jobref" id="jobref" />
          </p>
          <p> <input type="submit" value="Delete Record" /></p>
        </fieldset>
      </form>
    </div>



</div>




<?php 
  include("footer.inc"); // include common footer
?> 

</body>
</html>