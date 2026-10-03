<?php

session_start();

if (!isset($_SESSION["username"])) {

    header("Location: login.html");
    exit;

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>

    <h1>Dashboard</h1>

    <h2>
        Welcome,
        <?= htmlspecialchars($_SESSION["username"]) ?>!
    </h2>

    <p>You are successfully logged in.</p>

    <a href="logout.php">
        Logout
    </a>

</body>

</html>