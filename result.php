<?php 
// Get our database connector
require("includes/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Lohith sunchu image upload & retrival tutorial - List of Images</title>
	</head>

	<body>
	
		<div>
<div id="ht-section">
<form method="POST">
 
    <label for="select"><select name="pdata" value="Select" size="1"> 

 <?php
	// Grab the data from our people table
    $sql = "SELECT * FROM people";  
    $result = mysql_query($sql) or die (mysql_error());  
    while ($row = mysql_fetch_array($result)) 
    { 
            $id=$row["id"]; 
            $fname=$row["fname"];  
            $options.="<OPTION VALUE=\"$id\">".$fname; 
    } 
    ?> 
            <option>
            <? echo $options ?>
            </option>
        </select>
       <input type="submit" name="Submit" value="Submit">
    </form>
</div>
			<?php	
				// Grab the data from our people table
				$peopledata = $_POST["pdata"];
				$sql = "select * from people where id='$peopledata'";
				$result = mysql_query($sql) or die ("Could not access DB: " . mysql_error());

				while ($row = mysql_fetch_assoc($result))
				{
					echo "<div class=\"picture\">";
					echo "<p>";

					// Note that we are building our src string using the filename from the database
					echo "<img src=\"images/" . $row['filename'] . "\" alt=\"\" /><br />";
					echo $row['fname'] . " " . $row['lname'] . "<br />";
					echo "</p>";
					echo "</div>";
				}

			?>
		
		</div>
	</body>
</html>

