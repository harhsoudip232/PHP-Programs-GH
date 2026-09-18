<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and validate
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "All fields are required!";
        exit;
    }

    echo "Form Data Received:<br>";
    echo "Username: $username <br>";
}
?>
