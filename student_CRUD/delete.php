<?php

require_once "db.php";

$id = $_GET["id"] ?? "";

if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Invalid student ID.");
}

$stmt = $conn->prepare(
    "DELETE FROM students
     WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: index.php");
exit;

?>