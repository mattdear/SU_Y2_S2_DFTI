<?php
session_start();
if(!isset($_SESSION["gatekeeper"]))
{
	echo "<p>You're not logged in. <a href='login.html'>Please login!</a></p>";
} 
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"/>
<title>HitTastic! - The top online music search</title>
<link rel="stylesheet" type="text/css" href="hittastic.css"/>
</head>

<body>

<div id="sidebar">
<div class="sbar"><a href="signup.html">Signup</a></div>
<div class="sbar"><a href="abouthittastic.html">About</a></div>
<div class="sbar">Charts
	 <div class="popup"> 
	<a href="singles.html">Singles</a><br/>
	<a href="albums.html">Albums</a><br/>
	</div> 
</div>
</div>

<div id="main">
<div id="imgdiv">
<img src="hittastic.png" alt="HitTastic! logo"/>
</div>

<h1>Welcome to HitTastic!</h1>

<h3>The UK's premier music search site</h3>

<hr/>

<?php
echo "Logged in as ". $_SESSION["gatekeeper"] . " <a href='logout.php'>Log out</a><br />";
?>

<p>Search and shop for your favourite top 40 hits on
HitTastic! Whether it's pop rock, rap or pure liquid cheese you're
into, you can be sure to find it on HitTastic!
With the full range of top 40 hits from the past 50 years on our database,
you can guarantee you'll find what you're looking for in stock. Plus, with our
Year Search find out exactly what was in the chart in any year in the past 50
years.</p>


<hr/>

<form method="get" action="searchresults.php">
<fieldset>
<label for="artist">Artist</label>
<input name="artist" id="artist"/><br/>
<br/>
<input type="submit" value="Go!"/>
</fieldset>
</form>

</div>
</body>
</html>
<?php
}
?>
