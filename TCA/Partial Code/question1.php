<!DOCTYPE html>
<html>
<body>
<?php



// Q11. Complete the statement to read the ID from the query string into $id.
$id = ????;

// Connect to the database

$conn = new PDO ("mysql:host=localhost;dbname=username;", "username", "password");

// Q12. Complete the form to allow the user to add a question. 
// There should be a text field or text area for the question, and a hidden 
// field containing the option ID. This form should submit to question2.php.

echo "<form method='post'>";
echo "Question: ";

echo "<input type='submit' value='Go!' />";
echo "</form>";

?>
</body>
</html>
