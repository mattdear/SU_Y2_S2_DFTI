<?php
$un = $_POST["username"];
$conn->query ("DELETE FROM sjx_orders WHERE username = $un");
header("Location: index.html");
?>
