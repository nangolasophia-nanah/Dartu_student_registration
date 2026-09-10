<?php

include "db.php";

$message = "";

/* REGISTER STUDENT */
if (isset($_POST["register"])) {

    $student_name = $_POST["student_name"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO students
            (student_name, gender, course, phone)
            VALUES
            ('$student_name', '$gender', '$course', '$phone')";

    if (mysqli_query($conn, $sql)) {

        $message = "Student registered successfully!";

    } else {

        $message = "Registration failed: " . mysqli_error($conn);

    }
}


/* GET STUDENTS */
$sql = "SELECT * FROM students ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dartu Student Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Dartu Student Registration System</h1>


    <?php if ($message != "") { ?>

        <div class="message">

            <?php echo htmlspecialchars($message); ?>

        </div>

    <?php } ?>


    <!-- REGISTRATION FORM -->

    <div class="card">

        <h2>Register Student</h2>

        <form method="POST">

            <label>Student Name</label>

            <input
                type="text"
                name="student_name"
                placeholder="Enter student name"
                required
            >


            <label>Gender</label>

            <select name="gender" required>

                <option value="">Select Gender</option>

                <option value="Male">Male</option>

                <option value="Female">Female</option>

            </select>


            <label>Course</label>

            <input
                type="text"
                name="course"
                placeholder="Enter course"
                required
            >


            <label>Phone Number</label>

            <input
                type="text"
                name="phone"
                placeholder="Enter phone number"
                required
            >


            <button type="submit" name="register">

                Register Student

            </button>

        </form>

    </div>


    <!-- STUDENTS TABLE -->

    <div class="card">

        <h2>Registered Students</h2>

        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Gender</th>

                    <th>Course</th>

                    <th>Phone</th>

                    <th>Registration Date</th>

                </tr>

            </thead>


            <tbody>

                <?php

                if ($result && mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($row["id"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row["student_name"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row["gender"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row["course"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row["phone"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row["registration_date"]); ?>
                        </td>

                    </tr>

                <?php

                    }

                } else {

                ?>

                    <tr>

                        <td colspan="6">
                            No students registered yet.
                        </td>

                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </div>

</div>

</body>

</html>