<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

// Connect to the database

$conn = new PDO ("mysql:host=localhost;dbname=username;", "username", "password");

// Q16 continued. Complete edit1.php so that it shows a form allowing
// the administrator to alter the description of the option.
// The current description must be included in
// the form. The script must be accessible to staff only.
// The form should send its details to edit2.php.


// Q18 Modify your answer so that access is restricted to ONLY the member
// of staff who teaches this option.


?>
</body>
</html>
