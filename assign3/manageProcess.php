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



    <h1> Results of Query </h1>


<?php



  // Function - sanitise input
  function sanitise_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



  /******************************************************** PART 1: Extract data from the FORM ************************************************/
  // CHECK WHETHER processEOI.php was triggered by a form submit, if not display error messsage using the menu variable from the form
  // Menu Option
  if( isset($_POST["menu"])){ // Check whether form data exists
    $menu = $_POST["menu"]; // Extract form data
    $menu = sanitise_input($menu);
  } else {
    // Display error message, if process not triggered by a form submit
    echo "<p>Error: Please select a menu option from <a href=\"process.php\">form</a></p>\n";

    // Redirect to form, if process not triggered by a form submit
    header("location: manage.php");
  }

  // Extract Variables from the Form (Job Reference, First Name, Last Name, Status)

  // Variable 1: Job Reference Number
  if( isset($_POST["jobref"])){ // Check whether form data exists
    $jobRef = $_POST["jobref"]; // Extract form data
    $jobRef = sanitise_input($jobRef);
    //echo "<p>Testing: Job Ref. No.  $jobRef</p>\n";

  }
  // Variable 2: First Name
  if(isset($_POST["fname"])){ // Check whether form data exists
    $firstname = $_POST["fname"]; // Extract form data
    $firstname = sanitise_input($firstname); // Sanitise inputs 
    //echo "<p>Testing: First name $firstname</p>\n";
  }

  // Variable 3: Last Name
  if ( isset($_POST["lname"])){ // Check whether form data exists
    $lastname = $_POST["lname"]; // Extract form data
    $lastname = sanitise_input($lastname); // Sanitise inputs 
    //echo "<p>Testing: Last name $lastname</p>\n";

  }

  // Variable 4: Status of Application (New/Current/Final)
  if ( isset($_POST["status"])){ // Check whether form data exists
    $status = $_POST["status"]; // Extract form data
    $status = sanitise_input($status); // Sanitise inputs 
    //echo "<p>Testing: Status $status</p>\n";

  }

