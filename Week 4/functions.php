<?php
function links(){
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Sign Up",
        "link" => "signup_form.php"],
        ["name" => "About",
        "link" => "about.php"]
    ];

foreach($links as $link){
    echo "<a href='" . $link["link"] . "'>" . $link["name"] . "</a><br>";
}
}
?>