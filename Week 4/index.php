<link rel="stylesheet" href="style.css">
<!DOCTYPE html>
<html>
<head>
  <title>HitTastic!</title>
<?php
include("functions.php");
?>
</head>
<body>
  <h1>HitTastic!</h1>
  <p>Search and download your favorite 40 hits on
  HitTastic! Whether it's pop, rock, rap, or pure liquid
  cheese you're into, you can be sure to find it on
  HitTastic! With the full range of top 40 hits from the
  past 60 years on our database, you can guarantee you'll
  find what you're looking for. Plus with our Year Search
  (coming soon!) find out exactly what was in the chart in
  any year in the past 60 years. </p>
  <p>Basic Search</p>
  <form method="get" action="searchresults.php">
  <fieldset>
  <label>Please enter an artist:</label>
  <input name="name" /><br><br>
  <input type="submit" value="Go!" /><br>
  </fieldset>
  </form>
  <p>Advanced Search</p>
  <form method="get" action="advancedsearchresults.php">
  <fieldset>
  <label>Please enter query string:</label>
  <input name="searchString" /><br>
  <label>Please choose search type:</label>
  <select name="searchType">
    <option value="none"></option>
    <option value="title">Title</option>
    <option value="artist">Artist</option>
    <option value="year">Year</option>
  </select><br><br>
  <input type="submit" value="Go!" /><br>
  </fieldset>
  </form>
  <?php
  links();
  ?>
</body>
</html>
