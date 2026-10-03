<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = $_POST["age"] ?? "";

    if ($name === "" || $email === "" || $age === "") {

        echo "All fields are required.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO students (name, email, age)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "ssi",
            $name,
            $email,
            $age
        );

        $stmt->execute();

        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>

<h2>Add New Student</h2>

<form method="POST">

    <label>Name:</label>
    <input type="text" name="name">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Age:</label>
    <input type="number" name="age">

    <br><br>

    <button type="submit">
        Add Student
    </button>

</form>

<br>

<a href="index.php">Back to Student List</a>

</body>

</html>