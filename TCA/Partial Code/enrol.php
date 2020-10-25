<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

// enrol.php
// allows a student to enrol on an option 

// Q6 complete the 'if' statement to prevent non-logged-in users from
// accessing this script.
if(????)
{

	// Connect to the database
	$conn = new PDO ("mysql:host=localhost;dbname=username;", "username", "password");
    // Q15. Add error checking to enrol.php so that a student cannot
    // enrol onn the option if the limit has been reached.

	// Q4. Complete the statement below to read the ID from the query string into $id.

	$id = ????;

	// Connect to the database

	// Q5. Complete the SQL statement below to increase the number of enrolled
	// students on this option by one. 

	$conn->query ("?????");


	// Q7a) Complete this to set '$u' equal to the currently logged in
	// user.
	$u = ?????;

	// Q7b) Complete the SQL statement to add an entry to the uh_enrolments
	// table.
	$conn->query("?????");
}
else
{
    echo "You're not logged in";
}
?>

</body>
</html>
