<?php

require_once "db.php";

$id = $_GET["id"] ?? "";

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Invalid student ID.");
}


// Get existing student

$stmt = $conn->prepare(
    "SELECT name, email, age
     FROM students
     WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}


// Update student

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = $_POST["age"] ?? "";

    if ($name === "" || $email === "" || $age === "") {

        die("All fields are required.");

    }

    $stmt = $conn->prepare(
        "UPDATE students
         SET name = ?, email = ?, age = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "ssii",
        $name,
        $email,
        $age,
        $id
    );

    $stmt->execute();

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Student</title>

</head>

<body>

<h2>Edit Student</h2>

<form method="POST">

    <label>Name:</label>

    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($student["name"]) ?>"
    >

    <br><br>

    <label>Email:</label>

    <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($student["email"]) ?>"
    >

    <br><br>

    <label>Age:</label>

    <input
        type="number"
        name="age"
        value="<?= htmlspecialchars($student["age"]) ?>"
    >

    <br><br>

    <button type="submit">
        Update Student
    </button>

</form>

<br>

<a href="index.php">
    Back to Student List
</a>

</body>

</html>