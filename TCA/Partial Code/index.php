<!DOCTYPE html>
<html>
<head>
<title>University of Hampshire option selection</title>
</head>
<body>
<h1>University of Hampshire option selection</h1>
<p>
<a href='addentry.html'>Add a new entry</a> | <a href='login.html'>Login</a> </p>
<?php



// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=username;", "username", "password");

// Q1. Complete the SELECT statement below so that ALL options from the database
// are retrieved.

$result = $conn->query ("?????");

while ($row = $result->fetch())
{
	// Q2. Add code inside the "while" loop to display the title, full details,
	// staff member, number of enrolled students so far, and limit, for the
	// current option


    // Q14. Show all questions for the current option.

	// Q3 Add a hyperlink to "enrol.php". This should include a query string
	// containing the ID of the current option, to allow the user to
	// enrol on the option

	// Q10 similar to Q3 but for question1.php

	// Q16 similar to Q3 but for edit1.php
}




?>
</body>
</html>
