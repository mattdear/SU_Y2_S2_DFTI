<html>
<head>
    <link rel="stylesheet" href="style.css">
<?php
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Sign Up",
        "link" => "signup_form.php"],
        ["name" => "About",
        "link" => "about.php"]
    ];
?>
</head>
<body>
HitTastic! was founded in 1998 by Alex Martin in a garden shed in rural Northern California in order to
provide an online search facility for music. It was one of the first sites to use the newly-released PHP
3.0. The site was highly successful and by linking up with record companies, expanded to the search
and download site that you see today. HitTastic! now has its own premises in Silicon Valley, and can be
contacted at:<br><br>
HitTastic! Inc,<br>
One HitTastic! Way,<br>
Sunnyvale, California.<br><br>
<?php
foreach($links as $link){
    echo "<a href='" . $link["link"] . "'>" . $link["name"] . "</a><br>";
}
?>
</body>
</html>