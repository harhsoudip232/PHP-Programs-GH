<?php

session_start();

$name = $_POST["name"] ?? "";
$password = $_POST["password"] ?? "";

if ($name === "Soudip" && $password === "12345") {

    $_SESSION["username"] = $name;

    header("Location: dashboard.php");
    exit;

} else {

    echo "Invalid name or password.";
    echo "<br><br>";
    echo '<a href="login.html">Try Again</a>';

}

?>