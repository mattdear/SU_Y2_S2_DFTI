<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
    $monthName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $date = getDate();
    $year = $date["year"];
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Sign Up",
        "link" => "signup_form.php"],
        ["name" => "About",
        "link" => "about.php"]
    ];
    ?>
    <form action="signup.php" method="post">
        Username<br>
        <input type="text" name="username"><br><br>
        Password<br>
        <input type="text" name="password"><br><br>
        Name<br>
        <input type="text" name="name"><br><br>
        Day of Birth<br>
            <select name="dob">
                <?php
                for($a=1;$a<32;$a++){
                    echo "<option value='$a'>$a</option>";
                }
                ?>
            <select>
        <br><br>
        Month of Birth<br>
            <select name="mob">
                <?php
                foreach($monthName as $month){
                    echo "<option value='$month'>$month</option>";
                }
                ?>
            <select>
        <br><br>
        Year of Birth<br>
            <select name="yob">
                <?php
                for($a=$year;$a>1889;$a--){
                    echo "<option value='$a'>$a</option>";
                }
                ?>
            <select>
        <br><br>
        <input id="submit" type="submit" name="submit"><br><br>
        <?php
            foreach($links as $link){
            echo "<a href='" . $link["link"] . "'>" . $link["name"] . "</a><br>";
            }
        ?>
    </form>
</body>
</html>