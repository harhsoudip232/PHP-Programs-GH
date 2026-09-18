<?php

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --------------------------------
    // 1. RECEIVE FORM DATA
    // --------------------------------

    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $age = $_POST["age"] ?? "";
    $course = $_POST["course"] ?? "";


    // --------------------------------
    // 2. SANITIZE / NORMALIZE INPUT
    // --------------------------------

    $name = trim($name);
    $email = trim($email);
    $course = trim($course);


    // --------------------------------
    // 3. VALIDATION
    // --------------------------------

    $errors = [];


    // Validate Name
    if ($name === "") {

        $errors[] = "Name is required.";

    } elseif (strlen($name) < 3) {

        $errors[] = "Name must contain at least 3 characters.";
    }


    // Validate Email
    if ($email === "") {

        $errors[] = "Email is required.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Please enter a valid email address.";
    }


    // Validate Age
    if ($age === "") {

        $errors[] = "Age is required.";

    } elseif (
        filter_var($age, FILTER_VALIDATE_INT) === false
    ) {

        $errors[] = "Age must be a valid number.";

    } elseif ($age < 18 || $age > 60) {

        $errors[] = "Age must be between 18 and 60.";
    }


    // Validate Course
    $allowedCourses = ["BCA", "BBA", "BTech"];

    if (!in_array($course, $allowedCourses, true)) {

        $errors[] = "Please select a valid course.";
    }


    // --------------------------------
    // 4. CHECK VALIDATION RESULT
    // --------------------------------

    if (!empty($errors)) {

        echo "<h2>Form Submission Failed</h2>";

        echo "<ul>";

        foreach ($errors as $error) {

            echo "<li>" .
                 htmlspecialchars($error, ENT_QUOTES, "UTF-8") .
                 "</li>";
        }

        echo "</ul>";

        echo "<a href='form.html'>Go Back</a>";

        exit;
    }


    // --------------------------------
    // 5. SAFE OUTPUT
    // --------------------------------

    $safeName =
        htmlspecialchars($name, ENT_QUOTES, "UTF-8");

    $safeEmail =
        htmlspecialchars($email, ENT_QUOTES, "UTF-8");

    $safeCourse =
        htmlspecialchars($course, ENT_QUOTES, "UTF-8");


    // --------------------------------
    // 6. SUCCESS
    // --------------------------------

    echo "<h2>Registration Successful!</h2>";

    echo "Name: " . $safeName . "<br>";
    echo "Email: " . $safeEmail . "<br>";
    echo "Age: " . htmlspecialchars((string)$age, ENT_QUOTES, "UTF-8") . "<br>";
    echo "Course: " . $safeCourse . "<br>";
}

else {

    echo "Please submit the form first.";

}

?>