// Variable 5: EOInumber (required to change status)
  if ( isset($_POST["eoinumber"])){ // Check whether form data exists
    $EOInumber = $_POST["eoinumber"]; // Extract form data
    $EOInumber = sanitise_input($EOInumber); // Sanitise inputs 
    //echo "<p>Testing: EOInumber $EOInumber</p>\n";

  }



  /******************************************************* PART 2: DATABASE EXECUTION **********************************************************/
  require_once("settings.php"); // Connection Information (i.e. host, user, pwd, database name)
  $conn = @mysqli_connect($host,$user,$pwd,$sql_db);


  // Checks if connection is successful
  if(!$conn){   // CASE1: Connection not successful
    echo "<p>ERROR: Failed to connect to database </p>";
  } else { // Case 2: Connection is sucessful

    $sql_table = "eoi";

      // Check whether table eoi exists
      $tableStatus = mysqli_query($conn,"Select * FROM $sql_table");  
      if($tableStatus == false){ // If Table does not exist, then create the table in the database
        echo "<p>ERROR:The table does not exist. Please add some data.</p>";
      } 

    // String that stores the SQL query
    // Query 1: List all EOI Records 
    if($menu == "listall"){
        $query = "select * FROM $sql_table ORDER BY EOInumber";
        echo "<h2> Query: List all EOI records</h2>\n";
    } 

    // Query 2 : List all EOIs for a particular position (job reference number)
    if($menu == "filterjobref"){
      echo "<h2> Query: List all EOI records with a particular position</h2>\n";

      // Check whether the user has entered a job reference Number
      if($jobRef == ""){ // CASE 1: User has not supplied the Job Reference Number
        echo "<p>Warning: You have not specified a Job Reference Number or Position </p>\n";
        $query = "select * FROM $sql_table ORDER BY EOInumber";
      } else {  // CASE 2: User has supplied the Job Reference Number
        echo "<p> Filtered by Job Reference Number: $jobRef </p>\n";
        $query = "select * FROM $sql_table WHERE jobref = '$jobRef' ORDER BY EOInumber";

      }
    }

    // Query 3: List all EOIS with firstname or lastname or both
    if($menu == "filtername"){
      echo "<h2> Query: List all EOIs given the firstname and last name or both</h2>\n";
      

      // CASE 1: First Name and Last Name are empty strings - Display ALL records with Warning
      if($firstname == "" && $lastname == ""){ 
        echo "<p>Warning: You have NOT specified the first name or the last name </p>\n";
        $query = "select * FROM $sql_table ORDER BY EOInumber";
      } 


      // CASE 2: First Name is specified, but Last Name is not specified
      if($firstname != "" && $lastname == ""){ 
        echo "<p> Filtered by First Name: $firstname</p>\n";
        $query = "select * FROM $sql_table WHERE fname = '$firstname' ORDER BY EOInumber";
      } 

      // CASE 3: First Name is not specified, but Last Name is specified
      if($firstname == "" && $lastname != ""){ 
        echo "<p> Filtered by Last Name: $lastname</p>\n";
        $query = "select * FROM $sql_table WHERE lname = '$lastname' ORDER BY EOInumber";
      } 

      // CASE 4: Both First Name and Last Name are specified

      if($firstname != "" && $lastname != ""){ 
        echo "<p> Filtered by First Name: $firstname</p>\n";
        echo "<p> Filtered by Last Name: $lastname</p>\n";
        $query = "select * FROM $sql_table WHERE lname = '$lastname' AND fname = '$firstname' ORDER BY EOInumber";
      }

    }


    // Query 4: Change Status of an EOI
    if($menu == "changestatus"){
      echo "<h2> Query: Update status of an EOI record</h2>\n";

      // Check whether User has entered Job Reference Number.
      if($EOInumber==""){
        echo "<p>ERROR: You have NOT specified a EOINumber </p>\n";
      } else {
        // Update the status of a EOI record
        $query = "UPDATE $sql_table SET status = '$status' WHERE EOInumber = '$EOInumber'";

        // Excuete Query
        $updateresult = mysqli_query($conn,$query);
        if(!$updateresult){ // Unsucessful Execution
              echo "<p> Something with wrong with the update query ", $query, "</p>";
        } else {

          // Check whether the EOI was updated
          $rowsUpdated =  mysqli_affected_rows ($conn);
          if($rowsUpdated == 0){ // Case 1: Zero Records updated
            echo "<p> ERROR: EOInumber does not exist.Zero Records Updated.Please check entered EOInumber.EOInumber : $EOInumber  </p>\n";
          } else { // Case 2: 1 record updated
            echo "<p>SUCESS: Record with EOInumber $EOInumber has been updated with status $status </p>\n";
          }
        }

      }

      // Show results after update of status
      $query = "select * FROM $sql_table ORDER BY EOInumber";
    }








    // Query 5: Delete all EOIs with a specified job reference number
    if($menu == "deletejobref"){
      echo "<h2> Query: Delete all EOI records with a Job Reference Number</h2>\n";

      // Check whether the user has entered a job reference Number
      if($jobRef == ""){ // CASE 1: User has not supplied the Job Reference Number
        echo "<p>ERROR: You have not specified a Job Reference Number or Position. Please specify a job reference number </p>\n";
        $query = "select * FROM $sql_table ORDER BY EOInumber";
      } else {  // CASE 2: User has supplied the Job Reference Number - Delete Query
        $query = "DELETE FROM $sql_table WHERE jobref = '$jobRef'";
        $deleteresult = mysqli_query($conn,$query);

        // Check whether query execution was sucessful
        if(!$deleteresult){    // Case 1: Errors during query execution    
              echo "<p> Something with wrong with the delete query ", $query, "</p>";
        } else { // Case 2: Query was executed with no errors

          //  Check the # of rows that were deleted
          // Source: https://www.php.net/manual/en/mysqli.affected-rows.php
          $rowsDeleted =  mysqli_affected_rows ($conn);
          if($rowsDeleted == 0){ // Case 1: Zero Records deleted using $jobRef
            echo "<p> ERROR: Please Check entered Job Ref Number. Zero Deleted Records with Job Reference Number : $jobRef . </p>\n";
          } else { // Case 2: 1 or more records delted using $jobRef
            echo "<p> $rowsDeleted Deleted Records with Job Reference Number : $jobRef </p>\n";
          }
          $query = "select * FROM $sql_table ORDER BY EOInumber"; // Show table after deletion
        }


      }
    }


    //$query = "select * FROM $sql_table ORDER BY EOInumber";


    // Execute Query that displays all the results
    $result = mysqli_query($conn,$query);

    //Checks if the query execution was successful
    if(!$result){
      echo "<p> Something with wrong with the query ", $query, "</p>";
    } else {
      // Display the retrieved records
      echo "<table>\n";
      echo "<tr>\n"
          ."<th scope=\"col\">EOInumber</th>\n"
          ."<th scope=\"col\">Job Reference No. </th>\n"
          ."<th scope=\"col\">First Name </th>\n"
          ."<th scope=\"col\">Last Name </th>\n"
          ."<th scope=\"col\">Street Address </th>\n"
          ."<th scope=\"col\">Suburb</th>\n"
          ."<th scope=\"col\">State</th>\n"
          ."<th scope=\"col\">Postcode</th>\n"
          ."<th scope=\"col\">Email</th>\n"
          ."<th scope=\"col\">Phone Number</th>\n"
          ."<th scope=\"col\">Skills</th>\n"
          ."<th scope=\"col\">Other Skills</th>\n"
          ."<th scope=\"col\">Status</th>\n"
          ."</tr>\n";
      // Retrieve current record pointed by the result pointer
      while($row = mysqli_fetch_assoc($result)){
          echo "<tr>\n";
          echo "<td>",$row["EOInumber"],"</td>\n";
          echo "<td>",$row["jobref"],"</td>\n";
          echo "<td>",$row["fname"],"</td>\n";
          echo "<td>",$row["lname"],"</td>\n";
          echo "<td>",$row["streetname"],"</td>\n";
          echo "<td>",$row["suburb"],"</td>\n";
          echo "<td>",$row["state"],"</td>\n";
          echo "<td>",$row["postcode"],"</td>\n";
          echo "<td>",$row["email"],"</td>\n";
          echo "<td>",$row["phonenumber"],"</td>\n";
          echo "<td>",$row["skills"],"</td>\n";
          echo "<td>",$row["otherskills"],"</td>\n";
          echo "<td>",$row["status"],"</td>\n";
      }
      echo "</table>\n";
      // Fress up memory after using result pointer
      mysqli_free_result($result);
    }

  // Close database connection
  mysqli_close($conn);


} 



?>

</div>




<?php 
  include("footer.inc"); // include common footer
?> 

</body>
</html>