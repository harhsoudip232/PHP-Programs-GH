<?php

if (isset($_COOKIE["username"])) {

    echo "Username: ";
    echo htmlspecialchars($_COOKIE["username"]);

} else {

    echo "Cookie not found.";

}

echo "<br><br>";

echo '<a href="cookie_delete.php">Delete Cookie</a>';

?>