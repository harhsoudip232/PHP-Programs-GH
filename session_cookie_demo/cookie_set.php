<?php

setcookie(
    "username",
    "Soudip",
    time() + 3600
);

echo "Cookie has been created.";

echo "<br><br>";

echo '<a href="cookie_read.php">Read Cookie</a>';

?>