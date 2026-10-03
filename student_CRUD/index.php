<?php

require_once "db.php";

$sql = "SELECT * FROM students";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Management</title>

</head>

<body>

<h1>Student Management System</h1>

<a href="create.php">
    + Add New Student
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>

    <tr>

        <td>
            <?= htmlspecialchars($row["id"]) ?>
        </td>

        <td>
            <?= htmlspecialchars($row["name"]) ?>
        </td>

        <td>
            <?= htmlspecialchars($row["email"]) ?>
        </td>

        <td>
            <?= htmlspecialchars($row["age"]) ?>
        </td>

        <td>

            <a href="edit.php?id=<?= $row["id"] ?>">
                Edit
            </a>

            |

            <a href="delete.php?id=<?= $row["id"] ?>">
                Delete
            </a>

        </td>

    </tr>

<?php

    }

} else {

?>

    <tr>

        <td colspan="5">
            No students found.
        </td>

    </tr>

<?php

}

?>

</table>

</body>

</html>