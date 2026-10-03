<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "student_db"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Database connected successfully!";

?>


<!-- CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    age INT NOT NULL
); -->

